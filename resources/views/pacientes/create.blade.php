
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
                <form action="{{route('pacientes.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" name="dni"  placeholder="Ej: 12345678X">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apllido1">Primer Apellido</label>
                        <input type="text" class="form-control" name="apellido1" placeholder="Primer apellido">
                    </div>
                    <div class="form-group">
                        <label for="apllido2">Segundo Apellido</label>
                        <input type="text" class="form-control" name="apellido2" placeholder="Segundo apellido">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" name="telefono"placeholder="teléfono">
                    </div>
                    <div class="form-group">
                        <label for="fNacimiento">Fecha Nacimiento</label>
                        <input type="date" class="form-control" name="fNacimiento" placeholder="Fecha nacimiento">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" placeholder="Foto">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" onclick= "self.location.href = '/pacientes'" class="btn btn-danger">Cancelar</button>
                </form>


            </div>
        </div>
    </div>
@endsection

