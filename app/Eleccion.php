<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Candidato;

class Eleccion extends Model
{
     protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'estatus',

    ];

     public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }

}
