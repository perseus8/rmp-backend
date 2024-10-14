<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function list(Request $request)
    {

        try {
            $customers = Customer::where('ugyfelszam', 'like', '%' . $request->searchQuery . '%')
                ->orWhere('keresztnev', 'like', '%' . $request->searchQuery . '%')
                ->orWhere('vezeteknev', 'like', '%' . $request->searchQuery . '%')
                ->orWhere('cim', 'like', '%' . $request->searchQuery . '%')
                ->orWhere('telefonszam', 'like', '%' . $request->searchQuery . '%')
                ->orWhere('email', 'like', '%' . $request->searchQuery . '%')
                ->orderBy('id', 'desc')
                ->limit(10)->get();

            return response()->json([
                "status" => 200,
                "message" => "Customers successfullly loaded !",
                "data" => ['customers' => $customers]
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Error,Customers not loaded !",
                "data" => []
            ], 500);
        }
    }


    public function validationRules()
    {
        return [
            'keresztnev' => ['required',],
            'vezeteknev' => ['required',],
            'cim' => ['required',],
            'telefonszam' => ['required',],
            'email' => ['required',]
        ];
    }


    public function validationMessages()
    {

        return [
            'keresztnev.required' => 'First name  is required',
            'vezeteknev.required' => 'Last name is required',
            'cim.required' => 'Customer address is required',
            'telefonszam.required' => 'Mobile number is required',
            'email.required' => 'Email is required',
        ];
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validationRules(), $this->validationMessages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        } else {
            try {


                $customer = Customer::create([
                    'keresztnev' => $request->keresztnev,
                    'vezeteknev' => $request->vezeteknev,
                    'cim' => $request->cim,
                    'email' => $request->email,
                    'telefonszam' => $request->telefonszam
                ]);

                return response()->json([
                    "status" => 200,
                    "message" => "Customer Successfully Created",
                    "data" => ['customers' => $customer]
                ], 200);
            } catch (Exception $ex) {
                Log::error($ex);

                return response()->json([
                    "status" => 500,
                    "message" => "Error,Customer not created !",
                    "data" => [$ex]
                ], 500);
            }
        }
    }

    public function data(Request $request)
    {
        try {
            $customers = Customer::where('id', $request->id)->get();
            if ($customers->count() == 0) {
                return response()->json([
                    "status" => 404,
                    "message" => "Customer not found !",
                    "data" => $customers
                ], 404);
            } else {
                return response()->json([
                    "status" => 200,
                    "message" => "Customer successfully loaded !",
                    "data" => $customers
                ], 200);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            dd($ex);
            return response()->json([
                "status" => 500,
                "message" => "Error,Customer not loaded !",
                "data" => []
            ], 500);
        }
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

                $customer =  Customer::where('id', $request->id)->get();
                if ($customer->count() == 0) {
                    return response()->json([
                        "status" => 404,
                        "message" => "Customer not found",
                        "data" => []
                    ], 404);
                } else {

                    $customer[0]->update([
                        'keresztnev' => $request->keresztnev,
                        'vezeteknev' => $request->vezeteknev,
                        'cim' => $request->cim,
                        'email' => $request->email,
                        'telefonszam' => $request->telefonszam
                    ]);

                    return response()->json([
                        "status" => 200,
                        "message" => "Custom Successfully Updated",
                        "data" => ['zone' => $customer]
                    ], 200);
                }
            } catch (Exception $ex) {
                Log::error($ex);
                return response()->json([
                    "status" => 500,
                    "message" => "Error,Customer not updated !",
                    "data" => []
                ], 500);
            }
        }
    }

    public function delete(Request $request)
    {
        try {
            $customer =  Customer::where('id', $request->id)->get();
            if ($customer->count() == 0) {
                return response()->json([
                    "status" => 404,
                    "message" => "Sorry, the customer cannot be find !",
                    "data" => []
                ], 404);
            } else {
                $customer[0]->delete();
                return response()->json([
                    "status" => 200,
                    "message" => "Successfully Removed",
                    "data" => []
                ], 200);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Error, Customer not not deleted !",
                "data" => []
            ], 500);
        }
    }
}
