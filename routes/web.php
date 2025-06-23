<?php

use App\Http\Controllers\MascotaController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\AdopcionController;
use App\Http\Controllers\AdoptanteController;
use App\Http\Controllers\DetalleDonacionController;
use App\Http\Controllers\DonacionesController;


Route::get('/', fn () => redirect()->route('mascotas.index'));

Route::resource('mascotas', MascotaController::class);
Route::resource('historia_clinicas', HistoriaClinicaController::class); 
Route::resource('galeria', GaleriaController::class);
Route::resource('adopciones', AdopcionController::class)->parameters(['adopciones' => 'adopcion',]);
Route::resource('adoptantes', AdoptanteController::class);
Route::resource('donaciones', DonacionesController::class)->parameters(['donaciones' => 'donacion']);
Route::resource('detalle_donacion', DetalleDonacionController::class);

