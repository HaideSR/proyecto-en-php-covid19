<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenada extends Model
{
        protected $fillable = [
            'latitud', 'longitud' ,'pacientes_id'//
            ];
}
