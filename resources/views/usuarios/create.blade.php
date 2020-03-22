
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 mt-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<form action="{{route('usuarios.store')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" placeholder="Escribe tu nombre">
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
            <label for="email">Email </label>
            <input type="email" class="form-control" name="email"placeholder="Escribe tu email">
        </div>
        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" name="foto" placeholder="Foto">
    </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
         <button type="reset" onclick= "self.location.href = '/usuarios'" class="btn btn-danger">Cancelar</button>
    </form>
    </div>
</div>
</div>

    @endsection
