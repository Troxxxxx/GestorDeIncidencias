<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    protected $table = 't_diagnosticos';

    // Desactiva las marcas de tiempo
    public $timestamps = false;

    protected $fillable = [
        'CN_ID_INCIDENCIA',
        'CT_DESCRIPCION_DIAGNOSTICO',
        'CB_REQUIERE_COMPRA',
        'CT_DETALLES_COMPRA',
        'CT_OBSERVACIONES_ADICIONALES',
        'CN_TIEMPO_SOLUCION_ESTIMADO',
        'CT_DESCRIPCION_IMAGENES',
    ];
}