<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 't_roles';
    protected $primaryKey = 'CN_ID_ROL';

    protected $fillable = [
        'CT_DESCRIPCION_ROL',
    ];
}