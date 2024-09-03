<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class loginController extends Controller
{
    //

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        // $user->createToken('API_token')->plainTextToken;
        return response()->json([
            'token' => $user->createToken('API_token')->plainTextToken,
        ]);
    }

    public function logout(Request $request){

    $user = $request->user();
    // $user = Auth::user();

    if ($user) {
        $user->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out',
        ], 200);
    } else {
        return response()->json([
            'message' => 'No authenticated user found',
        ], 401); 
    }
    }
}
