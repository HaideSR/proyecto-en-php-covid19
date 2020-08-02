<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Asignados;
use App\TablaQR;
use App\Paciente;
class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            "Asignados" => Asignados::get(),
        ];
        /*dd($data);*/
        return view("view_Asignados.Asignados",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sql="SELECT id,remember_token,impreso,created_at FROM tablaqr WHERE id not IN (SELECT tablaqr_id FROM asignados)";
        $tablaQR = DB::select(DB::raw($sql));
        $sql="SELECT id,nombre,apellido,CI,correo,Celular FROM pacientes WHERE id not IN (SELECT pacientes_id FROM asignados)";
        $pacientes = DB::select(DB::raw($sql));
       return view('view_Asignados.Asignacion')->withPacientes($pacientes)->withTablaQR($tablaQR);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            "Asignados" => Asignados::get(),
        ];
        $input = $request->all();
        $idpacientes=$input["paciente_id"];
        $idtablaqr=$input["tablaqr_id"];
        $Asignado=Asignados::create([
            "tablaqr_id"   => $idtablaqr,
            "pacientes_id"=> $idpacientes,
        ]);
        return view("view_Asignados.Asignados",$data); //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
