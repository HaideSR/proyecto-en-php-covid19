<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TablaQR;
use Illuminate\Support\Facades\DB;
class PDFController extends Controller
{


    public function pdf(){
        $pdf =\PDF::loadView('View_CodigoQR/impresion');
        return $pdf->stream();
    }
    public function imprimirTodo(){
        $datos = TablaQR::where('impreso',0)->get();
        TablaQR::where('impreso',0)->update(['impreso'=>1]);
        $pdf=\PDF::loadView('View_CodigoQR/impresion',compact('datos'));
        return $pdf->stream('manillas.pdf');
    }
    public function imprimirReporte(){
        $FechaActual=date("Y-m-d");
        $data=DB::table('pacientes')
           ->join('reportes', 'pacientes.id', '=', 'reportes.pacientes_id')
           ->join('coordenadas', 'pacientes.id', '=', 'coordenadas.pacientes_id')
           ->where('reportes.Fecha','=',$FechaActual)
            ->select('pacientes.id','pacientes.nombre','pacientes.apellido','pacientes.CI','pacientes.Celular',
            'reportes.Fecha','reportes.Hora','reportes.Temperatura','reportes.Saturacion_de_Oxigeno','reportes.Frecuencia_Cardiaca',
            'reportes.Estado','reportes.latitud','reportes.longitud','coordenadas.latitud as ubiLatitud','coordenadas.longitud as ubiLongitud')
            ->get();
        $pdf=\PDF::loadView('Reportes/imprimirReporte',compact('data'));
        return $pdf->stream('Reportes.pdf');
    }
}
