<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class TokenVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('Authorization')) {
            // Extract the token from the Authorization header
            $token = explode(' ', $request->header('Authorization'))[1];

            // Find the token in the database
            // $tokenModel = Auth::user()->tokens()->where('token', hash('sha256', $token))->first();


            $user = Auth::user();

            // Access the user's tokens
            $tokens = $user->tokens;


            $tks  = [];

            foreach ($tokens as $tokenModel) {
                array_push($tks, $tokenModel->token);
                // Check if the token is found and not expired
                if (
                    $tokenModel->token === hash('sha256', $token) &&
                    Date::now()->lessThanOrEqualTo($tokenModel->expires_at)
                ) {
                    return $next($request);
                }
            }
            return response()->json(['message' => 'Unauthenticated', 'data' => $tks, 'status' => 401], 401);
        }

        return response()->json(['message' => 'Unauthenticated', 'data' => [], 'status' => 401], 401);

        // return $next($request);
        // Continue with the request if the token is still valid

    }
}
