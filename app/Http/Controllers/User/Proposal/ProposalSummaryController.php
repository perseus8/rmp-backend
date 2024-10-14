<?php

namespace App\Http\Controllers\User\Proposal;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Proposal;
use App\Models\ProposalItems;
use App\Models\ProposalLogistic;
use App\Models\ProposalPackingMaterial;
use App\Models\ProposalStretViewImages;
use App\Models\ProposalSummery;
use App\Models\ProposalTourPlan;
use App\Models\TransactionFee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProposalSummaryController extends Controller
{
    public function getSummery(Request $request)
    {
        try {
            $proposalId = $request->proposal_id;
            $proposalData = Proposal::where('proposals.id', $proposalId)->join('customers', 'customers.id', '=', 'proposals.customer_id')->get();
            $proposalTourPlan = ProposalTourPlan::where('proposal_id', $proposalId)->get();
            $proposalSummery = ProposalSummery::where('proposal_id', $proposalId)->get();
            $proposalLogistic = ProposalLogistic::where('proposal_id', $proposalId)->get();

            $stImage = ProposalStretViewImages::where('proposal_id', $proposalId)->get();
            return response()->json([
                "status" => 200,
                "message" => "Az összegző adatok sikeresen betöltődtek. !",
                "data" => [
                    'proposalData' => $proposalData,
                    'proposalTourPlan' => $proposalTourPlan,
                    'summeryData' => $proposalSummery,
                    'proposalLogistic' => $proposalLogistic,
                    'stImage' => $stImage
                ]
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "A összegző adatokat nem sikerült sikeresen betölteni!" . $ex->getMessage(),
                "data" => []
            ], 500);
        }
    }


    public function getData(Request $request)
    {
        try {
            $param = $request->proposal_id;
            $parts = explode('?', $param);
            $proposalId = $parts[0];
            $proposalData = Proposal::where('id', $proposalId)->get();
            $proposalTourPlan = ProposalTourPlan::where('proposal_id', $proposalId)->get();
            $propsoalItems = ProposalItems::where('proposal_id', $proposalId)->get();
            $proposalLogistic = ProposalLogistic::where('proposal_id', $proposalId)->get();
            $proposalSummery = ProposalSummery::where('proposal_id', $proposalId)->get();
            $fees = Fee::all();
            $transportFees = TransactionFee::all();
            $stImage = ProposalStretViewImages::where('proposal_id', $proposalId)->get();
            $proposalPkMaterials = ProposalPackingMaterial::where('proposal_id', $proposalId)->get();

            return response()->json([
                "status" => 200,
                "message" => "Az összegző adatok sikeresen betöltődtek. !",
                "data" => [
                    'proposalId' => $proposalId,
                    'proposalData' => $proposalData,
                    'proposalTourPlan' => $proposalTourPlan,
                    'proposalItems' => $propsoalItems,
                    'proposalLogistic' => $proposalLogistic,
                    'fees' => $fees,
                    'transportFees' => $transportFees,
                    'summeryData' => $proposalSummery,
                    'stImage' => $stImage,
                    'proposalPkMaterials' => $proposalPkMaterials
                ]
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "A összegző adatokat nem sikerült sikeresen betölteni!",
                "data" => []
            ], 500);
        }
    }

    public function saveData(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        } else {
            try {
                ProposalSummery::where('proposal_id', $request->proposal_id)->delete();
                $summary = ProposalSummery::create([
                    'proposal_id' => $request->proposal_id,
                    'jarmu_szukseglet' => $request->jarmu_szukseglet,
                    'munkaero_szukseglet' => $request->munkaero_szukseglet,
                    'tavolsag' => $request->tavolsag,
                    'terfogat' => $request->terfogat,
                    'alacsony_ar' => $request->alacsony_ar,
                    'utvonal_ar' => $request->utvonal_ar,
                    'stop_ar' => $request->stop_ar,
                    'nincs_zone_ar' => $request->nincs_zone_ar,
                    'bonstasi_ar' => $request->bonstasi_ar,
                    'telepitesi_ar' => $request->telepitesi_ar,
                    'csomagolasi_ar' => $request->csomagolasi_ar,
                    'buborekfolio_ar' => $request->buborekfolio_ar,
                    'nehez_rakomany_ar' => $request->nehez_rakomany_ar,
                    'butoremelo_ar' => $request->butoremelo_ar,
                    'kulso_lift_ar' => $request->kulso_lift_ar,
                    'bolti_ar' => $request->bolti_ar,
                    'szemelyzeti_ar' => $request->szemelyzeti_ar,
                    'konyhaszerelo_ar' => $request->konyhaszerelo_ar,
                    'villanyszerelo_ar' => $request->villanyszerelo_ar,
                    'teljes_ar' => $request->teljes_ar,
                    'kedvezmeny' => $request->kedvezmeny,
                    'osszesen' => $request->osszesen,
                    'megjegyes' => $request->megjegyes,
                    'tavolsag_checked' => $request->tavolsag_checked,
                    'terfogat_checked' => $request->terfogat_checked,
                    'alacsony_ar_checked' => $request->alacsony_ar_checked,
                    'utvonal_ar_checked' => $request->utvonal_ar_checked,
                    'stop_ar_checked' => $request->stop_ar_checked,
                    'nincs_zone_ar_checked' => $request->nincs_zone_ar_checked,
                    'bonstasi_ar_checked' => $request->bonstasi_ar_checked,
                    'telepitesi_ar_checked' => $request->telepitesi_ar_checked,
                    'csomagolasi_ar_checked' => $request->csomagolasi_ar_checked,
                    'buborekfolio_ar_checked' => $request->buborekfolio_ar_checked,
                    'nehez_rakomany_ar_checked' => $request->nehez_rakomany_ar_checked,
                    'butoremelo_ar_checked' => $request->butoremelo_ar_checked,
                    'kulso_lift_ar_checked' => $request->kulso_lift_ar_checked,
                    'bolti_ar_checked' => $request->bolti_ar_checked,
                    'szemelyzeti_ar_checked' => $request->szemelyzeti_ar_checked,
                    'konyhaszerelo_ar_checked' => $request->konyhaszerelo_ar_checked,
                    'villanyszerelo_ar_checked' => $request->villanyszerelo_ar_checked,
                    'teljes_ar_checked' => $request->teljes_ar_checked,
                    'kedvezmeny_checked' => $request->kedvezmeny_checked,
                    'osszesen_checked' => $request->osszesen_checked,
                    'tetal_ar' => $request->tetal_ar ?? 0,
                    'tetal_ar_checked' => $request->tetal_ar_checked ?? false,
                    'verpackungsmaterial_ar' => $request->verpackungsmaterial_ar ?? 0,
                    'verpackungsmaterial_ar_checked' => $request->verpackungsmaterial_ar_checked ?? false,
                    'kuchenmonteur' => $request->kuchenmonteur_ar ?? 0,
                    'kuchenmonteur_checked' => $request->kuchenmonteur_ar_checked ?? false,
                    'extra_service' => $request->extra_service ?? "",
                    'extra_service_ar' => $request->extra_service_ar ?? 0,
                    'extra_service_checked' => $request->extra_service_checked ?? false,
                    'tarolasi' => $request->tarolasi ?? "",
                    'tarolasi_ar' => $request->tarolasi_ar ?? 0,
                    'tarolasi_checked' => $request->tarolasi_checked ?? false,
                ]);

                Proposal::where('id', $request->proposal_id)->update([
                    'total_amount' => $request->osszesen
                ]);

                return response()->json([
                    "status" => 200,
                    "message" => "Javaslat sikeresen létrehozva.",
                    "data" => ['summary' => $summary]
                ], 200);
            } catch (Exception $ex) {
                return response()->json([
                    "status" => 500,
                    "message" => "Hiba, javaslat nem lett létrehozva." . $ex->getMessage(),
                    "data" => []
                ], 500);
            }
        }
    }

    protected function rules()
    {
        return [
            'proposal_id' => 'required',
            'jarmu_szukseglet' => 'required|numeric',
            'munkaero_szukseglet' => 'required|numeric',
            'tavolsag' => 'required|numeric',
            'terfogat' => 'required|numeric',
            'alacsony_ar' => 'required|numeric',
            'utvonal_ar' => 'required|numeric',
            'stop_ar' => 'required|numeric',
            'nincs_zone_ar' => 'required|numeric',
            'bonstasi_ar' => 'required|numeric',
            'telepitesi_ar' => 'required|numeric',
            'csomagolasi_ar' => 'required|numeric',
            'buborekfolio_ar' => 'required|numeric',
            'nehez_rakomany_ar' => 'required|numeric',
            'butoremelo_ar' => 'required|numeric',
            'kulso_lift_ar' => 'required|numeric',
            'bolti_ar' => 'required|numeric',
            'szemelyzeti_ar' => 'required|numeric',
            'konyhaszerelo_ar' => 'required|numeric',
            'villanyszerelo_ar' => 'required|numeric',
            'teljes_ar' => 'required|numeric',
            'kedvezmeny' => 'required|numeric',
            'osszesen' => 'required|numeric',
            'megjegyes' => 'nullable|string',
            'tavolsag_checked' => 'required|boolean',
            'terfogat_checked' => 'required|boolean',
            'alacsony_ar_checked' => 'required|boolean',
            'utvonal_ar_checked' => 'required|boolean',
            'stop_ar_checked' => 'required|boolean',
            'nincs_zone_ar_checked' => 'required|boolean',
            'bonstasi_ar_checked' => 'required|boolean',
            'telepitesi_ar_checked' => 'required|boolean',
            'csomagolasi_ar_checked' => 'required|boolean',
            'buborekfolio_ar_checked' => 'required|boolean',
            'nehez_rakomany_ar_checked' => 'required|boolean',
            'butoremelo_ar_checked' => 'required|boolean',
            'kulso_lift_ar_checked' => 'required|boolean',
            'bolti_ar_checked' => 'required|boolean',
            'szemelyzeti_ar_checked' => 'required|boolean',
            'konyhaszerelo_ar_checked' => 'required|boolean',
            'villanyszerelo_ar_checked' => 'required|boolean',
            'teljes_ar_checked' => 'required|boolean',
            'kedvezmeny_checked' => 'required|boolean',
            'osszesen_checked' => 'required|boolean'
        ];
    }

    protected function messages()
    {
        return [
            'proposal_id.required' => 'The proposal ID is required.',

            'jarmu_szukseglet.required' => 'Entering the vehicle requirement is mandatory.',
            'jarmu_szukseglet.numeric' => 'The vehicle requirement can only be a number.',

            'munkaero_szukseglet.required' => 'Manpower requirements are mandatory.',
            'munkaero_szukseglet.numeric' => 'The need for labor can only be a number.',

            'tavolsag.required' => 'Specifying the distance is mandatory.',
            'tavolsag.numeric' => 'The distance can only be a number.',

            'terfogat.required' => 'Entering the volume is mandatory.',
            'terfogat.numeric' => 'Volume can only be a number.',

            'alacsony_ar.required' => 'Entering the low price is mandatory.',
            'alacsony_ar.numeric' => 'The low price can only be a number.',

            'utvonal_ar.required' => 'Entering the price of the route is mandatory.',
            'utvonal_ar.numeric' => 'The route price can only be a number.',

            'stop_ar.required' => 'Specifying the stop price is mandatory.',
            'stop_ar.numeric' => 'The stop price can only be a number.',

            'nincs_zone_ar.required' => 'Entering the "No Zone" price is mandatory.',
            'nincs_zone_ar.numeric' => 'The "No Zone" price can only be a number.',

            'bonstasi_ar.required' => 'Entering the price in Bonsta is mandatory.',
            'bonstasi_ar.numeric' => 'The price in Bonstas can only be a number.',

            'telepitesi_ar.required' => 'Specifying the installation price is mandatory.',
            'telepitesi_ar.numeric' => 'The installation price can only be a number.',

            'csomagolasi_ar.required' => 'Specifying the packaging price is mandatory.',
            'csomagolasi_ar.numeric' => 'The packaging price can only be a number.',

            'buborekfolio_ar.required' => 'Entering the bubble wrap price is mandatory.',
            'buborekfolio_ar.numeric' => 'The bubble wrap price can only be a number.',

            'nehez_rakomany_ar.required' => 'Entering the heavy cargo price is mandatory.',
            'nehez_rakomany_ar.numeric' => 'The heavy cargo price can only be a number.',

            'butoremelo_ar.required' => 'Entering the furniture lifting price is mandatory.',
            'butoremelo_ar.numeric' => 'The furniture lifting price can only be a number.',

            'kulso_lift_ar.required' => 'Entering the price of the external elevator is mandatory.',
            'kulso_lift_ar.numeric' => 'The external elevator price can only be a number.',

            'bolti_ar.required' => 'Entering the store price is mandatory.',
            'bolti_ar.numeric' => 'The store price can only be a number.',

            'szemelyzeti_ar.required' => 'Specifying the staff price is mandatory.',
            'szemelyzeti_ar.numeric' => 'The staff price can only be a number.',

            'konyhaszerelo_ar.required' => 'Entering the kitchen fitting price is mandatory.',
            'konyhaszerelo_ar.numeric' => 'The kitchen fitting price can only be a number.',

            'villanyszerelo_ar.required' => `Entering the electrician's price is mandatory.`,
            'villanyszerelo_ar.numeric' => 'The electrician price can only be a number.',

            'teljes_ar.required' => 'Entering the full price is mandatory.',
            'teljes_ar.numeric' => 'The total price can only be a number.',

            'kedvezmeny.required' => 'Giving the discount is mandatory.',
            'kedvezmeny.numeric' => 'The discount can only be a number.',

            'osszesen.required' => 'Specifying "Total" is mandatory.',
            'osszesen.numeric' => '"Total" can only be a number.',

            'megjegyes.string' => 'Comment can be text only.',

            'tavolsag_checked.required' => 'Checking "Distance" is mandatory.',
            'tavolsag_checked.boolean' => 'The value of "Distance" can only be true or false.',

            'terfogat_checked.required' => 'Checking "Volume" is mandatory.',
            'terfogat_checked.boolean' => 'The value of "Volume" can only be true or false.',

            'alacsony_ar_checked.required' => 'Checking "Low Price" is mandatory.',
            'alacsony_ar_checked.boolean' => 'The value of "Low Price" can only be true or false.',

            'utvonal_ar_checked.required' => 'Checking the "Route price" is mandatory.',
            'utvonal_ar_checked.boolean' => 'The "Route price" value can only be true or false.',

            'stop_ar_checked.required' => 'Checking the "Stop price" is mandatory.',
            'stop_ar_checked.boolean' => 'The value of "Stop price" can only be true or false.',

            'nincs_zone_ar_checked.required' => 'Checking the "No Zone" price is mandatory.',
            'nincs_zone_ar_checked.boolean' => 'The "No Zone" price value can only be true or false.',

            'bonstasi_ar_checked.required' => 'Checking the "Bonstasi price" is mandatory.',
            'bonstasi_ar_checked.boolean' => 'The value of "Bonstasi price" can only be true or false.',

            'telepitesi_ar_checked.required' => 'Checking the "Installation price" is mandatory.',
            'telepitesi_ar_checked.boolean' => 'The value of "Installation price" can only be true or false.',

            'csomagolasi_ar_checked.required' => 'Checking the "Package price" is mandatory.',
            'csomagolasi_ar_checked.boolean' => 'The value of "Packaging Price" can only be true or false.',

            'buborekfolio_ar_checked.required' => 'Checking the "Bubble film price" is mandatory.',
            'buborekfolio_ar_checked.boolean' => 'The value of "Bubble wrap price" can only be true or false.',

            'nehez_rakomany_ar_checked.required' => 'Checking the "Heavy cargo price" is mandatory.',
            'nehez_rakomany_ar_checked.boolean' => 'The value of "Heavy cargo price" can only be true or false.',

            'butoremelo_ar_checked.required' => 'Checking the "Furniture lift price" is mandatory.',
            'butoremelo_ar_checked.boolean' => 'The value of "Furniture lifter price" can only be true or false.',

            'kulso_lift_ar_checked.required' => 'Checking the "External lift price" is mandatory.',
            'kulso_lift_ar_checked.boolean' => 'The value of "External elevator price" can only be true or false.',

            'bolti_ar_checked.required' => 'Checking the "Shop price" is mandatory.',
            'bolti_ar_checked.boolean' => 'The value of "Store price" can only be true or false.',

            'szemelyzeti_ar_checked.required' => 'Checking the "Personnel price" is mandatory.',
            'szemelyzeti_ar_checked.boolean' => 'The value of "Personnel price" can only be true or false.',

            'konyhaszerelo_ar_checked.required' => 'Checking the "Kitchen fitter price" is mandatory.',
            'konyhaszerelo_ar_checked.boolean' => 'The value of "Kitchen fitter price" can only be true or false.',

            'villanyszerelo_ar_checked.required' => 'Checking the "Electrician price" is mandatory.',
            'villanyszerelo_ar_checked.boolean' => 'The value of "Electrician price" can only be true or false.',

            'teljes_ar_checked.required' => 'Checking the "Total" price is mandatory.',
            'teljes_ar_checked.boolean' => 'The "Total" price value can only be true or false.',

            'kedvezmeny_checked.required' => 'Verification of the discount is mandatory.',
            'kedvezmeny_checked.boolean' => 'The discount value can only be true or false.',

            'osszesen_checked.required' => 'Checking "Total" is mandatory.',
            'osszesen_checked.boolean' => 'The value of "Total" can only be true or false.',
        ];
    }
}
