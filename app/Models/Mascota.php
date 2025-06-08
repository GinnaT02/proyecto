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
        'raza_id',
        'condicion_id',
        'fecha_ingreso',
        'condiciones_especiales',
        'estado_id',
    ];

    // Aquí puedes definir las relaciones si ya las tienes
}
