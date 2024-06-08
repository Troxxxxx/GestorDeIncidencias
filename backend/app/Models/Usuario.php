<?php
// app/Models/Usuario.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 't_usuarios';

    protected $primaryKey = 'CN_ID_USUARIO'; // Especifica la clave primaria
    public $incrementing = true; // Indica si la clave primaria es auto-incremental
    protected $keyType = 'int'; // Tipo de la clave primaria

    protected $fillable = [
        'CT_NOMBRE_USUARIO',
        'CT_CORREO',
        'CN_ID_ROL',
        'CT_CEDULA',
        'CT_PUESTO',
        'CT_CELULAR',
        'CT_DEPARTAMENTO',
        'CT_CONTRASENA'
    ];

    protected $hidden = [
        'CT_CONTRASENA',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->CT_CONTRASENA;
    }
}