<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'CT_CORREO' => 'required|email',
            'CT_CONTRASENA' => 'required'
        ]);

        $usuario = Usuario::where('CT_CORREO', $credentials['CT_CORREO'])->first();

        if (!$usuario || !Hash::check($credentials['CT_CONTRASENA'], $usuario->CT_CONTRASENA)) {
            return response()->json(['message' => 'Credenciales no válidas'], 401);
        }

        // Crear token (necesita tener Laravel Sanctum configurado)
        $token = $usuario->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'usuario' => $usuario,
            'token' => $token,
            'message' => 'Inicio de sesión exitoso. Bienvenido, ' . $usuario->CT_NOMBRE_USUARIO
        ], 200);
    }

    public function logout()
    {
        // Necesita tener Laravel Sanctum configurado
        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'Cierre de sesión exitoso'], 200);
    }
}