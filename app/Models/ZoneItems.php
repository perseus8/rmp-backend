<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneItems extends Model
{
    use HasFactory;


    protected $fillable  = [
        'zone_id',
        //item_name
        'targy_neve',
        // dowel_work
        'dubel_arbeiten',
        // electrician
        'villanyszerelo',
        // Kitchen Fitter
        'konyhaszerelo',
        // Volume
        'volume',
        // Packing time per person
        'csomagolasi_ido',
        // Bubble time per person
        'buborekcsomagolasi_ido',
        //unpacking_time_per_person
        'kicsomagolasi_ido',
        //disassembly_time_per_person
        'szetszerelesi_ido',
        //assembly_time_per_person
        'osszeszerelesi_ido'
    ];

    public function zone()
    {
        return $this->hasOne(Zone::class,  'id', 'zone_id',);
    }
}
