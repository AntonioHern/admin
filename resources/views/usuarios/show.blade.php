@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron jumbotron-fluid shadow-lg mt-3 p-5">
                    <img class="img-thumbnail" height="200" width="200" src="{{asset('imagenes/'.$user->foto)}}">
                    <h1 class="display-6">{{$user->name}}</h1>
                    <h1 class="display-6">{{$user->apellido1}}</h1>
                    <h1 class="display-6">{{$user->apellido2}}</h1>
                    <p class="lead">{{$user->email}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

