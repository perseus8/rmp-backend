<?php

namespace App\Http\Controllers\User\Proposal;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\type;

class ProposalListController extends Controller
{
    public function getList(Request $request)
    {
        $searchQuery = $request->searchQuery;
        $proposalType = (array)$request->proposalType;

        try {

            $proposals =  Proposal::select(
                'proposals.*',
                'customers.cim',
                'customers.ugyfelszam',
                'customers.keresztnev',
                'customers.telefonszam',
                'customers.vezeteknev',
                'proposal_summeries.osszesen as osszesen'
            )->leftJoin('proposal_summeries', 'proposals.id', '=', 'proposal_summeries.proposal_id')
                ->leftJoin('customers', 'customers.id', '=', 'proposals.customer_id')
                ->where(function ($query) use ($proposalType) {
                    // Check for proposal_type first
                    if (!empty($proposalType)) {
                        $query->whereIn('proposals.proposal_type', $proposalType);
                    }
                })
                ->where(function ($query) use ($searchQuery) {
                    // Check other conditions if proposal_type is available
                    $query->where('proposals.proposal_number', 'like', '%' . $searchQuery . '%')
                        ->orWhere('customers.ugyfelszam', 'like', '%' . $searchQuery . '%')
                        ->orWhere('customers.keresztnev', 'like', '%' . $searchQuery . '%')
                        ->orWhere('customers.cim', 'like', '%' . $searchQuery . '%')
                        ->orWhere('customers.telefonszam', 'like', '%' . $searchQuery . '%');
                })
                // ->withSum('proposalItems', 'zwischensum')
                ->limit(100)->orderBy('proposals.id', 'desc')->get();

            return response()->json([
                "status" => 200,
                "message" => "ASikeresen betöltve javaslatok!",
                "data" => [
                    'proposals' => $proposals
                ]
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Hiba, az ajánlat tételei nem lettek betöltve!" . $ex->getMessage(),
                "data" => []
            ], 500);
        }


        return $proposals;
    }
}
