
@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Listas de Pacientes<a href="{{route('pacientes.create')}}">
                <button type="button" class="btn btn-success float-right">Agregar Paciente</button>
            </a></h2>

        <h6>
            @if($search)
                <div class="alert alert-primary">Los resultados de la búsqueda '{{$search}}' son:</div>
            @endif
        </h6>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">DNI</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">PRIMER APELLIDO</th>
                <th scope="col">SEGUNDO APELLIDO</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $pacientes as $paciente)
                <tr>
                    <th scope="row">{{$paciente->dni}}</th>
                    <td>{{$paciente->nombre}}</td>
                    <td>{{$paciente->apellido1}}</td>
                    <td>{{$paciente->apellido2}}</td>
                    <td>

                        <form action="{{route('pacientes.destroy',$paciente->dni)}}" method="post">
                            <a href="{{route('pacientes.show',$paciente->dni)}}">
                                <button type="button" class="btn btn-secondary">Ver</button>
                            </a>
                            <a href="{{route('pacientes.edit',$paciente->dni)}}">
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
            {{ $pacientes->links() }}
        </div>
    </div>

@endsection
