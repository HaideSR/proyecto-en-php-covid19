@extends('layouts.app')
@section('title')
Insertar paciente
@endsection
@section('content')
<div class="container">

 <div class="list-group">
      <div class="row justify-content-center">
         <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Formulario de registro de paciente') }}</div>
                    <div class="card-body">  
                        <form class="form-horizontal" action="{{url("pacientes")}}" method="post">
                         {{ csrf_field() }}
                          <div class="form-group row">
                             <label for="name" class="col-md-4 col-form-label text-md-right">{{('Nombre:') }}</label>
                             <div class="col-md-6">
                             <input type="text" class="form-control" name="nombre" placeholder="nombre">
                           </div></div><br>

                           <div class="form-group row">
                             <label for="name" class="col-md-4 col-form-label text-md-right">{{('Apellido:') }}</label>   
                        <div class="col-md-6">
                        <input type="text" class="form-control" name="apellido" placeholder="apellido">
                        </div></div>
                        <br/>

                        <div class="form-group row">
                             <label for="name" class="col-md-4 col-form-label text-md-right">{{('CI:') }}</label>   
                        <div class="col-md-6">
                         <input type="text" class="form-control" name="ci"> 
                        </div></div><br>

                        <div class="form-group row">
                             <label for="name" class="col-md-4 col-form-label text-md-right">{{('Correo:') }}</label>   
                        <div class="col-md-6">
                         <input type="text" class="form-control" name="correo" placeholder="correo">
                       </div></div><br>

                       <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{('Celular:') }}</label> 
                        <div class="col-md-6">
                         <input type="text" class="form-control" name="celular"> 
                        </div></div><br>

                       <div class="form-group row mb-0">
                       <div class="col-md-6 offset-md-4">
                         <input type="submit" name="" class="btn btn-info pull-right" value="Registrar">
                       </div>
                       </div>
                     </form>
                      </div>
                  </div>
            </div> 
        </div>
      </div>
   </div>
</div>
@endsection