<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnostico;
use Illuminate\Support\Facades\Validator;

class DiagnosticoController extends Controller
{
    public function index()
    {
        return Diagnostico::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CN_ID_INCIDENCIA' => 'required|integer',
            'CT_DESCRIPCION_DIAGNOSTICO' => 'required|string',
            'CB_REQUIERE_COMPRA' => 'required|boolean',
            'CT_DETALLES_COMPRA' => 'nullable|string',
            'CT_OBSERVACIONES_ADICIONALES' => 'required|string',
            'CN_TIEMPO_SOLUCION_ESTIMADO' => 'required|integer',
            'CT_DESCRIPCION_IMAGENES' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $data = $request->all();
        $data['CF_FECHA_REGISTRO'] = now(); // Asigna la fecha y hora actual

        $diagnostico = Diagnostico::create($data);
        return response()->json($diagnostico, 201);
    }
}