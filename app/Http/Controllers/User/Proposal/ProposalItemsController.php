<?php

namespace App\Http\Controllers\User\Proposal;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\PackingMaterial;
use App\Models\Proposal;
use App\Models\ProposalItems;
use App\Models\ProposalPackingMaterial;
use App\Models\ProposalTourPlan;
use App\Models\TransactionFee;
use App\Models\Zone;
use App\Models\ZoneItems;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProposalItemsController extends Controller
{
    public function getList(Request $request)
    {
        $proposal_id = $request->proposal_id;

        try {
            // $zoneItems = ZoneItems::limit(10)->get();
            $zoneItems = ZoneItems::all();
            $proposalData = Proposal::where('id', $proposal_id)->get();
            $zones = Zone::all();
            $proposalTourPlan = ProposalTourPlan::where('proposal_id', $proposal_id)->get();
            $proposalItems = ProposalItems::where('proposal_id', $proposal_id)->get();
            $fees = Fee::all();
            $transactionFee = TransactionFee::all();
            $packingMaterials = PackingMaterial::all();
            $proposalPackingMaterials = ProposalPackingMaterial::where('proposal_id', $proposal_id)->get();

            return response()->json([
                "status" => 200,
                "message" => "Az ajánlat tételei sikeresen betöltve!",
                "data" => [
                    'zones' => $zones,
                    'zoneItems' => $zoneItems,
                    'proposalTourPlan' => $proposalTourPlan,
                    'proposalItems' => $proposalItems,
                    'fees' => $fees,
                    'transactionFee' => $transactionFee,
                    'packingMaterials' => $packingMaterials,
                    'proposalPackingMaterials' => $proposalPackingMaterials,
                    'proposalData' => $proposalData
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
    }

    protected function createRules()
    {
        return [
            'proposal_id' => ['required'],
            'proposalItems' => 'required|array',
        ];
    }

    protected function createMessages()
    {
        return [
            'proposal_id.required' => 'Proposal ID is required.',
            'proposalItems.required' => 'The array field is required.',
            'proposalItems.array' => 'The array field must be of array type.',
        ];
    }
    public function saveProposalItems(Request $request)
    {
        $validator = Validator::make($request->all(), $this->createRules(), $this->createMessages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        } else {
            try {
                $proposalItems = $request->proposalItems;
                $packingMaterials =  $request->packingMaterials;
                $proposal_id =  $request->proposal_id;
                ProposalItems::where('proposal_id', $proposal_id)->delete();
                ProposalPackingMaterial::where('proposal_id', $proposal_id)->delete();

                $totalAmount = 0;
                $totalCapacity = 0;
                foreach ($proposalItems as $proposalItem) {
                    $totalCapacity  = $totalCapacity + $proposalItem['volume'] * $proposalItem['gegenstand'];
                    $totalAmount  = $totalAmount + $proposalItem['zwischensum'];

                    ProposalItems::create([
                        'proposal_id' => $proposal_id,
                        'zone_id' => $proposalItem['zone_id'],
                        'location_id' => $proposalItem['location_id'],
                        'item_id' => $proposalItem['item_id'],
                        'targy_neve' => $proposalItem['targy_neve'],
                        'dubel_arbeiten' => $proposalItem['dubel_arbeiten'],
                        'villanyszerelo' => $proposalItem['villanyszerelo'],
                        'konyhaszerelo' => $proposalItem['konyhaszerelo'],
                        'volume' => $proposalItem['volume'],
                        'csomagolasi_ido' => $proposalItem['csomagolasi_ido'],
                        'buborekcsomagolasi_ido' => $proposalItem['buborekcsomagolasi_ido'],
                        'kicsomagolasi_ido' => $proposalItem['kicsomagolasi_ido'],
                        'szetszerelesi_ido' => $proposalItem['szetszerelesi_ido'],
                        'osszeszerelesi_ido' => $proposalItem['osszeszerelesi_ido'],
                        'gegenstand' => $proposalItem['gegenstand'],
                        'entladen' => $proposalItem['entladen'],
                        'demontage_checked' => $proposalItem['demontage_checked'],
                        'montage_checked' => $proposalItem['montage_checked'],
                        'einpacken_checked' => $proposalItem['einpacken_checked'],
                        'luftpolsterfol_checked' => $proposalItem['luftpolsterfol_checked'],
                        'auspacken_checked' => $proposalItem['auspacken_checked'],
                        'entsorgen_checked' => $proposalItem['entsorgen_checked'],
                        'einlagern_checked' => $proposalItem['einlagern_checked'],
                        'schwergut_checked' => $proposalItem['schwergut_checked'],
                        'nicht_zerlegbar_checked' => $proposalItem['nicht_zerlegbar_checked'],
                        'capacity' => $proposalItem['volume'] * $proposalItem['gegenstand'],
                        'zwischensum' => $proposalItem['zwischensum'],
                    ]);
                }
                foreach ($packingMaterials as $packingMaterial) {
                    ProposalPackingMaterial::create([
                        'proposal_id' => $proposal_id,
                        'packing_material_id' => $packingMaterial['id'],
                        'verpackungsmaterial' => $packingMaterial['verpackungs_material'],
                        'gegenstand' => $packingMaterial['gegenstand'],
                        'ar' => $packingMaterial['ar'],
                        'location_id' => $packingMaterial['location_id'],
                        'zwischensum' => $packingMaterial['zwischensum'],
                    ]);
                }

                Proposal::where('id', $proposal_id)->update([
                    'total_capacity' => $totalCapacity,
                    'total_amount' => $totalAmount
                ]);
                return response()->json([
                    "status" => 200,
                    "message" => "Tour planning successfully saved!",
                    "data" => ['proposal' => []]
                ], 200);
            } catch (Exception $ex) {
                return response()->json([
                    "status" => 500,
                    "message" => "Error: proposal not created." . $ex->getMessage(),
                    "data" => []
                ], 500);
            }
        }
    }
}
