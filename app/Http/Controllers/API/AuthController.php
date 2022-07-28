<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return response([
        'message' => ['E-mail ou mot de passe incorrect']
      ], 404);
    }

    $token = $user->createToken('bearer-token')->plainTextToken;
    return response([
      'user' => $user,
      'token' => $token
    ]);
  }
}
