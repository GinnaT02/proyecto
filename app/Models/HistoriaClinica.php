<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    use HasFactory;

    protected $fillable = [
    'rescatado_id',
    'fecha_chequeo',
    'peso',
    'tratamiento',
    'observaciones',
    'cuidados',
];

    public function rescatado()
    {
        return $this->belongsTo(Rescatado::class);
    }
}