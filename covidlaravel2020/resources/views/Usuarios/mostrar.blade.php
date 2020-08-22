@extends('welcome')
@section('Usuarios')
<div class="no-imprimir">
    <a href="/user/create" class="btn-s">Registrar nuevo </a>
    <a class="btn-s btn-green"  href="{{ route('imprimir') }}">Imprimir</a>
</div>
<table class="table">
    <tr>
       <th>N°</th>
       <th>Nombre</th>
       <th>Apellido paterno</th>
       <th>Apellido Materno</th>
       <th>Ci</th>
       <th>Cargo</th>
       <th>Celular</th>
       <th>Email</th>
       <th>Gestión</th>
    </tr>

     @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->nombres}}</td>
                <td>{{$user->apellidopaterno}}</td>
                <td>{{$user->apellidomaterno}}</td>
                <td>{{$user->ci}}</td>
                <td>{{$user->cargo}}</td>
                <td>{{$user->celular}}</td>
                <td>
                    <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                </td>
                <td>
                    <form method="POST" action="{{ url("user/{$user->id}") }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn-s btn-red" onclick="return confirm('¿Esta seguro de eliminar?')" type="submit">Eliminar</button>
                      </form>
                    <a class="btn-s btn-green" href="user/{{$user->id}}/edit">Editar</a>
                </td>
            </tr>
        @endforeach
</table>
@endsection
