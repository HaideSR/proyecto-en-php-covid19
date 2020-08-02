@extends('layouts.app')
@section('title')
Ubicacion de paciente
@endsection
@section('content')
<div class="container">
<div class="list-group">
<div class="row justify-content-center">
<div class="card">
<div class="card-header">{{ __('Ubicacion de paciente') }}</div>
<div class="card-body">
  <div>{{('Latitud:')}} {{$ubicacion ->latitud}}</div>
  <div>{{('Longitud:')}} {{$ubicacion ->longitud}}</div>
</div>
</div>
</div>
</div>
</div>
@endsection