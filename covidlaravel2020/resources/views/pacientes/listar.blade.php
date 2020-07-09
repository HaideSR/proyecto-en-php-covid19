@extends('layouts.app')
@section('title')
Lista de Pacientes
@endsection
@section('content')
<center>
<table>
<tr>
<th>Nombre</th>
<th>Apellido</th>
<th>CI</th>
<th>Correo</th>
<th>Numero de celular</th>
<th>Operaciones</th> 
</tr>
@foreach ($pacientes as $paciente)
<tr>
<td>{{$paciente->nombre}}</td>
<td>{{$paciente->apellido}}</td>
<td>{{$paciente->CI}}</td>
<td>{{$paciente->correo}}</td>
<td>{{$paciente->Celular}}</td>
<td><a href="{{route("pacientes.edit" , $paciente)}}">Editar</a></td>
<td><a href="{{route("pacientes.destroy" , $paciente)}}">Eliminar</a></td>
</tr>
@endforeach

</table>
</center>

@endsection