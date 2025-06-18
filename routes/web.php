<?php

use App\Http\Controllers\MascotaController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\AdopcionController;
use App\Http\Controllers\AdoptanteController;

Route::get('/', fn () => redirect()->route('mascotas.index'));

Route::resource('mascotas', MascotaController::class);
Route::resource('historia_clinicas', HistoriaClinicaController::class); 
Route::resource('galeria', GaleriaController::class);
Route::resource('adopciones', AdopcionController::class)->parameters(['adopciones' => 'adopcion',]);
Route::resource('adoptantes', AdoptanteController::class);
