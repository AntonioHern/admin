


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
                <form action="{{route('tratamientos.update', $tratamiento->id)}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="paciente">Paciente</label>
                        <input type="text" class="form-control"  name="paciente" value="{{$tratamiento->paciente}}" readonly placeholder="Medicina">
                    </div>
                    <div class="form-group">
                        <label for="nMedicina">Medicina</label>
                        <input type="text" class="form-control"  name="nMedicina" value="{{$tratamiento->nMedicina}}" readonly placeholder="Medicina">
                    </div>
                    <div class="form-group">
                        <label for="dosis">Dosis</label>
                        <input type="number" class="form-control"  name="dosis" value="{{$tratamiento->dosis}}" placeholder="Dosis">
                    </div>
                    <div class="form-group">
                        <label for="cada">Posología</label>
                        <input type="number" class="form-control"  name="cada" value="{{$tratamiento->cada}}" placeholder="Posología">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control"  name="stock" value="{{$tratamiento->stock}}" placeholder="Stock">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
