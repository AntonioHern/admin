@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">

                <h2>Lista de Personal</h2>
                <h6>
                    @if($search)
                        <div class="alert alert-primary">Los resultados de la búsqueda '{{$search}}' son:</div>
                    @endif
                </h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-light">
                    <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo apellido</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->apellido1}}</td>
                            <td>{{$user->apellido2}}</td>
                            <td>

                                <div class="btn-group">
                                    <a href="{{route('usuarios.show',$user->id)}}">
                                        <button type="button" class="btn btn-secondary mr-2" data-toggle="tooltip"
                                                data-placement="bottom" title="Ver"><i class="far fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{route('usuarios.edit',$user->id)}}">
                                        <button type="button" class="btn btn-primary mr-2" data-toggle="tooltip"
                                                data-placement="bottom" title="Editar"><i class="far fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="{{url('usuarios/destroy',$user->id)}}" class="delete">
                                        <button type="button" class="btn btn-danger  mr-2" data-toggle="tooltip"
                                                data-placement="bottom" title="Eliminar"><i
                                                class="far fa-trash-alt"></i>
                                        </button>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button id="myModal2" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"
                title="Añadir usuario"><i class="fas fa-user-plus"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="alert alert-danger" id="alert-danger" style="display:none"></div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir Usuario</h5>
                    </div>

                    <form action="{{url('usuarios')}}" method="post" enctype="multipart/form-data" id="form">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Escribe tu nombre">
                            </div>
                            <div class="form-group">
                                <label for="apllido1">Primer Apellido</label>
                                <input type="text" class="form-control" name="apellido1" id="apellido1"
                                       placeholder="Primer apellido">
                            </div>
                            <div class="form-group">
                                <label for="apllido2">Segundo Apellido</label>
                                <input type="text" class="form-control" name="apellido2" id="apellido2"
                                       placeholder="Segundo apellido">
                            </div>
                            <div class="form-group">
                                <label for="email">Email </label>
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Escribe tu email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="ajaxSubmit">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function(){
            $('#ajaxSubmit').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/usuarios') }}",
                    method: 'post',
                    data: {
                        name: jQuery('#name').val(),
                        apellido1: jQuery('#apellido1').val(),
                        apellido2: jQuery('#apellido2').val(),
                        email: jQuery('#email').val(),
                        password: jQuery('#password').val(),
                    },
                    success: function (result) {
                        if (result.errors) {
                            swal
                            $('.alert-danger').text('');

                            $.each(result.errors, function (key, value) {
                                $('.alert-danger').show();
                                $('.alert-danger').append('<li>' + value + '</li>');
                            });
                        } else {
                            $('.alert-danger').hide();
                            $('#open').hide();
                            $('#myModal').modal('hide');
                        }
                    }
                });

            });
        });


    </script>
@endsection



