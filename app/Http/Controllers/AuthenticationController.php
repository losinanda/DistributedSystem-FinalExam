<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    //
    public function login (Request $request) {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || ! Hash::check($request->password, $admin->password)) {
            throw ValidationException::withMessages([
                'data' => ['The provided credentials are incorrect.'],
            ]);
        }
        return response()->json([
            'data' => "Login success!",
            'token' => $admin->createToken('auth_token')->plainTextToken
        ]);
    }
    public function logout (Request $request) {
        $request->user()->tokens()->delete();
        return response()->json([
            'data' => "Logout success!"
        ]);
    }
    
}
