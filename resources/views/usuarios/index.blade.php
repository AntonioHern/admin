@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Listas de Personal<a href="{{route('usuarios.create')}}">
                <button type="button" class="btn btn-success float-right">Agregar Usuarios</button>
            </a></h2>

        <h6>
            @if($search)
                <div class="alert alert-primary">Los resultados de la búsqueda '{{$search}}' son:</div>
            @endif
        </h6>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">PRIMER APELLIDO</th>
                <th scope="col">SEGUNDO APELLIDO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">OPCIONES</th>

            </tr>
            </thead>
            <tbody>
            @foreach( $users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->apellido1}}</td>
                    <td>{{$user->apellido2}}</td>
                    <td>{{$user->email}}</td>
                    <td>

                        <form action="{{route('usuarios.destroy',$user->id)}}" method="post">
                            <a href="{{route('usuarios.show',$user->id)}}">
                                <button type="button" class="btn btn-secondary">Ver</button>
                            </a>
                            <a href="{{route('usuarios.edit',$user->id)}}">
                                <button type="button" class="btn btn-primary">Editar</button>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row justify-content-center">
            {{ $users->links() }}
        </div>
    </div>

@endsection
