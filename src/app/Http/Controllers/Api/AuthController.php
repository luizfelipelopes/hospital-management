<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        if(!Auth::attempt($request->only('email', 'password'))){
            throw ValidationException::withMessages([
                'email' => ['As credenciais fornecidas estao incorretas']
            ]);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'token' => $user->createToken('api-token')->plainTextToken
        ]);
    }
}
