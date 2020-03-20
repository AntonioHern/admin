

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
                <form action="{{route('usuarios.update', $user->id)}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control"  name="name" value="{{$user->name}}" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido1">Primer Apellido</label>
                        <input type="text" class="form-control" name="apellido1" value="{{$user->apellido1}}" placeholder="Primer apellido">
                    </div>
                    <div class="form-group">
                        <label for="apellido2">Segundo Apellido</label>
                        <input type="text" class="form-control" name="apellido2" value="{{$user->apellido2}}" placeholder="Segundo apellido">
                    </div>
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Escribe tu email">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" value="" placeholder="Escribe tu contraseña">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" value="{{asset('imagenes/'.$user->foto)}}" placeholder="Foto">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{url('/usuarios')}}"><button type="submit" class="btn btn-danger">Cancelar</button></a>
                </form>
            </div>
        </div>
    </div>
@endsection
