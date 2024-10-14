<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        // customer number
        'ugyfelszam',
        // first name
        'keresztnev',
        // last name
        'vezeteknev',
        // address
        'cim',
        // telephone
        'telefonszam',
        // email
        'email'
    ];
}
