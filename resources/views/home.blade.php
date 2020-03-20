@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Enviar mensaje</div>
                    <form action="{{route('store')}}" method="post">
                        @csrf
                        <div class="card-body shadow-lg">
                            <div class="form-group">
                                <select name="receptor_id" class="form-control">
                                    <option value="">Selecciona al usuario</option>
                                    @foreach($usuarios as $usu)
                                        <option value="{{$usu->id}}">{{$usu->name}} {{$usu->apellido1}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input  type="text" name="asunto" class="form-group" placeholder="Asunto">
                            </div>
                            <div class="form-group">
                                <textarea name="cuerpo" class="form-control" placeholder="Escriba aquí su mensaje"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
