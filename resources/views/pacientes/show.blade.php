@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 ">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <img class="img-thumbnail" height="200" width="200"
                             src="{{asset('imagenes/'.$paciente->foto)}}">
                        <h1 class="display-6">{{$paciente->nombre}}</h1>
                        <h1 class="display-6">{{$paciente->apellido1}}</h1>
                        <h1 class="display-6">{{$paciente->apellido2}}</h1>
                        <label for="dni">DNI</label>
                        <p class="lead">{{$paciente->dni}}</p>
                        <label for="telefono">Teléfono</label>
                        <p class="lead">{{$paciente->telefono}}</p>
                        <label for="fNacimiento">Fecha de Nacimiento</label>
                        <p class="lead">{{$paciente->fNacimiento}}</p>
                    </div>
                </div>
            </div>
            <div class="col-8 justify-content-center align-content-center text-center">

                <h2>Listas de tratamientos <a href="{{route('tratamientos.create')}}">
                        <button type="button" class="btn btn-success float-right ml-5">Agregar tratamiento</button>
                    </a></h2>

                <h6>
                    @if($search ?? '')
                        <div class="alert alert-primary">Los resultados de la búsqueda '{{$search ?? ''}}' son:</div>
                    @endif
                </h6>


                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Paciente</th>
                        <th scope="col">Medicina</th>
                        <th scope="col">Dosis</th>
                        <th scope="col">Cada</th>
                        <th scope="col">Stock</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php use App\Tratamiento;
                    /** @var TYPE_NAME $paciente */
                    $tratamientos = Tratamiento::where("paciente","=",$paciente->dni)->get();
                    ?>
                        @foreach($tratamientos as $trat)
                        <tr>
                            <th scope="row">{{$trat->paciente}}</th>
                            <td>{{$trat->nMedicina}}</td>
                            <td>{{$trat->dosis}}</td>
                            <td>{{$trat->cada}}</td>
                            <td>{{$trat->stock}}</td>
                        <tr/>
                            @endforeach

                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection
