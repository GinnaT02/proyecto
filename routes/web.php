<?php

use App\Http\Controllers\MascotaController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\AdopcionController;
use App\Http\Controllers\AdoptanteController;
use App\Http\Controllers\DetalleDonacionController;
use App\Http\Controllers\DonacionesController;
use App\Http\Controllers\InformeController;

Route::get('/', fn () => redirect()->route('mascotas.index'));

Route::resource('mascotas', MascotaController::class);
Route::resource('historia_clinicas', HistoriaClinicaController::class); 
Route::resource('galeria', GaleriaController::class);
Route::resource('adopciones', AdopcionController::class)->parameters(['adopciones' => 'adopcion']);
Route::resource('adoptantes', AdoptanteController::class);
Route::resource('donaciones', DonacionesController::class)->parameters(['donaciones' => 'donacion']);

// Informes
Route::get('/informes', [InformeController::class, 'index'])->name('informes.index');
Route::get('/informes/mascotas/pdf', [InformeController::class, 'mascotasPDF'])->name('mascotas.pdf');
Route::get('/informes/adoptantes/pdf', [InformeController::class, 'adoptantesPDF'])->name('adoptantes.pdf');
Route::get('/informes/donaciones/pdf', [InformeController::class, 'donacionesPDF'])->name('donaciones.pdf');
Route::get('/informes/adopciones/pdf', [InformeController::class, 'adopcionesPDF'])->name('adopciones.pdf');
Route::get('/informes/historias/pdf', [InformeController::class, 'historiasPDF'])->name('historia_clinica.pdf');
