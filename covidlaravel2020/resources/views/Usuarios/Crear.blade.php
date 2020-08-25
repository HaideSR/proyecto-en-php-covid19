@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de usuarios') }}</div>
                <form action="{{ url("/user") }}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Ci') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="ci" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="nombres" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="apellidopaterno" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="apellidomaterno" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>
                        <div class="col-md-6">
                            <!--<input type="text" name="cargo" required>-->
                    <select name="cargo" required>
                    <option >--Seleccione un cargo--</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Supervisor">Supervisor</option>

                    </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="celular" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Direcciósn') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="direccion" required>
                        </div>
                    </div>
                    <center>
        <input class="btn btn-success" type="submit" value="Enviar">
        <input class="btn btn-danger" type="reset" value="Borrar"></center>
    </form>

    </div>
    </div>
  </div>
  </div>
</div>

@endsection
