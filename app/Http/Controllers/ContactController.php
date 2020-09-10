<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contact;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

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

    //    $serializedContacts = $contacts.map(function($contact){
    //         return {
    //            $this->id= $contact->id;
    //             $this->name -> $contact->name;
    //             $last_name: $contact->last_name;
    //             $phone: $contact->phone;
    //             $image_url: $contact->image
    //               ? `http://localhost:${process.env.PORT}/uploads/${contact.image}`
    //               : null;
    //           };
    //     });

        return view('indexContact',['contacts'=> $contacts]);
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
        $contact->image=$request->image;

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
        $contact->image=$request->image;

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

        return redirect()->route('contacts.index');
    }
}
