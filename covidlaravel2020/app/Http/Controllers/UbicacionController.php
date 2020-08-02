<?php

namespace App\Http\Controllers;
use App\Coordenada;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function index()
    {
        $data = [
        "ubicaciones" => Coordenada::get()   

        ]; //
        return view("Ubicacion.listar", $data);
    }


    public function create()
    {
        return view("Ubicacion.createU"); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $ubicacion=Coordenada::create([
            "latitud"   => $input["latitud"],
            "longitud"=> $input["longitud"],
            
        ]);
        return view("Ubicacion.verU")->withCoordenada($ubicacion); // 
    }
  //


public function show(Coordenada $ubicacion)
{
    return view("Ubicacion.verU")->withCoordenada($ubicacion);
}
}