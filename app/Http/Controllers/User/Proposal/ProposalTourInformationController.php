<?php

namespace App\Http\Controllers\User\Proposal;

use App\Http\Controllers\Controller;
use App\Models\ProposalTourPlan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProposalTourInformationController extends Controller
{
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
    public function updateTourInformation(Request $request)
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
                $places = $request->places;

                $proposal_id =  $request->proposal_id;
                foreach ($places as $place) {
                    ProposalTourPlan::where('id', $place['id'])->update([
                        'emelet' => $place['emelet'],
                        'tavolsag' => $place['tavolsag'],
                        'megallo' => $place['megallo'],
                        'lift' => $place['lift'] ?? false,
                        'szuk_lepcsohaz' => $place['szuk_lepcsohaz'] ?? false,
                        'kozteruleti_ugyintezes' => $place['kozteruleti_ugyintezes'] ?? false,
                        'note' => $place['note'],
                    ]);
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
