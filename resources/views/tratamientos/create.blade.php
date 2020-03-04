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
                <form action="{{route('tratamientos.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="paciente">Paciente</label>
                        <input type="text" class="form-control" name="paciente" value="" placeholder="DNI">
                    </div>
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
                        <input type="number" class="form-control" name="stock"placeholder="Stock">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
