<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeria extends Model
{
    use HasFactory;

    protected $table = 'imagenes';

    protected $primaryKey = 'id_imagen'; 
     public $timestamps = true;

    protected $fillable = [
        'id_mascota',
        'nombre',
        'peso',
        'ruta',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota');
    }
}