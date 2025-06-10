<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $primaryKey = 'id_estado';
    public $timestamps = false;
    protected $fillable = ['descripcion'];

    public function estado()
{
    return $this->belongsTo(Estado::class, 'estado_id', 'id_estado');
}
}
