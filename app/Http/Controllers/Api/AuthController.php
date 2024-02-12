<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // login api
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // check if the user exists
        $userExists = User::where('email', $request->email)->first();

        if (!$userExists) {
            return response()->json([
                'status'=>'error',
                'message' =>'User not found'
            ], 404);
        }

        // check if the password is correct
        if (!Hash::check($request->password, $userExists->password)) {
            return response()->json(['message' => 'Incorrect password'], 401);
        }

        // Generate a new API token for the authenticated user
        $token = $userExists->createToken('auth-token')->plainTextToken;

        // Return the token and user information
        return response()->json([
            'status'=>'success',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $userExists,
        ], 200);
    }

}
