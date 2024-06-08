<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\DiagnosticoController;


//rutas para el login
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//rutas para los roles
Route::get('roles', [RoleController::class, 'index']);
Route::get('roles/{id}', [RoleController::class, 'show']);
Route::post('roles', [RoleController::class, 'store']);
Route::put('roles/{id}', [RoleController::class, 'update']);
Route::delete('roles/{id}', [RoleController::class, 'delete']);

//Registrar incidencias
Route::get('/incidencias', [IncidenciaController::class, 'index']);
Route::post('/incidencias', [IncidenciaController::class, 'store']);

//Registrar diagnostico de incidencias
Route::get('/diagnosticos', [DiagnosticoController::class, 'index']);
Route::post('/diagnosticos', [DiagnosticoController::class, 'store']);