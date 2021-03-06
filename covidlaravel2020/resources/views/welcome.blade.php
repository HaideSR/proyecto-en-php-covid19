<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/print.css') }}" media="print">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        @laravelPWA
    </head>
    <body>
        @yield('content')
        <div class="flex-center position-ref full-height">
            <main class="flex">

                @auth
                    {{-- {{auth()->user()}} --}}
                    <div class="content-menu">
                        <ul class="menu">
                            <li class="item-menu">
                                <a href="/">Inicio</a>
                            </li>
                            <li class="item-menu">
                                <a href="/user">Usuarios</a>
                            </li>
                            <li class="item-menu">
                                <a href="#">Pacientes</a>
                            </li>
                        </ul>
                    </div>
                    <div class="content-home">
                        <header class="flex-sb">
                            <div>Sistema de Control</div>
                            <div class="flex">
                                <span>{{auth()->user()->nombres}}</span>
                                {{-- <a href="{{ route('logout') }}">Cerrar sesi??n</a> --}}
                                <div  aria-labelledby="navbarDropdown">
                                    <a class="  btn-s btn-red" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesi??n') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </header>
                        @yield('Usuarios')
                    </div>
                    @else
                    {{-- @yield('Usuarios') --}}
                        <script>window.location = "/login";</script>
                        {{-- {{ Route::view('/login', 'auth.login') }} --}}
                        {{-- {{(Route::view('/login','auth.login'))}} --}}
                        {{--  --}}
                @endauth
            </main>
        </div>
    </body>
</html>
