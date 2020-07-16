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
    <h1>Todos los codigos QR</h1>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">token</th>
                <th scope="col">impresion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $dato)
                <tr>
                    <th scope="row">{{$dato->id}}</th>
                    <td>{{$dato->remember_token}}</td>
                    <td>{{$dato->impreso}}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <div>
        @foreach ($datos as $dato)
            <div>
                <H3>codigo QR</H3>
               id del codigo QR {{$dato->id}} <br>

                <img src="data:image/png;base64,{!!base64_encode(QrCode::format('png')->size(250)->generate($dato->remember_token))  !!}" >
            </div>
        @endforeach
    </div>
</body>
</html>
@endsection