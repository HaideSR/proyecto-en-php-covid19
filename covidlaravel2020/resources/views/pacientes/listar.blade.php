@extends('layouts.app')
@section('title')
Lista de Pacientes
@endsection
@section('content')
<div class="container">
<table class="table table-bordered table-striped">
<div class="card">
<div class="card-header">
{{ __('Lista de pacientes') }}
<a class="btn btn-outline-primary  float-sm-right" href="{{ route('pacientes.create') }}">{{ __('Registrar') }}</a>
<a class="btn btn-outline-primary  float-sm-right" href="{{ url('ReporteHoy') }}">{{ __('Reporte de hoy') }}</a>
<a class="btn btn-outline-primary  float-sm-right" href="{{ url('ubicTodos') }}">{{ __('ver ubicacion de todos los pacientes') }}</a>
</div>
    @if ($asignados ?? ''=='alerta')
    <h1>QR YA ASIGNADO</h1>
    @else
        <thead class="thead-dark">
        <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">CI</th>
        <th scope="col">Correo</th>
        <th scope="col">Numero de celular</th>
        <th scope="col">Operaciones</th>
        </tr>
        </thead>

        @foreach($pacientes as $paciente)
        <tr>
        <td>{{$paciente->nombre}}</td>
        <td>{{$paciente->apellido}}</td>
        <td>{{$paciente->CI}}</td>
        <td>{{$paciente->correo}}</td>
        <td>{{$paciente->Celular}}</td>
        <td>
        <a href="{{route("pacientes.edit" , $paciente)}}"><button type="button" class="btn btn-outline-secondary">Editar</button></a>

        <form action="{{url("pacientes", $paciente)}}" method="post" class="d-inline">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <button type="submit" onclick="return confirm('Eliminar?')" class="btn btn-outline-danger">Eliminar</button>
        </form>

        <a href="{{route("pacientes.show" , $paciente)}}"><button type="button" class="btn btn-outline-info">Ver</button></a>
        @if (!in_array($paciente->id, $array))
        <a href="{{url('asignar',$paciente->id)}}"><button type="button" class="btn btn-outline-secondary">Asignar QR</button></a>
        @endif

        </td>
        </tr>
        @endforeach

</table>
@endif
</div>
</div>
</div>
    @endsection
