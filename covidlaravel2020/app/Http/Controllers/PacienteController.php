<?php

namespace App\Http\Controllers;
use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
        "pacientes" => Paciente::get()   

        ]; //
        return view("pacientes.listar", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pacientes.create"); //
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
        $paciente=Paciente::create([
            "nombre"   => $input["nombre"],
            "apellido"=> $input["apellido"],
            "CI"     => $input["ci"],
            "correo"     => $input["correo"],
            "Celular"     => $input["celular"],
            
        ]);
        return view("pacientes.ver")->withPaciente($paciente); // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        return view("pacientes.ver")->withPaciente($paciente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return view("pacientes.edit")->withPaciente($paciente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $input = $request->all();
        $paciente ->nombre = $input["nombre"];
        $paciente->apellido = $input["apellido"];
        $paciente->ci = $input["ci"];
        $paciente ->correo = $input["correo"];
        $paciente->celular = $input["celular"];  
        if ($paciente->save()) {
            # code...
            return view("pacientes.ver")->withPaciente($paciente);
        }
        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return view("pacientes.ver")->withPaciente($paciente);
    }
}
