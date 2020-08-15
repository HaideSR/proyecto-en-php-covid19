<html>
<head>
  <meta charset="utf-8">

  <script src="{{ asset('js/jsQR.js') }}"></script>
  <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
  <style>
    body {
      font-family: 'Ropa Sans', sans-serif;
      color: #333;
      max-width: 640px;
      margin: 0 auto;
      position: relative;
    }

    #githubLink {
      position: absolute;
      right: 0;
      top: 12px;
      color: #2D99FF;
    }

    h1 {
      margin: 10px 0;
      font-size: 40px;
    }

    #loadingMessage {
      text-align: center;
      padding: 40px;
      background-color: #eee;
    }

    #canvas {
      width: 100%;
    }

    #output {
      margin-top: 20px;
      background: #eee;
      padding: 10px;
      padding-bottom: 0;
    }

    #output div {
      padding-bottom: 10px;
      word-wrap: break-word;
    }

    #noQRFound {
      text-align: center;
    }
    #map {
        height: 60%;
      }
  </style>
</head>
<body>
  <h1>Enfoca el codigo qr y captura la imagen</h1>


  <div id="loadingMessage">🎥 No se puede acceder a la transmisión de video (asegúrese de tener una cámara web habilitada)</div>
  <canvas id="canvas" hidden></canvas>
  <div id="output" hidden>
    <div id="outputMessage">Codigo QR no detectado.</div>
    <div hidden><b>Data:</b> <span id="outputData"></span></div>
  </div>
  <h1>Su ubicacion en el Mapa</h1>
  <div id="map"></div>
    <form action="{{url("decodificado")}}" method="POST" id="formulario">
        @csrf
        <input id="input" name="input" type="text" value="" hidden>
        <input id="latitud" name="latitud" type="text" value="" hidden>
        <input id="longitud" name="longitud" type="text" value="" hidden>
        <label for="temperatura">Temperatura :</label> <input type="text" id="temperatura" name="temperatura"><br>
        <label for="oxigeno">Saturacion de Oxigeno :</label> <input type="text" id="oxigeno" name="oxigeno"><br>
        <label for="frecuenciaC">Frecuencia Cardiaca :</label> <input type="text" id="frecuenciaC" name="frecuenciaC"><br>
        <label for="estado">Estado de Salud :</label>
        <select name="estado" id="estado" class="form-control">
            <option value=""></option>
            <option value="excelente">Me siento muy Bien</option>
            <option value="bueno">Me siento Bien</option>
            <option value="regular">Con una leve molestia</option>
            <option value="mal">Me siento Mal</option>
            <option value="muymal">Necesito Atencion Medica</option>
        </select><br>
        <button type="submit" id="boton">Enviar</button>
    </form>
    <div id="error">

    </div>
    <audio id="audio" >
      <source type="audio/wav" src="{{ asset('sonido/beep.wav') }}">
      </audio>




  <script>
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
            //infoWindow.setPosition(pos);
           // infoWindow.setContent('Location found.');
            //infoWindow.open(map);
            map.setCenter(pos);

            marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: 'Usted esta aqui !!'
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


    var video = document.createElement("video");
    var canvasElement = document.getElementById("canvas");
    var canvas = canvasElement.getContext("2d");
    var loadingMessage = document.getElementById("loadingMessage");
    var outputContainer = document.getElementById("output");
    var outputMessage = document.getElementById("outputMessage");
    var outputData = document.getElementById("outputData");

    var temp =document.getElementById("temperatura");
    var oxigeno=document.getElementById("oxigeno");
    var frecuenciaC=document.getElementById("frecuenciaC");
    var estado=document.getElementById("estado");
    var error=document.getElementById("error");
        error.style.color='red';
    var form=document.getElementById("formulario");
    var boton =document.getElementById("boton");
    var input=document.querySelector('#input');
    var dato;
    var audio = document.getElementById("audio");
    function drawLine(begin, end, color) {
      canvas.beginPath();
      canvas.moveTo(begin.x, begin.y);
      canvas.lineTo(end.x, end.y);
      canvas.lineWidth = 4;
      canvas.strokeStyle = color;
      canvas.stroke();
    }

    // Utilice el modo enfrentando: entorno para intentar obtener la cámara frontal en los teléfonos
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
      video.srcObject = stream;
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.play();
      requestAnimationFrame(tick);

    });

    function tick() {
      loadingMessage.innerText = "⌛ Loading video..."
      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        loadingMessage.hidden = true;
        canvasElement.hidden = false;
        outputContainer.hidden = false;

        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
        var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
        var code = jsQR(imageData.data, imageData.width, imageData.height, {
          inversionAttempts: "dontInvert",
        });

        form.addEventListener('submit',function(event){

        var mensajesError=[];
        if(temp.value===null || temp.value===''){
            mensajesError.push('Ingrese Su Temperatura');
            event.preventDefault();
        }
        if(oxigeno.value===null || oxigeno.value===''){
            mensajesError.push('Ingrese Su Saturacion de Oxigeno');
            event.preventDefault();
        }
        if(frecuenciaC.value===null || frecuenciaC.value===''){
            mensajesError.push('Ingrese Su Frecuencia Cardiaca');
            event.preventDefault();
        }
        if(estado.value===null || estado.value===''){
            mensajesError.push('Ingrese Su Estado de salud');
            event.preventDefault();
        }
        if(input.value===null || input.value===''){
            mensajesError.push('No Escaneo el Codigo QR');
            event.preventDefault();
        }

           error.innerHTML=mensajesError.join('<br>')


    });

        if (code) {

          drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
          drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
          drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
          drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
          outputMessage.hidden = true;
          outputData.parentElement.hidden = false;
          outputData.innerText = code.data;
          dato=code.data;

          input.value=dato

          if(dato){
            video.pause();
              audio.play()

            video.srcObject=null;
          }

        } else {
          outputMessage.hidden = false;
          outputData.parentElement.hidden = true;
        }
      }
      requestAnimationFrame(tick);

    }

  </script>
  <script defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvTSmqmNScpmUhBdcER7rLjqyKqsMMnH0&callback=initMap">
  </script>
</body>
</html>
