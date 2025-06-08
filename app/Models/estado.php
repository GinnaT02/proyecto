<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado'; // nombre exacto de la tabla
    protected $primaryKey = 'id_estado'; // cambia si tu tabla usa otro nombre de PK
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function mascotas()
    {
        return $this->hasMany(Mascota::class, 'id_estado');
    }
}
