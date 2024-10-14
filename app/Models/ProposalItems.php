<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalItems extends Model
{
    use HasFactory;

    protected $fillable = [
        //proposal id
        'proposal_id',
        //zone id
        'zone_id',
        //location id
        'location_id',
        //item id
        'item_id',
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
        'osszeszerelesi_ido',
        //-----------------------------------------------------------------
        'gegenstand',
        'entladen',
        'demontage_checked',
        'montage_checked',
        'einpacken_checked',
        'luftpolsterfol_checked',
        'auspacken_checked',
        'entsorgen_checked',
        'einlagern_checked',
        'schwergut_checked',
        'nicht_zerlegbar_checked',
        'capacity',
        'zwischensum',
    ];

    public static function calculateTotalsForProposal($proposalId)
    {
        $totals = self::where('proposal_id', $proposalId)
            ->selectRaw('SUM(capacity) as totalCapacity, SUM(zwischensum) as totalZwischensum')
            ->first();

        return [
            'totalCapacity' => $totals->totalCapacity ?? 0,
            'totalZwischensum' => $totals->totalZwischensum ?? 0
        ];
    }
}
