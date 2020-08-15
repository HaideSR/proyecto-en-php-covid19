<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Asignados;
use App\Paciente;
use App\TablaQR;
use App\Reporte;
class CamaraController extends Controller
{
    //


    public function readerqr(Request $request){


        $input = $request->all();
        $codigoT=$input['input'];
        $temperatura=$input['temperatura'];
        $oxigeno=$input['oxigeno'];
        $frecuenciaC=$input['frecuenciaC'];
        $estado=$input['estado'];
        $latitud=$input['latitud'];
        $longitud=$input['longitud'];



        if(! empty($codigoT)){

           $data=DB::table('pacientes')
           ->join('asignados', 'pacientes.id', '=', 'asignados.pacientes_id')
           ->join('tablaqr', 'asignados.tablaqr_id', '=', 'tablaqr.id')
           ->where('tablaqr.remember_Token','=',$codigoT)
            ->select('pacientes.id')

        ->get();
        }
        Reporte::create([
            "pacientes_id"=>$data[0]->id,
            "Temperatura"=>$temperatura,
            "Fecha"=>date("Y-m-d"),
            "Hora"=>date("H:i:s"),
            "Saturacion_de_Oxigeno"=>$oxigeno,
            "Frecuencia_Cardiaca"=>$frecuenciaC,
            "Estado"=>$estado,
            "latitud"=>$latitud,
            "longitud"=>$longitud,
        ]);


        return view("View_Camara/enviar")->withdata($data);
    }
}
