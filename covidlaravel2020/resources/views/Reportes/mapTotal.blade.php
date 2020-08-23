<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pacientes</title>
<style>
     #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
</style>

      <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvTSmqmNScpmUhBdcER7rLjqyKqsMMnH0&callback=initMap">
    </script>
     @laravelPWA
</head>
<body>
    <div id="map"></div>
    <input id="xml" type="hidden" value="{{asset("storage/miarchivo.xml")}}">

</body>
<script>
 var url2=document.getElementById("xml");
 console.log(url2.value)
 var url3=url2.value;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -19.0382080, lng: -65.2541952},
          zoom: 14
        });
        var infoWindow = new google.maps.InfoWindow;
                  // Change this depending on the name of your PHP or XML file
        downloadUrl(url3, function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var nombre = markerElem.getAttribute('nombre');
              var apellido = markerElem.getAttribute('apellido');
              var CI = markerElem.getAttribute('CI');
              var Celular = markerElem.getAttribute('Celular');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('latitud')),
                  parseFloat(markerElem.getAttribute('longitud')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = nombre+" "+apellido
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = "CI : "+CI+"Celular : "+Celular;
              infowincontent.appendChild(text);
              //var icon = customLabel[type] || {};
              var imagen={
                                url: '/images/iconMap/1.png',
                                size: new google.maps.Size(71, 71),
                                origin: new google.maps.Point(0, 0),
                                anchor: new google.maps.Point(25, 34),
                                scaledSize: new google.maps.Size(50, 50)
                            };
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon:imagen,
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
    }
    function doNothing() {}

</script>

</html>
