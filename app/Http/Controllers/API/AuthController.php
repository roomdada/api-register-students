<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
    ]);

    \App\Models\User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);

    return response()->json([
      'message' => 'votre compte a été créé avec succès!',
    ]);
  }

  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|string|email|max:255',
      'password' => 'required|string|min:6',
    ]);

    $credentials = request(['email', 'password']);
    if (!$token = auth()->attempt($credentials)) {
      return response()->json([
        'message' => 'Vos identifiants sont incorrects!',
      ], 401);
    }

    return $this->respondWithToken($token);
  }

}
