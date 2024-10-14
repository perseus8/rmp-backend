<?php

namespace App\Http\Controllers\User\Proposal;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Proposal;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;


class ProposalCustomerDataController extends Controller
{
    public function createRules()
    {
        return [
            'selectedCustomer' => ['required'],
            'proposalType' => ['required',],
            'feljegyzes' => ['nullable',]
        ];
    }

    public function createMessages()
    {
        return [
            'selectedCustomer.required' => 'Please select a client to continue..',
            'proposalType.required' => 'Please select a proposal type to continue.',
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
                $today = Carbon::today();
                $customer = Customer::where('id', $request->selectedCustomer)->get();
                $propsosalCount = Proposal::whereDate('created_at', $today)->count() + 1;
                if ($propsosalCount < 10) {
                    $propsosalCount = "00" . $propsosalCount;
                } elseif ($propsosalCount < 100) {
                    $propsosalCount = "0" . $propsosalCount;
                }

                $currentDate = Carbon::now()->format('d');
                $currentMonth = Carbon::now()->format('m');
                $currentYear = Carbon::now()->format('y');


                $firstNameFirstLetter = strtoupper(substr($customer[0]->keresztnev, 0, 1));
                $lastNameFirstLetter = strtoupper(substr($customer[0]->vezeteknev, 0, 1));
                $service_type = $request->proposalType;

                $serviceType = '';
                if ($service_type == 'Költöztetés') {
                    $serviceType = 'UZ';
                } else  if ($service_type == 'Újbútor') {
                    $serviceType = 'NM';
                } else {
                    $serviceType  = 'HA';
                }

                $proposalKey = $serviceType . "-" . $firstNameFirstLetter . $lastNameFirstLetter . "-" . $currentDate . $currentMonth . $currentYear . "/" . $propsosalCount;

                $proposal = Proposal::create([
                    'proposal_number' => $proposalKey,
                    'customer_id' => $request->selectedCustomer,
                    'proposal_type' => $request->proposalType,
                    'feljegyzes' => $request->feljegyzes,
                ]);
                return response()->json([
                    "status" => 200,
                    "message" => "Proposal successfully created.",
                    "data" => ['proposal' => $proposal, 'proposal_number' => $proposalKey]
                ], 200);
            } catch (Exception $ex) {
                return response()->json([
                    "status" => 500,
                    "message" => "Error, suggestion not created." . $ex->getMessage(),
                    "data" => []
                ], 500);
            }
        }
    }

    public function updateRules()
    {
        return [
            'proposalId' => ['required'],
            'selectedCustomer' => ['required'],
            'proposalType' => ['required',],
            'feljegyzes' => ['nullable',]
        ];
    }

    public function updateMessages()
    {
        return [
            'proposalId.required' => ['An offer ID is required'],
            'selectedCustomer.required' => 'Please select a client to continue..',
            'proposalType.required' => 'Please select a proposal type to continue.',
        ];
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), $this->updateRules(), $this->updateMessages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        } else {
            try {
                $proposal = Proposal::where('id', $request->proposalId)->update([
                    'customer_id' => $request->selectedCustomer,
                    'proposal_type' => $request->proposalType,
                    'feljegyzes' => $request->feljegyzes,
                ]);
                return response()->json([
                    "status" => 200,
                    "message" => "Customer information has been updated successfully.",
                    "data" => ['proposal' => $proposal]
                ], 200);
            } catch (Exception $ex) {
                return response()->json([
                    "status" => 500,
                    "message" => "Error, customer data was not updated." . $ex->getMessage(),
                    "data" => []
                ], 500);
            }
        }
    }

    public function getData(Request $request)
    {
        try {
            $proposal_id = $request->proposal_id;
            $proposal = Proposal::where('id', $proposal_id)->get();
            return response()->json([
                "status" => 200,
                "message" => "Logistics data successfully loaded!",
                "data" => [
                    'proposal' => $proposal,
                ]
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Error, Logistics data was not loaded successfully!",
                "data" => []
            ], 500);
        }
    }

    protected function updateStatusRules()
    {
        return [
            'proposal_id' => ['required'],

        ];
    }

    protected function updateStatusMessages()
    {
        return [
            'proposal_id.required' => ['An offer ID is required'],
        ];
    }
    public function completeProposal(Request $request)
    {
        $validator = Validator::make($request->all(), $this->updateStatusRules(), $this->updateStatusMessages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        } else {
            try {
                $proposal = Proposal::where('id', $request->proposal_id)->update([
                    'status' => 1,
                ]);
                return response()->json([
                    "status" => 200,
                    "message" => "Proposal status has been successfully updated.",
                    "data" => ['proposal' => $proposal]
                ], 200);
            } catch (Exception $ex) {
                return response()->json([
                    "status" => 500,
                    "message" => "Error, proposal status was not updated." . $ex->getMessage(),
                    "data" => []
                ], 500);
            }
        }
    }
}
