<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 60%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <form action="{{url("asignarUbicacionPaciente")}}" method="post" id="formulario">
        @csrf
        <input id="latitud" name="latitud" type="hidden" value="" >
        <input id="longitud" name="longitud" type="hidden"  value="" >
        <input id="id" name="id" type="hidden"  value="{{$id}}" >
        <br>
        <button type="submit" class="btn btn-outline-secondary">Asignar Ubicacion del Paciente</button>
    </form>
    <script>


        var latitud = document.getElementById('latitud');
        var longitud = document.getElementById('longitud');
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow,marker;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -15.4520662, lng: -81.9179391},
          zoom: 18
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            latitud.value=pos.lat;
            longitud.value=pos.lng;
            infoWindow.setPosition(pos);
           // infoWindow.setContent('Location found.');
            //infoWindow.open(map);
            map.setCenter(pos);

            marker = new google.maps.Marker({
                position: pos,
                map: map,
                draggable:true,
                title: 'Usted esta aqui !!'
             });
             var cityCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center:pos,
                radius:10
            });
             map.addListener("center_changed", () => {
          // 3 seconds after the center of the map has changed, pan back to the
          // marker.
          window.setTimeout(() => {
            map.panTo(marker.getPosition());
          }, 3000);
            });
            marker.addListener('drag', function() {
                cityCircle.setCenter(marker.getPosition());
                //map.setCenter(marker.getPosition());
                latitud.value=marker.getPosition().lat();

                longitud.value=marker.getPosition().lng();
             });

          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }


      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }




    </script>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvTSmqmNScpmUhBdcER7rLjqyKqsMMnH0&callback=initMap">
    </script>
  </body>
</html>
