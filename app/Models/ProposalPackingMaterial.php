<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalPackingMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'packing_material_id',
        'verpackungsmaterial',
        'gegenstand',
        'ar',
        'zwischensum',
        'location_id'
    ];

    public function packingMaterials()
    {
        return $this->hasOne(ProposalTourPlan::class, 'id');
    }
}
