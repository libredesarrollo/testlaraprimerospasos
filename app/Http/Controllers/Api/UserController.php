<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
  
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('myapptoken')->plainTextToken;
            //session()->put('token', $token);
            return response()->json($token);
        }

        return response()->json("Usuario o contraseña inválidos", 422);
    }

    /**
     * Logout
     */
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json("Ok", 422);
    }
}
