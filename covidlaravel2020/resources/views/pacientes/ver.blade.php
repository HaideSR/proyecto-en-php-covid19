@extends('layouts.app')
@section('title')
Datos de paciente
@endsection
@section('content')
<div class="container">
<div class="list-group">
<div class="row justify-content-center">
<div class="card">
<div class="card-header">{{ __('Datos de paciente') }}</div>
<div class="card-body">
  <div>{{('Nombre:')}} {{$paciente->nombre}}</div>
  <div>{{('Apellido:')}} {{$paciente->apellido}}</div>
  <div>{{('CI:')}} {{$paciente->CI}}</div>
  <div>{{('Correo:')}} {{$paciente->correo}}</div>
  <div>{{('Celular:')}} {{$paciente->Celular}}</div>

</div>
<a href="{{url('asignarUbicacion',$paciente->id)}}"><button type="button" class="btn btn-outline-danger">Asignar Ubcacion del Paciente</button></a>
</div>
</div>
</div>

</div>

@endsection
