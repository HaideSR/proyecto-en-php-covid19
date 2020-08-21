<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignados;
use App\TablaQR;
use App\Paciente;
use Illuminate\Support\Facades\DB;
class AsignacionController1 extends Controller
{
    public function mostrar()
    {
        $data=[
            "Asignados" => Asignados::get(),
        ];
        /*dd($data);*/
        return view("view_Asignados.Asignados",$data);
    }

    public function asignar(Request $request )
    {
        $Asignados='';
        $input = $request->all();
        $idPaciente = $input['id'];
        $code = $input['input'];
        $idTablaqr=DB::table('TablaQR')->where('remember_Token','=',$code)->select('id')->get();
        $idasignados = DB::table('asignados')->where('pacientes_id','=',$idPaciente)->select('id')->get();
        $idtprobar = DB::table('asignados')->where('tablaqr_id','=',$idTablaqr[0]->id)->select('id')->get();

        if(count($idtprobar)==0){
            if( count($idasignados)!=0){

                $datoAsignado=[
                    "tablaqr_id"   =>$idTablaqr[0]->id,
                    "pacientes_id"=> $idPaciente,
                ];
                Asignados::where('id','=',$idasignados[0]->id)->update($datoAsignado);
            }else{

                Asignados::create([
                    "tablaqr_id"   =>$idTablaqr[0]->id,
                    "pacientes_id"=> $idPaciente,
                ]);
            }

        }else{

            $Asignados='alerta';
        }

        /*dd($data);*/
       // return view("view_Asignados.Asignados",$data);
        $data = [
            "pacientes" => Paciente::get(),
            "asignados"=> $Asignados

            ];
           $asignadospa=DB::table('asignados')->select('pacientes_id')->get();
           $array=[];
           foreach ($asignadospa as $key) {

              array_push($array,$key->pacientes_id);
           }
           echo("<br>");
            //dd($asignadospa);
            //dd($array);
            return view("pacientes.listar", $data)->witharray($array);

    }
}
