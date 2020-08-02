@extends('layouts.app')
@section('title')
Insertar paciente
@endsection
@section('content')
<script>

navigator.geolocation.getCurrentPosition(function(position){
latitud.value=position.coords.latitude;
longitud.value=position.coords.longitude;

});

</script>

<div class="list-group">
      <div class="row justify-content-center">
         <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Ubicacion del paciente') }}</div>
                    <div class="card-body">  
                        <form class="form-horizontal" action="{{url("Ubicacion")}}" method="post">
                         {{ csrf_field() }}
                          <div class="form-group row">
                             <label for="name" class="col-md-4 col-form-label text-md-right">{{('Lalitud:') }}</label>
                             <div class="col-md-6">
                             <input type="text" class="form-control" placeholder="latitud" id="latitud" name="latitud">
                           </div></div><br>

                           <div class="form-group row">
                             <label for="name" class="col-md-4 col-form-label text-md-right">{{('Longitud:') }}</label>   
                        <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="longitud" id="longitud" name="longitud">
                        </div></div>
                        <br/>
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




