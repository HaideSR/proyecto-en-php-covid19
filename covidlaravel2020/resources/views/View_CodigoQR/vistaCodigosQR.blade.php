@extends('layouts.app')
@section('title')

@endsection
@section('content')
<div>
    <table>
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">token</th>
                <th scope="col">impresion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($code as $dato)
                <tr>
                    <th scope="row">{{$dato->id}}</th>
                    <td>{{$dato->remember_token}}</td>
                    <td>{{$dato->impreso}}</td>
                    <td><br><br>{!!QrCode::size(250)->generate($dato->remember_token)  !!}<br><br></td>

                </tr>

            @endforeach
        </tbody>

    </table>
</div>
@endsection
