


@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('pacientes.update', $paciente->dni)}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">DNI</label>
                        <input type="text" class="form-control"  name="dni" value="{{$paciente->dni}}" placeholder="DNI">
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control"  name="nombre" value="{{$paciente->nombre}}" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido1">Primer Apellido</label>
                        <input type="text" class="form-control" name="apellido1" value="{{$paciente->apellido1}}" placeholder="Primer apellido">
                    </div>
                    <div class="form-group">
                        <label for="apellido2">Segundo Apellido</label>
                        <input type="text" class="form-control" name="apellido2" value="{{$paciente->apellido2}}" placeholder="Segundo apellido">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="number" class="form-control" name="telefono" value="{{$paciente->telefono}}" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <label for="fNacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fNacimiento" value="{{$paciente->fNacimiento}}" placeholder="Fecha de Nacimiento">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" value="{{$paciente->foto}}" placeholder="Foto">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
