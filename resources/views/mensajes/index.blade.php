@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <h2>Listas de Mensajes</h2>

                <h6>
                    @if($search ?? '')
                        <div class="alert alert-primary">Los resultados de la búsqueda '{{$search ?? ''}}' son:</div>
                    @endif
                </h6>

                <table class="table table-light">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">FECHA</th>
                        <th scope="col">ENVIADO POR</th>
                        <th scope="col">ASUNTO</th>
                        <th scope="col">OPCIONES</th>

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
                                            <button type="button" class="btn btn-secondary" data-toggle="tooltip"
                                                    data-placement="bottom" title="Leer"><i class="far fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="/">
                                            <button type="button" class="btn btn-primary" data-toggle="tooltip"
                                                    data-placement="bottom" title="Responder"><i
                                                    class="fas fa-reply"></i></button>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                                                data-placement="bottom" title="Eliminar"><i
                                                class="far fa-trash-alt"></i></button>
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
        </div>
    </div>
@endsection
