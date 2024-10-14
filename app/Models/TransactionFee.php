<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'transport_17m3_presis_pro_150',
        'transport_17m3_belade_150',
        'transport_27m3_presis_pro_150',
        'transport_27m3_belade_150',
        'transport_47m3_presis_pro_150',
        'transport_47m3_belade_150',
        'transport_95m3_presis_pro_150',
        'transport_95m3_blade_150',
        'transport_140m3_blade_150',
        'transport_140m3_presis_pro_150',
        // 151
        'transport_17m3_presis_pro_151',
        'transport_17m3_belade_151',
        'transport_27m3_presis_pro_151',
        'transport_27m3_belade_151',
        'transport_47m3_presis_pro_151',
        'transport_47m3_belade_151',
        'transport_95m3_presis_pro_151',
        'transport_95m3_blade_151',
        'transport_95m3_140_presis_pro_151',
        'transport_95m3_140_blade_151'
    ];
}
