@extends('layouts.app')
@section('title')
Insertar paciente
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
 <div class="list-group">
      <div class="row justify-content-center">
      <div class="card">
                  <div class="card-header">{{ __('Generar codigos QR') }}</div>
                    <div class="card-body"> 
    <form action="{{url("vistaqrgen")}}" method="GET">

            <input list="cantidadgen" name="cantidadgen" >
            <datalist id="cantidadgen" >
                <option selected="">Generar Mas Codigos QR</option>
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
                <option value="5"></option>
                <option value="10"></option>
                <option value="20"></option>
                <option value="30"></option>
                <option value="50"></option>

            </datalist>


            <button type="submit" class="btn btn-info pull-right">Generar</button>
        </form>
    </div>
    <div>
    <a href="{{route('imprimirTodo')}}"> imprimir todo</a>
    </div>
    <div>
        <table>
            <tr>
                <th>id</th>
                <th>token</th>
                <th>impreso</th>

            </tr>
            <tr>
                @foreach ($codigo as $datos)
                    <tr>
                    <th>{{$datos->id}}</th>
                    <th>{{$datos->remember_token}}</th>
                    <th>{{$datos->impreso}}</th>
                    </tr>
                @endforeach

            </tr>
        </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</body>
</html>
@endsection