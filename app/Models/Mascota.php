<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascota';
    protected $primaryKey = 'id_mascota';
    public $timestamps = false;
    protected $fillable = [
        'nombre_mascota',
        'edad',
        'vacunado',
        'peligroso',
        'esterilizado',
        'destetado',
        'genero',
        'imagen',
        'crianza',
        'fecha_ingreso',
        'condiciones_especiales',
        'raza_id',
        'estado_id',
        'condicion_id'
    ];

    public function raza()
    {
        return $this->belongsTo(Raza::class, 'raza_id', 'id_raza');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id', 'id_estado');
    }

    public function condicion()
    {
        return $this->belongsTo(DetalleCondicion::class, 'condicion_id', 'id_condicion');
    }
}
