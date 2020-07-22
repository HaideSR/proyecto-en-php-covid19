<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<style>
		@media only screen and (max-width: 700px) {
			video {
				max-width: 100%;
			}
		}
	</style>
</head>

<body>
	<h1>Tomar foto con JavaScript</h1>

    <h1>Selecciona un dispositivo</h1>
    <video muted="muted" id="video"></video>
    <canvas id="canvas" style="display: none;"></canvas>
	<div>
        <select name="listaDeDispositivos" id="listaDeDispositivos"></select>



            <button id="boton" >Tomar foto</button>


            <form action="{{url("decodificado")}}" method="POST">
                @csrf
                <input id="input" name="input" type="text" value="">
                <button type="submit"> enviar foto</button>
            </form>

	</div>
	<br>


    <img id="imagen" src="" alt="" >

</body>

<script src="{{ asset('js/camara.js') }}"></script>
</html>
