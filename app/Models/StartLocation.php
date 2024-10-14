<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'cim',
        'helyszin_neve',
        'latitude',
        'longitute',
        'streetNumber',
        'route',
        'country',
        'postalCode',
        'locality',
    ];
}
