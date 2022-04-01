<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'estado',
        'total_apre',
        'total_act',
        'nivel',
        'id_coor',
        'fecha_in',
        'fecha_fin',

    ];

    public function coordinacion()
    {
        return $this->belongsTo(Coordinacion::class, 'id_coor', 'id');
    }
}
