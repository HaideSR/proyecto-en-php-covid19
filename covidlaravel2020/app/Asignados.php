<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignados extends Model
{
    protected $table='asignados';
    protected $fillable = [   
        'tablaqr_id','pacientes_id' //
        ];
     
}
