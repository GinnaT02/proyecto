<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RescatadoController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\AdoptanteController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\AdopcionController;

Route::get('/', fn () => redirect()->route('rescatados.index'));

Route::resource('rescatados', RescatadoController::class);
Route::resource('historia_clinicas', HistoriaClinicaController::class);
Route::resource('adoptantes', AdoptanteController::class);
Route::resource('adopciones', AdopcionController::class);
Route::get('informes', [InformeController::class, 'index'])->name('informes.index');
