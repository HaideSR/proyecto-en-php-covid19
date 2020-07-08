<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\codigo_qr;
use App\TablaQR;
use Illuminate\Support\Str;
class CodigoQRController extends Controller
{
    //
    public function mostrar()
    {
        $data =[
            "codigo"=>TablaQR::get()
        ];
        //muestra los datos como json
        //dd($data);
        return view("View_CodigoQR.vistaqr",$data);
    }

    public function generar(Request $request){

        $input = $request->all();
        $cantidad=$input['cantidadgen'];
        for ($i=0; $i < $cantidad; $i++) {
            TablaQR::create([
                "remember_token"=>Str::random(10),
                "impreso"=>false,
            ]);
        }
        $data =[
            "codigos"=>TablaQR::where('impreso',0)->get()
        ];
        return view("View_CodigoQR.vistagenerar",$data);
    }



}
