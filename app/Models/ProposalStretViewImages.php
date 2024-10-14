<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalStretViewImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'proposal_id',
        'image'
    ];
}
