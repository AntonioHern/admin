
@extends('layouts.app')
@section('content')
    <div class="container align-content-center text-center">
        <h2>Listas de Mensajes</h2>

        <h6>
            @if($search ?? '')
                <div class="alert alert-primary">Los resultados de la búsqueda '{{$search ?? ''}}' son:</div>
            @endif
        </h6>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">FECHA</th>
                <th scope="col">ENVIADO POR</th>
                <th scope="col">ASUNTO</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $mensajes as $men)
                @foreach($usuarios as $user)
                <tr>
                    <th scope="row">{{$men->created_at}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$men->asunto}}</td>
                    <td>
                        <form action="{{route('mensajes.destroy',$men->id)}}" method="post">
                            <a href="{{route('mensajes.show',$men->id)}}">
                                <button type="button" class="btn btn-secondary" title="Ver"><i class="far fa-eye"></i></button>
                            </a>
                            <a href="/">
                                <button type="button" class="btn btn-primary"><i class="fas fa-reply"></i></button>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> </button>
                        </form>
                    </td>
                </tr>
                    @endforeach
            @endforeach
            </tbody>
        </table>
        <div class="row justify-content-center">

        </div>
    </div>
@endsection
