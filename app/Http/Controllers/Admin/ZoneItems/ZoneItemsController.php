<?php

namespace App\Http\Controllers\Admin\ZoneItems;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\ZoneItems;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ZoneItemsController extends Controller
{

    public function list(Request $request)
    {
        try {

            $zone = Zone::where('id', $request->zoneId)->get();
            if ($zone->count() == 0) {
                return response()->json([
                    "status" => 404,
                    "message" => "Az adott zóna nem található !",
                    "data" => []
                ], 404);
            } else {
                $zones = ZoneItems::where('zone_id', $request->zoneId)->where('targy_neve', 'like', '%' . $request->searchQuery . '%')->get();
                return response()->json([
                    "status" => 200,
                    "message" => "Zóna tételek sikeresen betöltve !",
                    "data" => ['zones' => $zones, 'zone' => $zone[0]]
                ], 200);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Hiba, a zóna elemei nincsenek betöltve !",
                "data" => []
            ], 500);
        }
    }


    public function validateRules()
    {

        return [
            // Item name
            'targyNeve' => ['required'],
            // Zone Id
            'zoneId' => ['required'],
            // Dowel Work
            'dubelArbeiten' => ['required', 'boolean'],
            // electrician
            'villanyszerelo' => ['required', 'boolean'],
            // kitchen fitter
            'konyhaszerelo' => ['required', 'boolean'],
            // Volume
            'volume' => ['required', 'numeric'],
            // Packing Time Per Person
            'csomagolasiIdo' => ['nullable', 'numeric'],
            // Bubble Packing Time Per Person
            'buborekcsomagolasiIdo' => ['nullable', 'numeric'],
            // Un Packing Time Per Person
            'kicsomagolasiIdo' => ['nullable', 'numeric'],
            // disassembly time per person
            'szetszerelesiIdo' => ['nullable', 'numeric'],
            // Assembly Time per person
            'osszeszerelesiIdo' => ['nullable', 'numeric'],
        ];
    }



    public function validateMessage()
    {
        return [
            // Item Name
            'targyNeve.required' => 'Subject name, required',

            // Zone Id
            'zoneId' => 'Zone is mandatory.',

            // Dowel Work
            'dubelArbeiten.required' => `Something I Don't Understand is a must`,
            'dubelArbeiten.boolean' => `Something I don't understand should be a boolean`,

            // electrician
            'villanyszerelo.required' => 'Electrician is mandatory',
            'villanyszerelo.boolean' => 'Electrician should be a logical value',

            // Kitchen Fitter
            'konyhaszerelo.required' => 'Kitchen fitter is mandatory',
            'konyhaszerelo.boolean' => 'Kitchen fitter should be a logical value',

            // Volume
            'volume.numeric' => 'Electrician should be numeric',

            // Packing Time
            'csomagolasiIdo.numeric' => 'The Packing time/person should be numerical',

            // Bubble Wrapping
            'buborekcsomagolasiIdo.numeric' => 'Blister time/person should be numeric',

            // UnPacking Time
            'kicsomagolasiIdo.numeric' => 'The Unpacking time / head should be numeric',

            // Disassebly Time
            'szetszerelesiIdo.numeric' => 'The Disassembly time / head is numerical',

            // Assembly Time
            'osszeszerelesiIdo.numeric' => 'Assembly time/person should be numeric',
        ];
    }


    public  function create(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validateRules(), $this->validateMessage());
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        } else {
            try {

                $zoneItem = ZoneItems::create([
                    'zone_id' => $request->zoneId,
                    'targy_neve' => $request->targyNeve,
                    'dubel_arbeiten' => $request->dubelArbeiten,
                    'villanyszerelo' => $request->villanyszerelo,
                    'konyhaszerelo' => $request->konyhaszerelo,
                    'volume' => $request->volume ?? 0,
                    'csomagolasi_ido' => $request->csomagolasiIdo ?? 0,
                    'buborekcsomagolasi_ido' => $request->buborekcsomagolasiIdo ?? 0,
                    'kicsomagolasi_ido' => $request->kicsomagolasiIdo ?? 0,
                    'szetszerelesi_ido' => $request->szetszerelesiIdo ?? 0,
                    'osszeszerelesi_ido' => $request->osszeszerelesiIdo ?? 0,
                ]);

                return response()->json([
                    "status" => 200,
                    "message" => "Zóna elem sikeresen létrehozva.",
                    "data" => ['zoneItem' => $zoneItem]
                ], 200);
            } catch (Exception $ex) {
                Log::error($ex);
                dd($ex);
                return response()->json([
                    "status" => 500,
                    "message" => "Hiba, zóna elem nem lett létrehozva!",
                    "data" => []
                ], 500);
            }
        }
    }

    public function getData(Request $request)
    {
        try {
            $zoneItems = ZoneItems::with('zone')->where('id', $request->id)->get();
            if ($zoneItems->count() == 0) {
                return response()->json([
                    "status" => 404,
                    "message" => "Zóna elem nem található!",
                    "data" => []
                ], 404);
            } else {
                return response()->json([
                    "status" => 200,
                    "message" => "Zóna elem sikeresen betöltve!",
                    "data" => ['zone' => $zoneItems[0]]
                ], 200);
            }
        } catch (Exception $ex) {
            Log::error($ex);

            return response()->json([
                "status" => 500,
                "message" => "Hiba, zóna elem nem lett betöltve!" . $ex->getMessage(),
                "data" => []
            ], 500);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validateRules(), $this->validateMessage());
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        } else {
            try {

                $zoneItem =  ZoneItems::where('id', $request->id)->get();
                if ($zoneItem->count() == 0) {
                    return response()->json([
                        "status" => 404,
                        "message" => "Zóna elem nem található.",
                        "data" => []
                    ], 404);
                } else {

                    $zoneItem[0]->update([
                        'zone_id' => $request->zoneId,
                        'targy_neve' => $request->targyNeve,
                        'dubel_arbeiten' => $request->dubelArbeiten,
                        'villanyszerelo' => $request->villanyszerelo,
                        'konyhaszerelo' => $request->konyhaszerelo,
                        'volume' => $request->volume ?? 0,
                        'csomagolasi_ido' => $request->csomagolasiIdo ?? 0,
                        'buborekcsomagolasi_ido' => $request->buborekcsomagolasiIdo ?? 0,
                        'kicsomagolasi_ido' => $request->kicsomagolasiIdo ?? 0,
                        'szetszerelesi_ido' => $request->szetszerelesiIdo ?? 0,
                        'osszeszerelesi_ido' => $request->osszeszerelesiIdo ?? 0,
                    ]);

                    return response()->json([
                        "status" => 200,
                        "message" => "Zóna elem sikeresen frissítve.",
                        "data" => ['zone' => $zoneItem]
                    ], 200);
                }
            } catch (Exception $ex) {
                Log::error($ex);
                return response()->json([
                    "status" => 500,
                    "message" => "Hiba, zóna elem nem lett frissítve!",
                    "data" => []
                ], 500);
            }
        }
    }

    public function delete(Request $request)
    {
        try {
            $zoneItem = ZoneItems::where('id', $request->id)->get();
            if ($zoneItem->count() == 0) {

                return response()->json([
                    "status" => 404,
                    "message" => "Zóna elem nem található. ",
                    "data" => []
                ], 404);
            } else {
                $zoneItem[0]->delete();
                return response()->json([
                    "status" => 200,
                    "message" => "Zóna elem sikeresen eltávolítva.",
                    "data" => []
                ], 200);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Hiba, zóna elem nem lett frissítve!",
                "data" => []
            ], 500);
        }
    }
}
