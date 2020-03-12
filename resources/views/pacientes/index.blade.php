
@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Lista de Pacientes<a href="{{route('pacientes.create')}}">
                <button type="button" class="btn btn-success float-right" data-toggle="tooltip" data-placement="auto" title="Agregar Paciente"><i class="fas fa-user-plus"></i></button>
            </a></h2>

        <h6>
            @if($search)
                <div class="alert alert-primary">Los resultados de la búsqueda '{{$search}}' son:</div>
            @endif
        </h6>

        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Primer apellido</th>
                <th scope="col">Segundo apellido</th>
                <th scope="col">Opciones</th>

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
                            <div class="btn-group">
                            <a href="{{route('pacientes.show',$paciente->dni)}}">
                                <button type="button" class="btn btn-secondary mr-2" data-toggle="tooltip" data-placement="bottom" title="Ver"><i class="far fa-eye"></i>
                                </button>
                            </a>
                            <a href="{{route('pacientes.edit',$paciente->dni)}}">
                                <button type="button" class="btn btn-primary mr-2" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="far fa-edit"></i></button>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i  class="fas fa-trash-alt"></i></button>
                            </div>
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
