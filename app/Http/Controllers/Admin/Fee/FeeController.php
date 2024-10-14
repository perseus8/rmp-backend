<?php

namespace App\Http\Controllers\Admin\Fee;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\TransactionFee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FeeController extends Controller
{
    public function getFees(Request $request)
    {


        try {
            $fee = Fee::all();
            $trasactionFee = TransactionFee::all();

            return response()->json([
                "status" => 200,
                "message" => "Zónák sikeresen betöltve !",
                "data" => [
                    'fee' => $fee,
                    'trasactionFee' => $trasactionFee
                ]
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
            'tarolasi_napok_szama' => 'required|numeric',
            'transportpreis_euro_km' => 'required|numeric',
            'beladen_euro_m3' => 'required|numeric',
            'entladen_euro_m3' => 'required|numeric',
            'auspacken_euro_m3' => 'required|numeric',
            'de_und_remontage_euro_std' => 'required|numeric',
            'kuchenmonteur_euro_std' => 'required|numeric',
            'elektriker_euro_std' => 'required|numeric',
            'zuschlag_geschoss' => 'required|numeric',
            'zuschlag_abtrageweg_uber' => 'required|numeric',
            'zuschlag_schwergut' => 'required|numeric',
            'mobel_stecklift' => 'required|numeric',
            'aubenaufzug_inkl_bediener' => 'required|numeric',
            'halteverbotszone' => 'required|numeric',
            'be_und_entladestelle' => 'required|numeric',
            'entsorgung_handling' => 'required|numeric',
            'lagerentgelt_je' => 'required|numeric',
            'pkw_szemely_auto' => 'required|numeric',
            'lkw_35_to_17m3' => 'required|numeric',
            'lkw_75_to_27m3' => 'required|numeric',
            'lkw_12_to_47m3' => 'required|numeric',
            'lkw_18_to_95m' => 'required|numeric',
            'transport_17m3_presis_pro_150' => 'required|numeric',
            'transport_17m3_belade_150' => 'required|numeric',
            'transport_27m3_presis_pro_150' => 'required|numeric',
            'transport_27m3_belade_150' => 'required|numeric',
            'transport_47m3_presis_pro_150' => 'required|numeric',
            'transport_47m3_belade_150' => 'required|numeric',
            'transport_95m3_presis_pro_150' => 'required|numeric',
            'transport_95m3_blade_150' => 'required|numeric',
            'transport_140m3_presis_pro_150' => 'required|numeric',
            'transport_140m3_blade_150' => 'required|numeric',
            'transport_17m3_presis_pro_151' => 'required|numeric',
            'transport_17m3_belade_151' => 'required|numeric',
            'transport_27m3_presis_pro_151' => 'required|numeric',
            'transport_27m3_belade_151' => 'required|numeric',
            'transport_47m3_presis_pro_151' => 'required|numeric',
            'transport_47m3_belade_151' => 'required|numeric',
            'transport_95m3_presis_pro_151' => 'required|numeric',
            'transport_95m3_blade_151' => 'required|numeric',
            'transport_95m3_140_presis_pro_151' => 'required|numeric',
            'transport_95m3_140_blade_151' => 'required|numeric',
        ];
    }

    public function createMessages()
    {
        return [
            'required' => 'ez a mező kötelező.',
            'numeric' => 'ez a mező számnak kell lennie.',
        ];
    }
    public function updateFees(Request $request)
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
                $fee = Fee::all();
                $trasactionFee = TransactionFee::all();

                if ($fee->count() == 0) {
                    $fee = Fee::create([
                        'tarolasi_napok_szama' => $request->tarolasi_napok_szama,
                        'transportpreis_euro_km' => $request->transportpreis_euro_km,
                        'beladen_euro_m3' => $request->beladen_euro_m3,
                        'entladen_euro_m3' => $request->entladen_euro_m3,
                        'auspacken_euro_m3' => $request->auspacken_euro_m3,
                        'de_und_remontage_euro_std' => $request->de_und_remontage_euro_std,
                        'kuchenmonteur_euro_std' => $request->kuchenmonteur_euro_std,
                        'elektriker_euro_std' => $request->elektriker_euro_std,
                        'zuschlag_geschoss' => $request->zuschlag_geschoss,
                        'zuschlag_abtrageweg_uber' => $request->zuschlag_abtrageweg_uber,
                        'zuschlag_schwergut' => $request->zuschlag_schwergut,
                        'mobel_stecklift' => $request->mobel_stecklift,
                        'aubenaufzug_inkl_bediener' => $request->aubenaufzug_inkl_bediener,
                        'halteverbotszone' => $request->halteverbotszone,
                        'be_und_entladestelle' => $request->be_und_entladestelle,
                        'entsorgung_handling' => $request->entsorgung_handling,
                        'lagerentgelt_je' => $request->lagerentgelt_je,
                        'pkw_szemely_auto' => $request->pkw_szemely_auto,
                        'lkw_35_to_17m3' => $request->lkw_35_to_17m3,
                        'lkw_75_to_27m3' => $request->lkw_75_to_27m3,
                        'lkw_12_to_47m3' => $request->lkw_12_to_47m3,
                        'lkw_18_to_95m' => $request->lkw_18_to_95m,
                    ]);
                } else {
                    $fee[0]->update([
                        'tarolasi_napok_szama' => $request->tarolasi_napok_szama,
                        'transportpreis_euro_km' => $request->transportpreis_euro_km,
                        'beladen_euro_m3' => $request->beladen_euro_m3,
                        'entladen_euro_m3' => $request->entladen_euro_m3,
                        'auspacken_euro_m3' => $request->auspacken_euro_m3,
                        'de_und_remontage_euro_std' => $request->de_und_remontage_euro_std,
                        'kuchenmonteur_euro_std' => $request->kuchenmonteur_euro_std,
                        'elektriker_euro_std' => $request->elektriker_euro_std,
                        'zuschlag_geschoss' => $request->zuschlag_geschoss,
                        'zuschlag_abtrageweg_uber' => $request->zuschlag_abtrageweg_uber,
                        'zuschlag_schwergut' => $request->zuschlag_schwergut,
                        'mobel_stecklift' => $request->mobel_stecklift,
                        'aubenaufzug_inkl_bediener' => $request->aubenaufzug_inkl_bediener,
                        'halteverbotszone' => $request->halteverbotszone,
                        'be_und_entladestelle' => $request->be_und_entladestelle,
                        'entsorgung_handling' => $request->entsorgung_handling,
                        'lagerentgelt_je' => $request->lagerentgelt_je,
                        'pkw_szemely_auto' => $request->pkw_szemely_auto,
                        'lkw_35_to_17m3' => $request->lkw_35_to_17m3,
                        'lkw_75_to_27m3' => $request->lkw_75_to_27m3,
                        'lkw_12_to_47m3' => $request->lkw_12_to_47m3,
                        'lkw_18_to_95m' => $request->lkw_18_to_95m,
                    ]);
                }

                if ($trasactionFee->count() == 0) {
                    $trasactionFee = TransactionFee::create([
                        'transport_17m3_presis_pro_150' => $request->transport_17m3_presis_pro_150,
                        'transport_17m3_belade_150' => $request->transport_17m3_belade_150,
                        'transport_27m3_presis_pro_150' => $request->transport_27m3_presis_pro_150,
                        'transport_27m3_belade_150' => $request->transport_27m3_belade_150,
                        'transport_47m3_presis_pro_150' => $request->transport_47m3_presis_pro_150,
                        'transport_47m3_belade_150' => $request->transport_47m3_belade_150,
                        'transport_95m3_presis_pro_150' => $request->transport_95m3_presis_pro_150,
                        'transport_95m3_blade_150' => $request->transport_95m3_blade_150,
                        'transport_140m3_presis_pro_150' => $request->transport_140m3_presis_pro_150,
                        'transport_140m3_blade_150' => $request->transport_140m3_blade_150,
                        'transport_17m3_presis_pro_151' => $request->transport_17m3_presis_pro_151,
                        'transport_17m3_belade_151' => $request->transport_17m3_belade_151,
                        'transport_27m3_presis_pro_151' => $request->transport_27m3_presis_pro_151,
                        'transport_27m3_belade_151' => $request->transport_27m3_belade_151,
                        'transport_47m3_presis_pro_151' => $request->transport_47m3_presis_pro_151,
                        'transport_47m3_belade_151' => $request->transport_47m3_belade_151,
                        'transport_95m3_presis_pro_151' => $request->transport_95m3_presis_pro_151,
                        'transport_95m3_blade_151' => $request->transport_95m3_blade_151,
                        'transport_95m3_140_presis_pro_151' => $request->transport_95m3_140_presis_pro_151,
                        'transport_95m3_140_blade_151' => $request->transport_95m3_140_blade_151,
                    ]);
                } else {
                    $trasactionFee[0]->update([
                        'transport_17m3_presis_pro_150' => $request->transport_17m3_presis_pro_150,
                        'transport_17m3_belade_150' => $request->transport_17m3_belade_150,
                        'transport_27m3_presis_pro_150' => $request->transport_27m3_presis_pro_150,
                        'transport_27m3_belade_150' => $request->transport_27m3_belade_150,
                        'transport_47m3_presis_pro_150' => $request->transport_47m3_presis_pro_150,
                        'transport_47m3_belade_150' => $request->transport_47m3_belade_150,
                        'transport_95m3_presis_pro_150' => $request->transport_95m3_presis_pro_150,
                        'transport_95m3_blade_150' => $request->transport_95m3_blade_150,
                        'transport_140m3_presis_pro_150' => $request->transport_140m3_presis_pro_150,
                        'transport_140m3_blade_150' => $request->transport_140m3_blade_150,
                        'transport_17m3_presis_pro_151' => $request->transport_17m3_presis_pro_151,
                        'transport_17m3_belade_151' => $request->transport_17m3_belade_151,
                        'transport_27m3_presis_pro_151' => $request->transport_27m3_presis_pro_151,
                        'transport_27m3_belade_151' => $request->transport_27m3_belade_151,
                        'transport_47m3_presis_pro_151' => $request->transport_47m3_presis_pro_151,
                        'transport_47m3_belade_151' => $request->transport_47m3_belade_151,
                        'transport_95m3_presis_pro_151' => $request->transport_95m3_presis_pro_151,
                        'transport_95m3_blade_151' => $request->transport_95m3_blade_151,
                        'transport_95m3_140_presis_pro_151' => $request->transport_95m3_140_presis_pro_151,
                        'transport_95m3_140_blade_151' => $request->transport_95m3_140_blade_151,
                    ]);
                }

                return response()->json([
                    "status" => 200,
                    "message" => "A díjak sikeresen frissültek",
                    "data" => [
                        'fee' => $fee,
                        'trasactionFee' => $trasactionFee
                    ]
                ], 200);
            } catch (Exception $ex) {
                Log::error($ex);
                return response()->json([
                    "status" => 500,
                    "message" => "Hiba, díjak nem frissültek.",
                    "data" => [$ex->__toString()]
                ], 500);
            }
        }
    }
}
