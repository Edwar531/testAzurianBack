<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{

    public function login(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('name', 'password'))) {
            return response()->json(['errorAuth'=>true,'message' => 'Las credenciales son incorrectas'], 401);
        }

        $user = User::where('name', $request['name'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Bienvenido ' . $user->name,
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }


    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return;
    }
}
