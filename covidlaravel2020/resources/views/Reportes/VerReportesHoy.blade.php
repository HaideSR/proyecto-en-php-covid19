@extends('layouts.app')
@section('title')
Reportes De Hoy
@endsection
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvTSmqmNScpmUhBdcER7rLjqyKqsMMnH0&libraries=geometry&v=weekly"

    ></script>

@section('content')
<div class="container">
<table class="table table-bordered table-striped">
    <div class="card">
    <div class="card-header">
    {{ __('Reportes del dia De Hoy') }}
    <a class="btn btn-outline-primary  float-sm-right" href="{{ url('imprimirReporte') }}">{{ __('Imprimir Reporte') }}</a>
    </div>

        <thead class="thead-dark">
        <tr>
        <th scope="col">CI</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Numero de celular</th>
        <th scope="col">Fecha</th>
        <th scope="col">Hora</th>
        <th scope="col">Temperatura</th>
        <th scope="col">Saturacion de Oxigeno</th>
        <th scope="col">Frecuencia Cariaca</th>
        <th scope="col">Estado de Salud</th>
        <th scope="col">Distancia entre su casa y reporte</th>
        <th scope="col">Ubicacion</th>

        </tr>
        </thead>

        @foreach($data as $paciente)
        <tr>
        <td>{{$paciente->CI}}</td>
        <td>{{$paciente->nombre}}</td>
        <td>{{$paciente->apellido}}</td>
        <td>{{$paciente->Celular}}</td>
        <td>{{$paciente->Fecha}}</td>
        <td>{{$paciente->Hora}}</td>
        <td>{{$paciente->Temperatura}}</td>
        <td>{{$paciente->Saturacion_de_Oxigeno}}</td>
        <td>{{$paciente->Frecuencia_Cardiaca}}</td>
        <td>{{$paciente->Estado}}</td>
        <td  id="{{$paciente->id}}" class="coordenadas">
        <input type="hidden" id="{{$paciente->id}}"  value="{{$paciente->latitud}}">
        <input type="hidden" id="{{$paciente->id}}"  value="{{$paciente->longitud}}">
        <input type="hidden" id="{{$paciente->id}}"  value="{{$paciente->ubiLatitud}}">
        <input type="hidden" id="{{$paciente->id}}"  value="{{$paciente->ubiLongitud}}">

        </td>
        <td class="btnMapa">
            <!-- Button trigger modal -->
            <button id="{{$paciente->id}}"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="crearMapa(this)">
                Ver Mapa
            </button>
        </td>
        </tr>
    @endforeach

</table>
    </div>
    </div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="width: 500px; height: 500px;">
        <div class="modal-header" >
          <h5 class="modal-title" id="exampleModalLabel">Ubicaciones del Paciente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="map" class="modal-body" style="height: 100%; width:100%;">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
<script>
    var selctor =document.querySelector("tbody")

    //console.log(selctor);
    var idsPacientes =selctor.querySelectorAll(".coordenadas");
    //console.log(idsPacientes[0].id);
    var coordenadas =selctor.querySelectorAll(".coordenadas input");
    var botones =selctor.querySelectorAll(".btnMapa button");


    var distancia=null;

        function initMap(){

                var control =0;
             // console.log(coordenadas.length);
               // console.log("/////////////////////////////")
            for (let i = 0; i < coordenadas.length;i= i+4) {

                var lat1 = coordenadas[i].value;
               // console.log(lat1)
                var lgt1 = coordenadas[i+1].value;
                //console.log(lgt1)
                var lat2 = coordenadas[i+2].value;
                //console.log(lat2)
                var lgt2 = coordenadas[i+3].value;
                //console.log(lgt2)
                var loc1 = new google.maps.LatLng(lat1,lgt1);
                var loc2 = new google.maps.LatLng(lat2,lgt2);
                distancia= google.maps.geometry.spherical.computeDistanceBetween(loc1,loc2)
                //console.log(distancia);
                var cuadro = idsPacientes[control].id
               // console.log("/////////////////////////////")
               // console.log(cuadro);
                var tds =document.getElementById(parseInt(cuadro))
                tds.innerText=distancia;
                control++

            }

        }


        initMap()
        var map, marker ,marker2;
        function crearMapa(btn){

            let idBoton = btn.id;


            for (let i = 0; i < idsPacientes.length; i++) {
                if(parseInt(idsPacientes[i].id) ==idBoton ){
                    var lugar =i*4;
                    var lat1 = coordenadas[lugar].value;

                    var lgt1 = coordenadas[lugar+1].value;

                    var lat2 = coordenadas[lugar+2].value;

                    var lgt2 = coordenadas[lugar+3].value;
                    var loc1 = new google.maps.LatLng(lat1,lgt1);
                    var loc2 = new google.maps.LatLng(lat2,lgt2);


                    $('#exampleModal').on('shown.bs.modal', function(){


                        console.log("entro ollente")
                        map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: -15.4520662, lng: -81.9179391},
                        zoom: 18
                        });

                        var suCasa="Ubicacion de la casa del paciente"
                        var suReporte="Ubicacion Reporte del paciente"
                        var infowindow = new google.maps.InfoWindow({
                                content: suReporte
                            });
                            var imagen={
                                url: '/images/iconMap/1.png',
                                size: new google.maps.Size(71, 71),
                                origin: new google.maps.Point(0, 0),
                                anchor: new google.maps.Point(25, 34),
                                scaledSize: new google.maps.Size(50, 50)
                            };
                        marker = new google.maps.Marker({
                            position: loc1,
                            map: map,

                            title: 'Ubicacion del Reporte'
                            });

                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                        var infowindow2 = new google.maps.InfoWindow({
                                content: suCasa
                            });

                        marker2 = new google.maps.Marker({
                            position: loc2,
                            map: map,
                            icon:imagen,
                            title: 'Ubicacion del Paciente'
                         });
                         marker2.addListener('click', function() {
                            infowindow2.open(map, marker2);
                        });
                         map.setCenter(loc2);
                            poly = new google.maps.Polyline({
                                strokeColor: "#FF0000",
                                strokeOpacity: 1.0,
                                strokeWeight: 3,
                                map: map
                            });

                            const path = [loc1,loc2];
                                poly.setPath(path);

                    });


                }

            }

        }



</script>

    @endsection
