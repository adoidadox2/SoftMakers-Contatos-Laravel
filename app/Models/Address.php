<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep', 'state', 'city','neighborhood','street','house_number',
    ];

    public function residents()
    {
        return $this->hasMany('App\Models\Contact');
    }
}
