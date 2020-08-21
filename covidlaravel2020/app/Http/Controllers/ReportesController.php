<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReportesController extends Controller
{
    public function reportesHoy(){
        $FechaActual=date("Y-m-d");
        $data=DB::table('pacientes')
           ->join('reportes', 'pacientes.id', '=', 'reportes.pacientes_id')
           ->join('coordenadas', 'pacientes.id', '=', 'coordenadas.pacientes_id')
           ->where('reportes.Fecha','=',$FechaActual)
            ->select('pacientes.id','pacientes.nombre','pacientes.apellido','pacientes.CI','pacientes.Celular',
            'reportes.Fecha','reportes.Hora','reportes.Temperatura','reportes.Saturacion_de_Oxigeno','reportes.Frecuencia_Cardiaca',
            'reportes.Estado','reportes.latitud','reportes.longitud','coordenadas.latitud as ubiLatitud','coordenadas.longitud as ubiLongitud')
            ->get();

        //dd($data);

        return view("Reportes/VerReportesHoy")->withdata($data);
    }
}
