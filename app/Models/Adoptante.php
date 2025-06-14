<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoptante extends Model
{
    protected $table = 'adoptantes';
    protected $primaryKey = 'id_adoptante';
    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'telefono',
        'direccion',
        'edad',
        'nro_docum',
        'correo',
        'sexo',
        'id_localidad',
        'barrio_viv',
        'rol',
    ];

    // Relaciones
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocum::class, 'tipo_docum', 'id_tipo');
    }

    public function localidad()
    {
        return $this->belongsTo(LocalidadUsu::class, 'id_localidad', 'id_localidad');
    }

    public function barrio()
    {
        return $this->belongsTo(Barrio::class, 'barrio_viv', 'id_barrio');
    }
}
