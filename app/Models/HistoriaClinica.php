<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    use HasFactory;

    protected $table = 'historia_clinica';

    protected $fillable = [
        'id_mascota',
        'fecha_chequeo',
        'peso',
        'tratamiento',
        'observaciones',
        'cuidados',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota');
    }
}