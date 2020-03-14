<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Administración</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <script src="https://kit.fontawesome.com/bfc42573e2.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/myJs.js')}}"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/estilo.css')}}" rel="stylesheet">
</head>
<body>
<div class="container justify-content-center">
    <div class="row">
        <div class="col-md-10">
            <h2>Tratamientos a revisar</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Paciente</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">Segundo Apellido</th>
                    <th scope="col">Medicina</th>
                    <th scope="col">Stock</th>
                </tr>
                </thead>
                <tbody>

                @for ($i = 0; $i < 20; $i++)
                    @isset($paciente[$i])
                        <tr>
                            <th scope="row">{{$paciente[$i]}}</th>
                            <td>{{$apellido1[$i]}}</td>
                            <td>{{$apellido2[$i]}}</td>
                            <td>{{$medicina[$i]}}</td>
                            <td>{{$stock[$i]}}</td>
                        </tr>
                    @endisset
                @endfor

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
