<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopcion extends Model
{
    use HasFactory;

    protected $table = 'adopciones';

    protected $fillable = [
        'rescatado_id',
        'adoptante_id',
        'fecha_adopcion',
        'estado',
        'observaciones',
    ];

    public function rescatado()
    {
        return $this->belongsTo(Rescatado::class);
    }

    public function adoptante()
    {
        return $this->belongsTo(Adoptante::class);
    }
}
