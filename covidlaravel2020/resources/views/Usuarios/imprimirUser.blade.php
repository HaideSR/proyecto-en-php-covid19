<style>
header,
.no-imprimir,
.content-menu,
.btn-s{
    display: none !important;
}
table{
    font-size: 14px;
    font-family: sans-serif
}
table, td, th {
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
}
</style>
<table class="table">
    <tr>
       <th>N°</th>
       <th>Nombre</th>
       <th>Apellido paterno</th>
       <th>Apellido Materno</th>
       <th>Ci</th>
       <th>Cargo</th>
       <th>Celular</th>
       <th>Email</th>
    </tr>

     @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->nombres}}</td>
                <td>{{$user->apellidopaterno}}</td>
                <td>{{$user->apellidomaterno}}</td>
                <td>{{$user->ci}}</td>
                <td>{{$user->cargo}}</td>
                <td>{{$user->celular}}</td>
                <td>{{$user->email}} </td>
            </tr>
        @endforeach
</table>
