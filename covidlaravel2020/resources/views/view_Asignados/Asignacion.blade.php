<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')
@section('title')
Seleccion de N°QR y N°Paciente
@endsection
@section('content')
<form action="{{url("Asignados")}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="">Paciente</label>
        <select name="paciente_id" id="inputpaciente_id" class="form-control">
            @foreach ($pacientes as $Paciente)
                <option value="{{$Paciente->id}}">{{$Paciente->nombre}}</option>
            @endforeach    
        </select>
    </div>
        <div class="form-group">
        <label for="">QRGenerado</label>
        <select name="tablaqr_id" id="inputtablaqr_id" class="form-control">
            @foreach ($tablaQR as $CodigoQR)
                <option value="{{$CodigoQR->id}}">"{{$CodigoQR->id}}"</option>
            @endforeach    
        </select>          
                <button type="submit">Asignar</button>
        </form>
        </div>
        @endsection
</body>
</html>