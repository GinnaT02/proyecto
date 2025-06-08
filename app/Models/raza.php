<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    protected $table = 'raza'; // nombre de la tabla (confirma que sea "raza")
    protected $primaryKey = 'id_raza'; // si tu clave primaria se llama distinto, ajústalo
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        // agrega otros campos si los hay
    ];

    // Relación inversa con Mascota
    public function mascotas()
    {
        return $this->hasMany(Mascota::class, 'id_raza');
    }
}
