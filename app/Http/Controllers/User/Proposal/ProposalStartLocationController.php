<?php

namespace App\Http\Controllers\User\Proposal;

use App\Http\Controllers\Controller;
use App\Models\StartLocation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class ProposalStartLocationController extends Controller
{
    public function createRules()
    {
        return [
            'place_id' => 'required',
            'cim' => 'required',
            'helyszin_neve' => 'required',
            'latitude' => 'required|numeric',
            'longitute' => 'required|numeric',
        ];
    }

    public function createMessages()
    {
        return [
            'place_id.required' => 'Entering the location ID is mandatory.',
            'cim.required' => 'Entering the address is mandatory.',
            'helyszin_neve.required' => 'Entering the name is mandatory.',
            'latitude.required' => 'Entering the latitude is mandatory.',
            'latitude.numeric' => 'The latitude value must be a number.',
            'longitute.required' => 'Entering the longitude is mandatory.',
            'longitute.numeric' => 'The longitude value must be a number.',
        ];
    }
    public function createStartLocation(Request $request)
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
                $startLocation = StartLocation::where('place_id', $request->place_id)->get();
                if (count($startLocation) == 0) {
                    $startLocation = StartLocation::create([
                        'place_id' => $request->place_id,
                        'cim' => $request->cim,
                        'helyszin_neve' => $request->helyszin_neve,
                        'latitude' => $request->latitude,
                        'longitute' => $request->longitute,
                        'streetNumber' => $request->streetNumber,
                        'route' => $request->route,
                        'country' => $request->country,
                        'postalCode' => $request->postalCode,
                        'locality' => $request->locality,
                    ]);
                    return response()->json([
                        "status" => 200,
                        "message" => "The starting location has been created successfully.",
                        "data" => ['startLocation' => $startLocation]
                    ], 200);
                } else {
                    return response()->json([
                        "status" => 500,
                        "message" => "The starting location already exists",
                        "data" => ['startLocation' => $startLocation]
                    ], 500);
                }
            } catch (Exception $ex) {
                Log::error($ex);
                return response()->json([
                    "status" => 500,
                    "message" => "Error, the starting location was not created." . $ex->getMessage(),
                    "data" => []
                ], 500);
            }
        }
    }

    public function getStartLocation(Request $request)
    {
        try {
            $startLocation = StartLocation::all();
            return response()->json([
                "status" => 200,
                "message" => "The summary data has been loaded successfully.",
                "data" => [
                    'startLocation' => $startLocation,
                ]
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "The summary data could not be loaded successfully!",
                "data" => []
            ], 500);
        }
    }
}
