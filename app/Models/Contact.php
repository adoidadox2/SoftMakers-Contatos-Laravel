<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $image_url = null;

    protected $fillable = [
        'name', 'last_name', 'image','phone','email',
    ];

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }
}
