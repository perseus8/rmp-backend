<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    protected function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
    protected function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
        ];
    }
    public function adminLogin(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules(), $this->messages());


        if ($validator->fails()) {
            $messages = $validator->messages();
            $errors = $messages->all();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        }

        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'admin',
            ])
        ) {

            $expired_at = Date::now()->addDay();
            $token = Auth::user()->createToken('api-token');


            $token->accessToken->update([
                'expires_at' => $expired_at
            ]);


            $plainTextToken = $token->plainTextToken;

            return response()->json([
                "status" => 200,
                "message" => "Successfully Login",
                "data" => ['token' => $plainTextToken, 'user' => Auth::user()]
            ], 200);
        }

        return response()->json([
            "status" => 401,
            "message" => "Invalid credentials",
            "data" => []
        ], 401);
    }

    public function userLogin(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            $errors = $messages->all();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        }

        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'cal_user',
            ])
        ) {
            $expired_at = Date::now()->addDay();
            $token = Auth::user()->createToken('api-token');


            $token->accessToken->update([
                'expires_at' => $expired_at
            ]);


            $plainTextToken = $token->plainTextToken;


            return response()->json([
                "status" => 200,
                "message" => "Successfully Login",
                "data" => ['token' => $plainTextToken, 'user' => Auth::user()]
            ], 200);
        }

        return response()->json([
            "status" => 401,
            "message" => "Invalid credentials",
            "data" => []
        ], 401);
    }

    public function adminRegister(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            $errors = $messages->all();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        }

        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
        ) {
            $token = Auth::user()->createToken('api-token')->plainTextToken;

            return response()->json([
                "status" => 200,
                "message" => "Successfully Login",
                "data" => ['token' => $token]
            ], 200);
        }

        return response()->json([
            "status" => 401,
            "message" => "Invalid credentials",
            "data" => []
        ], 401);
    }


    public function userRegister(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            $errors = $messages->all();
            return response()->json([
                "status" => 422,
                "message" => $messages,
                "data" => []
            ], 422);
        }
        $result = User::create([
            'name' => 'Test User',
            'email' => $request->email,
            'password' => $request->password
        ]);
        return response()->json([
            "status" => 200,
            "message" => "Proposal successfully created.",
            "data" => ['user' => $result]
        ], 200);
    }

    public function expireToken(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();


            return response()->json([
                "status" => 200,
                "message" => "Successfully Logout",
                "data" => []
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                "status" => 500,
                "message" => "Invalid credentials",
                "data" => []
            ], 500);
        }
    }
}
