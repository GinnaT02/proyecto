<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rescatado extends Model {
    protected $fillable = [
    'nombre',
    'edad',
    'descripcion_rescate',
    'fecha_ingreso',
    'condiciones_especiales',
    'sexo',
    'estado',
];

    public function adoptante() {
        return $this->belongsTo(Adoptante::class);
    }

    public function historiales() {
        return $this->hasMany(HistorialClinico::class);
    }

    public function adopciones() {
    return $this->hasMany(Adopcion::class);
}
}