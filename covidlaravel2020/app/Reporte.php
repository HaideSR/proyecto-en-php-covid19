<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = [
        'id','pacientes_id','Fecha','Hora','Temperatura',
        'Frecuencia_Cardiaca','Estado','latitud','longitud','Saturacion_de_Oxigeno'
        ];
}
