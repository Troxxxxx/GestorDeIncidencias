<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $table = 't_incidencias';

    // Desactiva las marcas de tiempo
    public $timestamps = false;

    protected $fillable = [
        'CT_TITULO',
        'CT_DESCRIPCION',
        'CT_LUGAR',
        'CN_ID_ESTADO',
        'CF_FECHA_REGISTRO',
        'CN_ID_USUARIO',
        'CT_PRIORIDAD',
        'CT_RIESGO',
        'CT_AFECTACION',
        'CT_CATEGORIA',
        'CD_COSTOS',
        'CN_DURACION_GESTION',
        'CT_IMAGENES',
        'CT_JUSTIFICACION_CIERRE',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'CN_ID_USUARIO');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CN_ID_ESTADO');
    }
}