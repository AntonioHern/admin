@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="jumbotron jumbotron-fluid shadow-lg m-auto p-5">
            <img class="img-thumbnail" height="200"width="200" src="{{asset('imagenes/'.$user->foto)}}">
            <h1 class="display-6">{{$user->name}}</h1>
            <h1 class="display-6">{{$user->apellido1}}</h1>
            <h1 class="display-6">{{$user->apellido2}}</h1>
            <p class="lead">{{$user->email}}</p>
        </div>
    </div>
    @endsection

