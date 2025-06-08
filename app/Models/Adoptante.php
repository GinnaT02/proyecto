<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoptante extends Model
{
    use HasFactory;

    protected $table = 'adoptantes';

    protected $fillable = [
        'nombres',
        'telefono',
        'correo',
        'direccion',
        'edad',
        'tipo_docum',
        'nro_docum',
        'sexo',
        'id_localidad',
        'id_barrio',
        'rol',
    ];

    public function adopciones()
    {
        return $this->hasMany(Adopcion::class, 'id_adoptante');
    }

    public function donaciones()
    {
        return $this->hasMany(Donacion::class, 'id_adoptante');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_docum');
    }

    public function localidad()
    {
        return $this->belongsTo(LocalidadUsu::class, 'id_localidad');
    }

    public function barrio()
    {
        return $this->belongsTo(Barrio::class, 'id_barrio');
    }
}