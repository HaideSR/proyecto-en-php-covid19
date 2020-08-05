<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@foreach ($data as $paci)
<h3>Nombre : {{$paci->nombre}}</h3>
<h3>Apellido : {{$paci->apellido}}</h3>
<h3>CI :{{$paci->CI}}</h3>
<h3>Correo :{{$paci->correo}}</h3>
<h3>Celular :{{$paci->Celular}}</h3>
@endforeach
</body>
</html>
