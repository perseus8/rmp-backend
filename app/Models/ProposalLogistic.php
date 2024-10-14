<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalLogistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'tarolasi_napok_szama',
        'butorlift',
        'kulso_lift_kezelovel',
        'munkaero',
        'villanyszerelo',
        'biztositas',
        'plusz_szolgaltatas',
        'plusz_szolgaltatas_cost',
        'plusz_szolgaltatas_date',
        'megjegyzés',
        'pkw',
        'hanger',
        'transport_17',
        'transport_27',
        'transport_47',
        'transport_95',
        'transport_140',
        'pkw_extra',
        'hanger_extra',
        'transport_17_extra',
        'transport_27_extra',
        'transport_47_extra',
        'transport_95_extra',
        'transport_140_extra',
        'total',
        'fahrzeug',
        'megjegyzes',
        'kuchenmonteur'
    ];
}
