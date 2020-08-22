<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TablaQR;
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
}
