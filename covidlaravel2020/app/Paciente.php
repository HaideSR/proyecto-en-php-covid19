<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [   
        'nombre', 'apellido', 'CI', 'correo', 'Celular' //
        ];
    
}

