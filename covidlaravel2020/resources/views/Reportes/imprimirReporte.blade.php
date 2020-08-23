







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">




    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvTSmqmNScpmUhBdcER7rLjqyKqsMMnH0&libraries=geometry&v=weekly"

    ></script>

</head>
<body>


    <table class="table table-bordered table-striped">

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


            </tr>
            </thead>
        <tbody>
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

            </tr>
            @endforeach
        </tbody>
    </table>

</body>

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








</script>
</html>
