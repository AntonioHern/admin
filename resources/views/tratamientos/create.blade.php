@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('tratamientos.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="paciente">Paciente</label>
                        <input type="text" class="form-control" name="paciente" value="{{$paciente->dni}}" readonly
                               placeholder="DNI">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre Paciente</label>
                        <input type="text" class="form-control" name="nombre" value="{{$paciente->nombre}}" readonly
                               placeholder="DNI">
                    </div>
                    <div class="form-group">
                        <label for="apellido1">Primer Apellido</label>
                        <input type="text" class="form-control" name="apellido1" value="{{$paciente->apellido1}}"
                               readonly placeholder="DNI">
                    </div>
                    <div class="form-group">
                        <label for="apellido2">Segundo Apellido</label>
                        <input type="text" class="form-control" name="apellido2" value="{{$paciente->apellido2}}"
                               readonly placeholder="DNI">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nMedicina">Nombre Medicina</label>
                        <input type="text" class="form-control" name="nMedicina" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="dosis">Dosis</label>
                        <input type="number" class="form-control" name="dosis" placeholder="Dosis">
                    </div>
                    <div class="form-group">
                        <label for="cada">Frecuencia</label>
                        <input type="number" class="form-control" name="cada" placeholder="Frecuencia">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" placeholder="Stock">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </form>

    </div>
@endsection
