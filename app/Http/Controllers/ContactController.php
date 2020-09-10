<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=Contact::select('id','name','last_name','phone','image')->orderBy('name','asc')->get();

       $serializedContacts = $contacts->map(function($contact){
               
                 $contact->id= $contact->id;
                 $contact->name = $contact->name;
                 $contact->last_name = $contact->last_name;
                 $contact->phone= $contact->phone;
                 $contact->image_url= $contact->image
                  ? url('storage/'.$contact->image)
                  : null;
                
                  return $contact;  
              
        });

        
        
        return view('indexContact',['contacts'=> $serializedContacts]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createContact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $contact = new Contact();
        $address = new Address();
        $contact->name=$request->name;
        $contact->last_name=$request->last_name;
        $contact->phone=$request->phone;
        $contact->email=$request->email;
        if($request->file('avatar')){
            $contact->image=$request->file('avatar')->store('uploads');
        }

        $address->cep=$request->cep;
        $address->state=$request->state;
        $address->city=$request->city;
        $address->neighborhood=$request->neighborhood;
        $address->street=$request->street;
        $address->house_number=$request->house_number;

        $address->save();
        $contact->address_id=$address->id;
        $contact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
            $contact->image_url= $contact->image
             ? url('storage/'.$contact->image)
             : null;
           
        return view('showContact', ['contact'=>$contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('updateContact', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $address = Address::where('id',$contact->address_id)->first();

        $contact->name=$request->name;
        $contact->last_name=$request->last_name;
        $contact->phone=$request->phone;
        $contact->email=$request->email;

        if ($request->file('avatar')) {
            if ($contact->image) {
              $oldImage = $contact->image;
      
              unlink(storage_path('app/public/'.$oldImage));
            }
      
            $contact->image=$request->file('avatar')->store('uploads');
          }

        $address->cep=$request->cep;
        $address->state=$request->state;
        $address->city=$request->city;
        $address->neighborhood=$request->neighborhood;
        $address->street=$request->street;
        $address->house_number=$request->house_number;

        $address->save();
        $contact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
        $contact->delete();

        $addresses=Address::all();
        $addressesArray = $addresses->load('residents');

        $emptyAddresses = $addressesArray->filter(
            function ($address){
                 return !count($address->residents);
                
            }
          );

          $emptyAddressesIDs = $emptyAddresses->map(function($address){
            return $address->id;
          });

          if($emptyAddressesIDs){
              $emptyAddressesIDs->each(function($id){
                 Address::where('id', $id)->delete();
              });
          }

        return redirect()->route('contacts.index');
    }
}
