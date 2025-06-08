<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCondicion extends Model
{
    protected $table = 'detalle_condicion'; // nombre de la tabla
    protected $primaryKey = 'id_condicion'; // cambia si es necesario
    public $timestamps = false;

    protected $fillable = [
        'descripcion',
    ];

    public function mascotas()
    {
        return $this->hasMany(Mascota::class, 'id_condicion');
    }
}
