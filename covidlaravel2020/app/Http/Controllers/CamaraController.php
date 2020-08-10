<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Asignados;
use App\Paciente;
use App\TablaQR;

class CamaraController extends Controller
{
    //


    public function readerqr(Request $request){


        $input = $request->all();
        $codigoT=$input['input'];
        echo($input['latitud']);
        echo($input['longitud']);
        echo(var_dump($codigoT) );
        if(! empty($codigoT)){

           $data=DB::table('pacientes')
           ->join('asignados', 'pacientes.id', '=', 'asignados.pacientes_id')
           ->join('tablaqr', 'asignados.tablaqr_id', '=', 'tablaqr.id')
           ->where('tablaqr.remember_Token','=',$codigoT)
            ->select('pacientes.nombre','pacientes.apellido','pacientes.CI','pacientes.correo','pacientes.Celular')

        ->get();
        }


    // dd($data);
      /*  $datos=[
            "token"=>$input['input'],
            "latitud"=>$input['latitud'],
            "longitud"=>$input['longitud']
        hacer reporte
        ];*/


        return view("View_Camara/enviar")->withdata($data);
    }
}
