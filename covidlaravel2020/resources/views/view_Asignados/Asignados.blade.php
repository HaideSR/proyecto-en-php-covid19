@extends('layouts.app')
@section('title')
Lista de Pacientes asignados con QR
@endsection
@section('content')
<center>
    <a class="btn btn-outline-primary  float-sm-right" href="{{ route('Asignados.create') }}">{{ __('Asignar') }}</a>
    <table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">tablaqr_id</th>
        <th scope="col">pacientes_id</th>> 
        </tr>
        </thead>
    @foreach($Asignados as $Asignado)
    <tr>
    <td>{{ $Asignado->tablaqr_id}}</td>
    <td>{{ $Asignado->pacientes_id}}</td>
    </tr>
@endforeach
</table>

</center>

@endsection