<?php

namespace App\Http\Controllers\API\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        $searchQuery = $request->searchQuery;

        try {
            $users = User::where('name', 'like', '%' . $searchQuery . '%')
                ->orWhere('email', 'like', '%' . $searchQuery . '%')
                ->latest()->get();

            return response()->json([
                "status" => 200,
                "message" => "Successfully loaded",
                "data" => ['users' => $users]
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Loading Error !",
                "data" => ['users' => []]
            ], 500);
        }
    }

    public function getUser(Request $request)
    {
        $id = $request->id;

        try {
            $user = User::where('id', $id)->get();

            if (count($user) == 0) {
                return response()->json([
                    "status" => 404,
                    "message" => "Data not found",
                    "data" => []
                ], 404);
            } else {
                return response()->json([
                    "status" => 200,
                    "message" => "Successfully loaded",
                    "data" => ['users' => $user[0]]
                ], 200);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Loading Error !",
                "data" => []
            ], 500);
        }
    }


    protected function userCreateRules()
    {
        return [
            'name' => 'required|min:4',
            'email' => 'required|email',
        ];
    }
    protected function userCreateMessages()
    {
        return [
            'email.required' => 'The email is required',
            'email.email' => 'The email is invalid',

            'name.required' => 'The name is required',
            'name.min' => 'The name must have at least 4 characters',
        ];
    }
    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), $this->userCreateRules(), $this->userCreateMessages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('password'),
                'role' => 'cal_user',
            ]);
            return response()->json([
                "status" => 200,
                "message" => "Successfully Created",
                "data" => ['user' => $user]
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Email not available",
                "data" => []
            ], 500);
        }
    }



    protected function userUpdateRules()
    {
        return [
            'name' => 'required|min:4',
            'email' => 'required|email',
            // 'password' => 'required|min:8',
        ];
    }
    protected function userUpdateMessages()
    {
        return [
            'email.required' => 'The email is required',
            'email.email' => 'The email is invalid',

            'name.required' => 'The name is required',
            'name.min' => 'The name must have at least 4 characters',

            // 'password.required' => 'The name is required',
            // 'password.min' => 'The name must have at least 8 characters',
        ];
    }

    public function updateUser(Request $request)
    {
        $validator = Validator::make($request->all(), $this->userCreateRules(), $this->userCreateMessages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        }
        try {


            $user = User::where('id', $request->id)->get();

            if ($user->count() == 0) {
                return response()->json([
                    "status" => 404,
                    "message" => "User not found",
                    "data" => []
                ], 404);
            } else {

                $user[0]->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

                return response()->json([
                    "status" => 200,
                    "message" => "Successfully Updated",
                    "data" => ['user' => $user[0]]
                ], 200);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "not updated !",
                "data" => []
            ], 500);
        }
    }

    protected function passwordUpdateRules()
    {
        return [
            'password' => 'required|min:4',
            'confirmPassword' => 'required|same:password',
            // 'password' => 'required|min:8',
        ];
    }
    protected function passwordUpdateMessages()
    {
        return [
            'password.required' => 'The password is required',
            'password.min' => 'The name must have at least 4 characters',

            'confirmPassword.required' => 'The confirm password is required',
            'confirmPassword.same' => 'The confirm password shold match with password',
        ];
    }


    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), $this->passwordUpdateRules(), $this->passwordUpdateMessages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        }
        try {
            $user = User::where('id', $request->id)->get();

            if ($user->count() == 0) {
                return response()->json([
                    "status" => 404,
                    "message" => "User not found",
                    "data" => []
                ], 404);
            } else {
                $user[0]->update([
                    'password' => Hash::make($request->password),
                ]);

                return response()->json([
                    "status" => 200,
                    "message" => "Password Successfully Updated",
                    "data" => ['user' => $user]
                ], 200);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "password not updated !",
                "data" => []
            ], 500);
        }
    }


    public function deleteUser(Request $request)
    {
        try {
            User::where('id', $request->id)->delete();
            return response()->json([
                "status" => 200,
                "message" => "Successfully Removed",
                "data" => []
            ], 200);
        } catch (Exception $ex) {
            Log::error($ex);
            return response()->json([
                "status" => 500,
                "message" => "Error, not updated !",
                "data" => []
            ], 500);
        }
    }
}
