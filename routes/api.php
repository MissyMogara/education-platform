<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return 'API';
});

// Route::post('/api/login', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|password',
//     ]);

//     $user = User::where('email', $request->email)->first();

//     if ($user && Hash::check($request->password, $user->password)) {
//         $token = $user->createToken('auth_token')->plainTextToken;

//         return response()->json([
//             'message' => 'Inicio de sesión exitoso',
//             'token' => $token,
//         ], 200);
//     } else {
//         return response()->json([
//             'message' => 'Correo electrónico o contraseña incorrectos'
//         ], 401);
//     }
// });

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
