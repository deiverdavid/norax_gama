<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'cedula',
        'lastname1',
        'lastname2',
        'phone_number',
        'email',
        'address',
        'position',
        'description_position',
    ];
}
