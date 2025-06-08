<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $table = 'mascotas'; // 👈 Nombre correcto de la tabla

    protected $primaryKey = 'id_mascota'; // 👈 Nombre correcto de la clave primaria

    public $timestamps = true;

    // Agrega los campos que puedes asignar masivamente si es necesario
    protected $fillable = [
        'nombre',
        'edad',
        'vacunado',
        'peligroso',
        'esterilizado',
        'genero',
        'id_raza',
        'id_condicion',
        'fecha_ingreso',
        'condiciones_especiales',
        'id_estado',
    ];

    // Aquí puedes definir las relaciones si ya las tienes

    // Relación con Raza
public function raza()
{
    return $this->belongsTo(Raza::class, 'raza_id');
}

// Relación con Estado
public function estado()
{
    return $this->belongsTo(Estado::class, 'estado_id');
}

// Relación con Condición
public function condicion()
{
    return $this->belongsTo(DetalleCondicion::class, 'condicion_id');
}

}
