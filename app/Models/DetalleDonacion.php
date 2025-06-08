<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleDonacion extends Model
{
    use HasFactory;

    protected $table = 'detalle_donacion';

    protected $primaryKey = 'id_detalle';

    protected $fillable = [
        'id_donacion',
        'descripcion_producto',
        'cantidad',
        'presentacion_id',
    ];

    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'id_donacion');
    }

    public function presentacion()
    {
        return $this->belongsTo(Presentacion::class, 'presentacion_id');
    }
}