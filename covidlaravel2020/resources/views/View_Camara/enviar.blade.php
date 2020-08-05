@extends('layouts.app')
@section('title')
paciente
@endsection
@section('content')

<body>

@foreach ($data as $paci)
<h3>Nombre : {{$paci->nombre}}</h3>
<h3>Apellido : {{$paci->apellido}}</h3>
<h3>CI :{{$paci->CI}}</h3>
<h3>Correo :{{$paci->correo}}</h3>
<h3>Celular :{{$paci->Celular}}</h3>
@endforeach
</body>

@endsection
