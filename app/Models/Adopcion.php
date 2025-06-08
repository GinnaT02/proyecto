<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopcion extends Model
{
    use HasFactory;

    protected $table = 'adopciones';

    protected $fillable = [
        'id_mascota',
        'id_adoptante',
        'fecha_adopcion',
        'observaciones',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota');
    }

    public function adoptante()
    {
        return $this->belongsTo(Adoptante::class, 'id_adoptante');
    }
}