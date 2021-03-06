@extends('layouts.app')
@section('content')
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-8 mt-3">
               <div class="jumbotron shadow-lg">
                   <h1 class="display-6">{{$usuario->name}}</h1>
                   <p class="lead">{{$mensaje->created_at}}</p>
                   <p class="lead">{{$mensaje->asunto}}</p>
                   <hr class="my-4">
                   <p>{{$mensaje->cuerpo}}</p>
                   <hr class="my-4">
                   <form action="{{route('mensajes.destroy',$mensaje->id)}}" method="post">
                       <a href="{{url('/')}}">
                           <button type="button" class="btn btn-primary">Responder</button>
                       </a>
                       @csrf
                       @method('DELETE')
                       <button type="submit" class="btn btn-danger">Eliminar</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
@endsection
