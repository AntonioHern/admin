@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3 ">
                <h2>{{$encabezado}}</h2>
                @if($search)
                    <div class="alert alert-primary">Los resultados de la búsqueda '{{$search}}' son:</div>
                @endif
                <table class="table table-light">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">STOCK</th>
                        @if($encabezado=='Últimos tratamientos')
                        <th scope="col">FECHA DE CREACIÓN</th>
                            @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tratamientos as $trata)
                        <tr>
                            <td>{{$trata->nMedicina}}</td>
                            <td>{{$trata->stock}}</td>
                            @isset($trata->created_at)
                                <td>{{$trata->created_at}}</td>
                                @endisset
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
