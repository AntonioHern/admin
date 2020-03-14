
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
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
            <div class="col-md-1"></div>
        </div>
    </div>
    @endsection
