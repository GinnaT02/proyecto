<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoptante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'edad',
        'direccion',
        'observaciones',
        'rescatado_id',
    ];

    protected $casts = [
        'fecha_adopcion' => 'date',
    ];

    public function rescatado()
    {
        return $this->belongsTo(Rescatado::class);
    }

    public function adopciones()
    {
        return $this->hasMany(Adopcion::class);
    }
}
