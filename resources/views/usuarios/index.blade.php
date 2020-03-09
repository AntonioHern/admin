@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Listas de Personal<a href="{{route('usuarios.create')}}">
                        <button type="button" class="btn btn-success float-right" title="Añadir Usuario"><i class="fas fa-user-plus"></i></button>
                    </a></h2>
                <h6>
                    @if($search)
                        <div class="alert alert-primary">Los resultados de la búsqueda '{{$search}}' son:</div>
                    @endif
                </h6>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo apellido</th>
                        <th>Opciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->apellido1}}</td>
                            <td>{{$user->apellido2}}</td>
                            <td>
                                <form action="{{route('usuarios.destroy',$user->id)}}" method="post">
                                    <a href="{{route('usuarios.show',$user->id)}}">
                                        <button type="button" class="btn btn-secondary" title="Ver"><i class="far fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{route('usuarios.edit',$user->id)}}">
                                        <button type="button" class="btn btn-primary" title="Editar"><i class="far fa-edit"></i></button>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

