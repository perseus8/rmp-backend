<?php

namespace App\Http\Controllers\User\Proposal;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Proposal;
use App\Models\ProposalItems;
use App\Models\ProposalLogistic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProposalLogisticController extends Controller
{
    public function getData(Request $request)
    {
        try {
            $proposal_id = $request->proposal_id;
            $totals = ProposalItems::calculateTotalsForProposal($proposal_id);
            $logisticData = ProposalLogistic::where('proposal_id', $proposal_id)->get();
            $proposalData = Proposal::where('id', $proposal_id)->get();
            $proposalItems = ProposalItems::where('proposal_id', $proposal_id)->get();
            $fee = Fee::all();
            return response()->json([
                "status" => 200,
                "message" => "Logisztikai adatok sikeresen betöltve !",
                "data" => [
                    'totals' => $totals,
                    'logisticData' => $logisticData,
                    'proposalData' => $proposalData,
                    'fee' => $fee,
                    'proposalItems' => $proposalItems
                ]
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Hiba, Logisztikai adatok sikeresen nem lettek betöltve !",
                "data" => []
            ], 500);
        }
    }

    public function saveData(Request $request)
    {

        try {
            ProposalLogistic::where('proposal_id', $request->proposal_id)->delete();
            ProposalLogistic::create([
                'proposal_id' => $request->proposal_id,
                'tarolasi_napok_szama' =>  $request->tarolasi_napok_szama,
                'butorlift' =>  $request->butorlift,
                'kulso_lift_kezelovel' =>  $request->kulso_lift_kezelovel,
                'munkaero' =>  $request->munkaero,
                'kuchenmonteur' => $request->Kuchenmonteur,
                'villanyszerelo' =>  $request->villanyszerelo,
                'biztositas' =>  $request->biztositas,
                'plusz_szolgaltatas' =>  $request->plusz_szolgaltatas,
                'plusz_szolgaltatas_cost' =>  $request->plusz_szolgaltatas_cost,
                'plusz_szolgaltatas_date' => $request->plusz_szolgaltatas_date,
                'megjegyzes' =>  $request->megjegyzes,
                'pkw' =>  $request->pkw,
                'hanger' =>  $request->hanger,
                'transport_17' =>  $request->transport_17,
                'transport_27' =>  $request->transport_27,
                'transport_47' =>  $request->transport_47,
                'transport_95' =>  $request->transport_95,
                'transport_140' =>  $request->transport_140,
                'pkw_extra' =>  $request->pkw_extra,
                'hanger_extra' =>  $request->hanger_extra,
                'transport_17_extra' =>  $request->transport_17_extra,
                'transport_27_extra' =>  $request->transport_27_extra,
                'transport_47_extra' =>  $request->transport_47_extra,
                'transport_95_extra' =>  $request->transport_95_extra,
                'transport_140_extra' => $request->transport_140_extra,
                'total' =>  $request->total,
                'fahrzeug' =>  $request->fahrzeug,
                'megjegyzes' => $request->megjegyzes
            ]);

            return response()->json([
                "status" => 200,
                "message" => "Logisztikai adatok sikeresen betöltve !",
                "data" => []
            ], 200);
        } catch (Exception $ex) {

            return response()->json([
                "status" => 500,
                "message" => "Hiba: a javaslat nem lett létrehozva." . $ex->getMessage(),
                "data" => []
            ], 500);
        }
    }
}
