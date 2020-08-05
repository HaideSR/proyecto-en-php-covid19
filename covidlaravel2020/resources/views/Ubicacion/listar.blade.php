@extends('layouts.app')
@section('title')
Coordenada de ubicacion de pacientes
@endsection
@section('content')
<div class="container">
<table class="table table-bordered table-striped">
<div class="card">
<div class="card-header">
{{ __('Lista de ubicacion de pacientes') }}
<a class="btn btn-outline-primary  float-sm-right" href="{{ route('Ubicacion.create') }}">{{ __('Mi ubicacion') }}</a>
</div>
        <thead class="thead-dark">
        <tr>
        <th scope="col">Latitud</th>
        <th scope="col">Longitud</th>
        </tr>
        </thead>

        @foreach($ubicaciones as $ubicacion)
        <tr>
        <td>{{$ubicacion->latitud}}</td>
        <td>{{$ubicacion->longitud}}</td>
        </tr>

        <td><a href="{{route("Ubicacion.show" , $ubicacion)}}"><button type="button" class="btn btn-outline-info">Ver</button></a></td>
    @endforeach

</table>
</div>
</div>
</div>
    @endsection
