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
    }
}
