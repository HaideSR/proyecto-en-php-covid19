@extends('layouts.app')
@section('title')
Insertar paciente
@endsection
@section('content')
<div class="list-group">
    <form class="form-horizontal" action="{{url("pacientes")}}" method="post">
             {{ csrf_field() }}
         <div class="input-group">
               Nombre <input type="text" class="form-control" name="nombre" placeholder="nombre">
             </div><br>
            <div class="input-group">
               Apellido <input type="text" class="form-control" name="apellido" placeholder="apellido">
             </div>
             <br/>
             <div >
                 C.I.: <input type="text" class="form-control" name="ci"> 
             </div><br>
              
             <div class="input-group">
               Correo <input type="text" class="form-control" name="correo" placeholder="correo">
             </div><br>

             <div >
                 Celular: <input type="text" class="form-control" name="celular"> 
             </div><br>

             <div >
                 CodigoQR: <input type="text" class="form-control" name="codigoQR"> 
             </div><br>
             
             <div class="input-group">
                  <input type="submit" name="" class="btn btn-info pull-right" value="Registrar">
             </div>
        </form>
</div>
@endsection