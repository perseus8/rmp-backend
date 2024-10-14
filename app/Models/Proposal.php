<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_number',
        'customer_id',
        'proposal_type',
        'feljegyzes',
        'status'
    ];
    public function proposalItems()
    {
        return $this->hasMany(ProposalItems::class, 'proposal_id');
    }
}
