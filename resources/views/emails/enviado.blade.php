
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <div class="jumbotron shadow-lg">
                    <h1 class="display-4">Correo enviado!</h1>
                    <p class="lead">Correo enviado con las medicinas que hacen falta</p>
                    <hr class="my-4">
                    <p>Para volver a Inicio pulse botón</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="{{url('/')}}" role="button">Salir</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endsection
