<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalSummery extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'jarmu_szukseglet',
        'munkaero_szukseglet',
        'tavolsag',
        'terfogat',
        'alacsony_ar',
        'utvonal_ar',
        'stop_ar',
        'nincs_zone_ar',
        'bonstasi_ar',
        'telepitesi_ar',
        'csomagolasi_ar',
        'buborekfolio_ar',
        'nehez_rakomany_ar',
        'butoremelo_ar',
        'kulso_lift_ar',
        'bolti_ar',
        'szemelyzeti_ar',
        'konyhaszerelo_ar',
        'villanyszerelo_ar',
        'teljes_ar',
        'kedvezmeny',
        'osszesen',
        'megjegyes',
        'tavolsag_checked',
        'terfogat_checked',
        'alacsony_ar_checked',
        'utvonal_ar_checked',
        'stop_ar_checked',
        'nincs_zone_ar_checked',
        'bonstasi_ar_checked',
        'telepitesi_ar_checked',
        'csomagolasi_ar_checked',
        'buborekfolio_ar_checked',
        'nehez_rakomany_ar_checked',
        'butoremelo_ar_checked',
        'kulso_lift_ar_checked',
        'bolti_ar_checked',
        'szemelyzeti_ar_checked',
        'konyhaszerelo_ar_checked',
        'villanyszerelo_ar_checked',
        'teljes_ar_checked',
        'kedvezmeny_checked',
        'osszesen_checked',
        'tetal_ar',
        'tetal_ar_checked',
        'verpackungsmaterial_ar',
        'verpackungsmaterial_ar_checked',
        'kuchenmonteur',
        'kuchenmonteur_checked',
        'extra_service',
        'extra_service_ar',
        'extra_service_checked',
        'tarolasi',
        'tarolasi_ar',
        'tarolasi_checked'

    ];
}
