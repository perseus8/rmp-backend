<?php

namespace App\Http\Controllers\User\Proposal;

use App\Http\Controllers\Controller;
use App\Models\PackingMaterial;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProposalPackingMaterialController extends Controller
{
    public function createRules()
    {
        return [
            'verpackungsmaterial' => ['required'],
            'ar' => ['required', 'numeric'],
        ];
    }

    public function createMessages()
    {
        return [
            'verpackungsmaterial.required' => 'Specifying the packaging material is mandatory.',
            'ar.required' => 'Entering the price is mandatory.',
            'ar.numeric' => 'Price must be a number.',
        ];
    }


    public function createPackingMaterial(Request $request)
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
                $packingMaterial = PackingMaterial::create([
                    'verpackungs_material' => $request->verpackungsmaterial,
                    'price' => $request->ar,
                ]);
                return response()->json([
                    "status" => 200,
                    "message" => "Packaging material successfully created",
                    "data" => ['packingMaterial' => $packingMaterial]
                ], 200);
            } catch (Exception $ex) {
                return response()->json([
                    "status" => 500,
                    "message" => "Error, packaging material was not created." . $ex->getMessage(),
                    "data" => []
                ], 500);
            }
        }
    }


    public function getPackingMaterials(Request $request)
    {
        try {
            $packaging = PackingMaterial::all();
            return response()->json([
                "status" => 200,
                "message" => "Successfully loaded",
                "data" => ['packaging' => $packaging]
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                "status" => 500,
                "message" => "Loading Error !",
                "data" => ['packaging' => []]
            ], 500);
        }
    }

    public function getPackingMaterialsData(Request $request)
    {
        $id = $request->id;
        try {
            $packaging = PackingMaterial::where('id', $id)->get();
            if (count($packaging) == 0) {
                return response()->json([
                    "status" => 404,
                    "message" => "Data not found",
                    "data" => []
                ], 404);
            } else {
                return response()->json([
                    "status" => 200,
                    "message" => "Successfully loaded",
                    "data" => ['packaging' => $packaging[0]]
                ], 200);
            }
        } catch (Exception $ex) {
            return response()->json([
                "status" => 500,
                "message" => "Loading Error !",
                "data" => []
            ], 500);
        }
    }

    public function deletePackingMaterials(Request $request)
    {
        try {
            PackingMaterial::where('id', $request->id)->delete();
            return response()->json([
                "status" => 200,
                "message" => "Successfully Removed",
                "data" => []
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                "status" => 500,
                "message" => "Error, not updated!",
                "data" => []
            ], 500);
        }
    }

    public function updatePackagingMaterial(Request $request)
    {
        try {
            $packaging = PackingMaterial::where('id', $request->id)->get();

            if ($packaging->count() == 0) {
                return response()->json([
                    "status" => 404,
                    "message" => "User not found",
                    "data" => []
                ], 404);
            } else {

                $packaging[0]->update([
                    'verpackungs_material' => $request->name,
                    'price' => $request->email,
                ]);

                return response()->json([
                    "status" => 200,
                    "message" => "Successfully Updated",
                    "data" => ['packaging' => $packaging[0]]
                ], 200);
            }
        } catch (Exception $ex) {
            return response()->json([
                "status" => 500,
                "message" => "not updated !",
                "data" => []
            ], 500);
        }
    }

}
