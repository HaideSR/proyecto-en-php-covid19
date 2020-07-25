<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CamaraController extends Controller
{
    //


    public function readerqr(Request $request){


        $input = $request->all();
        $informacionQR=$input['input'];
        echo($informacionQR);



        return view("View_Camara/enviar")->withinformacionQR($informacionQR);
    }
}
