<?php

namespace App\Http\Controllers\User\Proposal;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use App\Models\ProposalItems;
use App\Models\ProposalStretViewImages;
use App\Models\ProposalTourPlan;
use App\Models\StartLocation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProposalTourPlanController extends Controller
{
    public function getTourPlan(Request $request)
    {
        $proposal_id = $request->proposal_id;

        try {
            $proposalTourPlan = ProposalTourPlan::where('proposal_id', $proposal_id)->orderBy('sort_index')->get();
            $startLocations = StartLocation::all();
            $tourImages = ProposalStretViewImages::where('proposal_id', $proposal_id)->get();
            $proposalData = Proposal::where('id', $proposal_id)->get();

            return response()->json([
                "status" => 200,
                "message" => "Túratervezés betöltve !",
                "data" => [
                    'proposalTourPlan' => $proposalTourPlan,
                    'startLocations' => $startLocations,
                    'tourImages' => $tourImages,
                    'proposalData' => $proposalData
                ]
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Hiba: A túratervezés nem lett betöltve !" . $ex->getMessage(),
                "data" => []
            ], 500);
        }
    }


    public function createRules()
    {
        // location name
        return [
            'proposal_id' => ['required'],
            'places.*.place_id' => 'required',
            'places.*.cim' => 'required',
            'places.*.helyszin_neve' => 'nullable',
            'places.*.latitude' => 'required|numeric',
            'places.*.longitute' => 'required|numeric',
            'places.*.streetNumber' => 'nullable',
            'places.*.route' => 'nullable',
            'places.*.country' => 'nullable',
            'places.*.postalCode' => 'nullable',
            'places.*.locality' => 'nullable',
            'places.*.emelet' => 'nullable',
            'places.*.tavolsag' => 'nullable',
            'places.*.megallo' => 'nullable',
            'places.*.lift' => 'nullable|boolean',
            'places.*.szuk_lepcsohaz' => 'nullable|boolean',
            'places.*.kozteruleti_ugyintezes' => 'nullable|boolean',
            'places.*.note' => 'nullable|string|max:1000',
        ];
    }

    public function createMessages()
    {
        return [
            'required' => 'A(z) :attribute mező kötelező.',
            'integer' => 'A(z) :attribute mező csak egész szám lehet.',
            'numeric' => 'A(z) :attribute mező csak szám lehet.',
            'boolean' => 'A(z) :attribute mező csak igaz vagy hamis lehet.',
            'max' => [
                'string' => 'A(z) :attribute mező maximum :max karakter lehet.',
            ],
        ];
    }



    public function create(Request $request)
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
                $proposal_id =  $request->proposal_id;
                $places = $request->places;
                $tourImages = $request->tourImages;
                $oldProposalItems = DB::table('proposal_tour_plans')->where('proposal_id', $proposal_id)->get();
                ProposalStretViewImages::where('proposal_id', $proposal_id)->delete();
                foreach ($places as $place) {
                    $existProposalItem = ProposalTourPlan::where('proposal_id', $proposal_id)->where('place_id', $place['place_id'])->get();
                    if (count($existProposalItem) > 0) {
                        $existProposalItem[0]->update([
                            'place_id' => $place['place_id'],
                            'cim' => $place['cim'],
                            'helyszin_neve' => $place['helyszin_neve'] ?? null,
                            'latitude' => $place['latitude'],
                            'longitute' => $place['longitute'],
                            'streetNumber' => $place['streetNumber'] ?? null,
                            'route' => $place['route'] ?? null,
                            'country' => $place['country'] ?? null,
                            'postalCode' => $place['postalCode'] ?? null,
                            'locality' => $place['locality'] ?? null,
                            'inter_distance' => $place['inter_distance'] ?? null,
                            'sort_index' => $place['sort_index'],
                            'start_index' => $place['start_index'] ?? null,
                            'onloadingIndex' => $place['onloadingIndex'] ?? 0,
                        ]);
                    } else {
                        $tourPlan = new ProposalTourPlan();

                        $tourPlan->place_id = $place['place_id'];
                        $tourPlan->cim = $place['cim'];
                        $tourPlan->helyszin_neve = $place['helyszin_neve'] ?? null;
                        $tourPlan->latitude = $place['latitude'];
                        $tourPlan->longitute = $place['longitute'];
                        $tourPlan->streetNumber = $place['streetNumber'] ?? null;
                        $tourPlan->route = $place['route'] ?? null;
                        $tourPlan->country = $place['country'] ?? null;
                        $tourPlan->postalCode = $place['postalCode'] ?? null;
                        $tourPlan->locality = $place['locality'] ?? null;
                        $tourPlan->inter_distance = $place['inter_distance'] ?? 0;
                        $tourPlan->emelet = $place['emelet'] ?? null;
                        $tourPlan->tavolsag = $place['tavolsag'] ?? null;
                        $tourPlan->megallo = $place['megallo'] ?? null;
                        $tourPlan->lift = $place['lift'] ?? false;
                        $tourPlan->szuk_lepcsohaz = $place['szuk_lepcsohaz'] ?? false;
                        $tourPlan->kozteruleti_ugyintezes = $place['kozteruleti_ugyintezes'] ?? false;
                        $tourPlan->note = $place['note'] ?? null;
                        $tourPlan->sort_index = $place['sort_index'] ?? null;
                        $tourPlan->start_index = $place['start_index'] ?? null;
                        $tourPlan->onloadingIndex = $place['onloadingIndex'] ?? 0;
                        // Assuming you have a proposalId in your request
                        $tourPlan->proposal_id = $proposal_id;

                        $tourPlan->save();
                    }
                }

                foreach ($tourImages as $tourImage) {
                    ProposalStretViewImages::create([
                        'proposal_id' => $request->proposal_id,
                        'place_id' => $tourImage['place_id'],
                        'image' => $tourImage['image'],
                    ]);
                }





                $places = array_map(function ($item) {
                    return (array) $item;
                }, $places);


                $oldProposalItemsArr = $oldProposalItems->toArray();

                $oldProposalItemsArr = array_map(function ($item) {
                    return (array) $item;
                }, $oldProposalItemsArr);

                $results = array_udiff($oldProposalItemsArr, $places, function ($a, $b) {
                    return $a['place_id'] <=> $b['place_id'];
                });


                foreach ($results as $result) {
                    $oldProposalItems = ProposalTourPlan::where('proposal_id', $proposal_id)->where('place_id', $result['place_id'])->get();
                    ProposalItems::where('proposal_id', $proposal_id)->where('location_id', $oldProposalItems[0]->id)->delete();
                    $oldProposalItems[0]->delete();
                }

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
