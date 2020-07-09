@extends('welcome')
@section('Usuarios')
    <form action="{{ url("/user") }}" method="GET">
        {{csrf_field()}}
        @method('GET')
        <li> Ci<input type="text" name="ci" value="{{ old('ci', $user->ci) }}" required></li>
        <li> Nombres<input type="text" name="nombres" value="{{ old('nombres', $user->nombres) }}" required></li>
        <li> Apellido Paterno<input type="text" name="apellidopaterno" value="{{ old('apellidopaterno', $user->apellidopaterno) }}"></li>
        <li> Apellido Materno<input type="text" name="apellidomaterno" value="{{ old('apellidomaterno', $user->apellidomaterno) }}"></li>
        <li>
            <!-- Cargo<input type="text" name="cargo"> -->
            <label>Cargo</label>
            <select name="cargo" required>
                <option >--Seleccione un cargo--</option>
                <option value="Administrador">Administrador</option>
                <option value="Supervisor">Supervisor</option>

            </select>
        </li>
        <li> Email<input type="text" name="email" value="{{ old('email', $user->email) }}"></li>
        <li> Password<input type="password" name="password" value="{{ old('password', $user->password) }}"></li>
        <li> Celular<input type="text" name="celular" value="{{ old('celular', $user->celular) }}"></li>
        <li> Direccion<input type="text" name="direccion" value="{{ old('direccion', $user->direccion) }}"></li>
        <input type="submit" value="Guardar">
        <input type="reset" value="Borrar">
    </form>
@endsection
