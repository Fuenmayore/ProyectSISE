<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom_coor',
        'centro_id',

    ];

    public function ficha(){

        return $this->hasMany(Ficha::class,'centro_id','id');
    }
}
