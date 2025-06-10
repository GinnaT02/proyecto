<?php
use App\Http\Controllers\MascotaController;
Route::get('/', fn () => redirect()->route('mascotas.index'));
Route::resource('mascotas', MascotaController::class);