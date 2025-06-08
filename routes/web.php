<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\AdoptanteController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\AdopcionController;

Route::get('/', fn () => redirect()->route('mascotas.index'));

Route::resource('mascotas', MascotaController::class);
Route::resource('historia_clinicas', HistoriaClinicaController::class);
Route::resource('adoptantes', AdoptanteController::class);
Route::resource('adopciones', AdopcionController::class);
Route::get('informes', [InformeController::class, 'index'])->name('informes.index');
