@extends('layouts.app')
@section('title')
Lista de Pacientes asignados con QR
@endsection
@section('content')
<center>


    @if ($Asignados=='alerta')
    <h1>QR YA ASIGNADO</h1>
    @else
    <table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">pacientes_id</th>
        <th scope="col">tablaqr_id</th>

        </tr>
        </thead>
    @foreach($Asignados as $Asignado)
    <tr>
    <td>{{ $Asignado->pacientes_id}}</td>
    <td>{{ $Asignado->tablaqr_id}}</td>

    </tr>

@endforeach
</table>
@endif
</center>

@endsection
