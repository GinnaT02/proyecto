<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;

    protected $table = 'donaciones';

    protected $primaryKey = 'id_donacion';

    protected $fillable = [
        'tipo',
        'cantidad',
        'fecha',
        'id_adoptante',
    ];

    public function adoptante()
    {
        return $this->belongsTo(Adoptante::class, 'id_adoptante');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleDonacion::class, 'id_donacion');
    }
    public function getRouteKeyName()
{
    return 'id_donacion';
}

}