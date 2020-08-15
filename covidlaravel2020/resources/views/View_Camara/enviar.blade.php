@extends('layouts.app')
@section('title')
paciente
@endsection
@section('content')

<body>

@foreach ($data as $paci)
<h3>Nombre : {{$paci->id}}</h3>

@endforeach
</body>

@endsection
