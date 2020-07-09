@extends('welcome')
@section('Usuarios')
    <form action="{{ url("/user") }}" method="POST">
        {{csrf_field()}}
        <li> Ci<input type="text" name="ci" required></li>
        <li> Nombres<input type="text" name="nombres" required></li>
        <li> Apellido Paterno<input type="text" name="apellidopaterno"></li>
        <li> Apellido Materno<input type="text" name="apellidomaterno"></li>
        <li>
            <!-- Cargo<input type="text" name="cargo"> -->
            <label>Cargo</label>
            <select name="cargo" required>
                <option >--Seleccione un cargo--</option>
                <option value="Administrador">Administrador</option>
                <option value="Supervisor">Supervisor</option>

            </select>
        </li>
        <li> Email<input type="text" name="email"></li>
        <li> Password<input type="password" name="password"></li>
        <li> Celular<input type="text" name="celular"></li>
        <li> Direccion<input type="text" name="direccion"></li>
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
@endsection
