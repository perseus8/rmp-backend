<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'tarolasi_napok_szama',
        'transportpreis_euro_km',
        'beladen_euro_m3',
        'entladen_euro_m3',
        'auspacken_euro_m3',
        'de_und_remontage_euro_std',
        'kuchenmonteur_euro_std',
        'elektriker_euro_std',
        'zuschlag_geschoss',
        'zuschlag_abtrageweg_uber',
        'zuschlag_schwergut',
        'mobel_stecklift',
        'aubenaufzug_inkl_bediener',
        'halteverbotszone',
        'be_und_entladestelle',
        'entsorgung_handling',
        'lagerentgelt_je',
        'pkw_szemely_auto',
        'lkw_35_to_17m3',
        'lkw_75_to_27m3',
        'lkw_12_to_47m3',
        'lkw_18_to_95m'
    ];
}
