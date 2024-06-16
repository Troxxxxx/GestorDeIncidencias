<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'CT_CORREO' => 'required|email',
                'CT_CONTRASENA' => 'required'
            ]);

            $usuario = Usuario::where('CT_CORREO', $credentials['CT_CORREO'])->first();

            if (!$usuario || !Hash::check($credentials['CT_CONTRASENA'], $usuario->CT_CONTRASENA)) {
                return response()->json(['message' => 'Credenciales no válidas'], 401);
            }

            // Crear token
            $token = $usuario->createToken('myapptoken')->plainTextToken;

            return response()->json([
                'usuario' => $usuario,
                'token' => $token,
                'message' => 'Inicio de sesión exitoso. Bienvenido, ' . $usuario->CT_NOMBRE_USUARIO
            ], 200);
        } catch (Exception $e) {
            // Log the exception message
            \Log::error('Error in login: ' . $e->getMessage());
            return response()->json(['message' => 'Error interno del servidor'], 500);
        }
    }

    public function logout()
    {
        try {
            auth()->user()->tokens()->delete();
            return response()->json(['message' => 'Cierre de sesión exitoso'], 200);
        } catch (Exception $e) {
            // Log the exception message
            \Log::error('Error in logout: ' . $e->getMessage());
            return response()->json(['message' => 'Error interno del servidor'], 500);
        }
    }
}