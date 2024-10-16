<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalTourPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
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
        //----
        'emelet',
        'tavolsag',
        'megallo',
        'lift',
        'szuk_lepcsohaz',
        'kozteruleti_ugyintezes',
        'note',
        //
        'total',
        'capacity',
        'inter_distance',
        'sort_index',
        'start_index',
        'kuchenmonteur',
        'onloadingIndex'
    ];

    public function packingMaterials()
    {
        return $this->hasMany(ProposalPackingMaterial::class, 'location_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(ProposalItems::class, 'location_id', 'id');
    }

    public function image()
    {
        return $this->hasMany(ProposalStretViewImages::class, 'place_id', 'place_id');
    }
}
