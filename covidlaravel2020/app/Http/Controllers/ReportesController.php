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

    public function ubicacionMapa(){

        $data=DB::table('pacientes')
           ->join('coordenadas', 'pacientes.id', '=', 'coordenadas.pacientes_id')
           ->select('pacientes.id','pacientes.nombre','pacientes.apellido','pacientes.CI','pacientes.Celular','coordenadas.latitud','coordenadas.longitud')
            ->get();

        	//creamos el documento xml
            $dom = new \DOMDocument("1.0",'UTF-8');
            $node = $dom->createElement("markers");
            $parnode = $dom->appendChild($node);




          foreach ($data as $key) {
            $node = $dom->createElement("marker");
            $newnode = $parnode->appendChild($node);
            $newnode->setAttribute("id",$key->id);
            $newnode->setAttribute("nombre",$key->nombre);
            $newnode->setAttribute("apellido",$key->apellido);
            $newnode->setAttribute("CI",$key->CI);
            $newnode->setAttribute("Celular",$key->Celular);
            $newnode->setAttribute("latitud",$key->latitud);
            $newnode->setAttribute("longitud",$key->longitud);
          }

         //$xml= $dom->saveXML();
        $ruta=public_path()."/storage/miarchivo.xml";
          $dom->save($ruta);
         // \Storage::disk('local')->put('archivo.xml',$xml);
         // dd($dom->saveXML());

        return view("Reportes/mapTotal");
    }
}
