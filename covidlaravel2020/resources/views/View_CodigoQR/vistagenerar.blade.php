<h1>Todos los codigos QR generados</h1>
<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">token</th>
            <th scope="col">impresion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($codigos as $dato)
            <tr>
                <th scope="row">{{$dato->id}}</th>
                <td>{{$dato->remember_token}}</td>
                <td>{{$dato->impreso}}</td>
            </tr>
        @endforeach
    </tbody>

</table>
<a href="{{url('vistaqr')}}">todos los codigos</a>
