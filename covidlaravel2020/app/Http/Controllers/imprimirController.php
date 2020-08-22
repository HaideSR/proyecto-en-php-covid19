<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

set_time_limit(300);

class imprimirController extends Controller
{
    public function imprimir(){
        $users = User::all();
        $pdf = PDF::loadView('Usuarios.imprimirUser', compact('users',$users) );
        return $pdf->download('ReposrteUsuarios.pdf');
    }
}
