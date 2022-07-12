<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    //Login por medio de una peticion post por username y password
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => 'Usuario o contraseña incorrectos'], 401);
        }
    }
    //Validar los datos de login
    public function validateLogin(Request $request)
    {
        return $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    }
}
