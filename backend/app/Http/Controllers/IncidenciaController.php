<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use Illuminate\Support\Facades\Validator;

class IncidenciaController extends Controller
{
    public function index()
    {
        return Incidencia::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CT_TITULO' => 'required|string|max:255',
            'CT_DESCRIPCION' => 'required|string',
            'CT_LUGAR' => 'required|string|max:255',
            'CN_ID_USUARIO' => 'required|integer',
            'CT_PRIORIDAD' => 'required|string|in:Bajo,Medio,Alto',
            'CT_RIESGO' => 'required|string|in:Muy bajo,Bajo,Medio,Alto,Muy alto',
            'CT_AFECTACION' => 'required|string|in:Bajo,Medio,Alto',
            'CT_CATEGORIA' => 'required|string|max:255',
            'CD_COSTOS' => 'nullable|numeric',
            'CN_DURACION_GESTION' => 'required|integer',
            'CT_IMAGENES' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $data = $request->all();
        $data['CN_ID_ESTADO'] = 1; // Asigna el estado "Registrado" automáticamente
        $data['CF_FECHA_REGISTRO'] = now(); // Asigna la fecha y hora actual

        $incidencia = Incidencia::create($data);
        return response()->json($incidencia, 201);
    }
}