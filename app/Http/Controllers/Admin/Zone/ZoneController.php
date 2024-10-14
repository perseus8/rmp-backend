<?php

namespace App\Http\Controllers\Admin\Zone;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\ZoneItems;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ZoneController extends Controller
{
    public function list(Request $request)
    {
        try {
            $zones = Zone::where('nev', 'like', '%' . $request->searchQuery . '%')->get();
            return response()->json([
                "status" => 200,
                "message" => "Zónák sikeresen betöltve !",
                "data" => ['zones' => $zones]
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Hiba, Zóna nem töltődött be !",
                "data" => []
            ], 500);
        }
    }

    public function createRules()
    {
        return [
            'nev' => ['required', 'unique:zones,nev']
        ];
    }

    public function createMessages()
    {
        return [
            'nev.required' => 'Name must be entered.',
            'nev.unique' => 'The zone name has already been used.',
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
                $zone = Zone::create([
                    'nev' => $request->nev
                ]);

                return response()->json([
                    "status" => 200,
                    "message" => "Zóna sikeresen létrehozva.",
                    "data" => ['zone' => $zone]
                ], 200);
            } catch (Exception $ex) {
                Log::error($ex);
                return response()->json([
                    "status" => 500,
                    "message" => "Hiba, zóna nem lett létrehozva !",
                    "data" => []
                ], 500);
            }
        }
    }

    public function getData(Request $request)
    {
        try {
            $zones = Zone::where('id', $request->id)->get();
            if ($zones->count() == 0) {
                return response()->json([
                    "status" => 404,
                    "message" => "Zóna nem található !",
                    "data" => $zones
                ], 404);
            } else {
                return response()->json([
                    "status" => 200,
                    "message" => "Zónák sikeresen betöltve !",
                    "data" => $zones
                ], 200);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            dd($ex);
            return response()->json([
                "status" => 500,
                "message" => "Hiba, zóna nem lett betöltve !",
                "data" => []
            ], 500);
        }
    }


    public function updateRules($id)
    {
        return [
            'nev' => ['required', 'unique:zones,nev,' . $id]
        ];
    }

    public function updateMessages()
    {
        return [
            'nev.required' => 'Zóna Nevet meg kell adni.',
            'nev.unique' => 'Zóna nevet már felhasználták.',
        ];
    }


    public function update(Request $request)

    {
        $validator = Validator::make($request->all(), $this->updateRules($request->id), $this->updateMessages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        } else {
            try {

                $zone =  Zone::where('id', $request->id)->get();
                if ($zone->count() == 0) {
                    return response()->json([
                        "status" => 404,
                        "message" => "Zóna nem található.",
                        "data" => []
                    ], 404);
                } else {

                    $zone[0]->update([
                        'nev' => $request->nev
                    ]);

                    return response()->json([
                        "status" => 200,
                        "message" => "Zóna sikeresen frissítve.",
                        "data" => ['zone' => $zone]
                    ], 200);
                }
            } catch (Exception $ex) {
                Log::error($ex);
                return response()->json([
                    "status" => 500,
                    "message" => "Hiba, zóna nem lett létrehozva!",
                    "data" => []
                ], 500);
            }
        }
    }


    public function deleteZone(Request $request)
    {
        try {
            $zoneItems =  ZoneItems::where('zone_id', $request->id)->get()->count();
            if ($zoneItems > 0) {
                return response()->json([
                    "status" => 403,
                    "message" => "Sorry, a zóna nem törölhető, mivel hozzárendelt elemek vannak hozzá!",
                    "data" => []
                ], 403);
            } else {
                Zone::where('id', $request->id)->delete();
                return response()->json([
                    "status" => 200,
                    "message" => "Zóna sikeresen eltávolítva.",
                    "data" => []
                ], 200);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Hiba, zóna nem lett eltávolítva !",
                "data" => []
            ], 500);
        }
    }
}
