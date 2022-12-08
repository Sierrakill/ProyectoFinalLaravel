@extends('plantilla')


@section('title', 'Mostrar usuarios')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h4 class="text-primary">Detalles Usuario</h4>
                                    @include('layouts.alert')
                                </div>
                            </div>
                            <div class="col-5 align-self-end">

                                <img src="{{ asset('images/profile-img.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <img src="{{ asset('img/avatars/' . $user->avatar) }}" alt=""
                                        class="img-thumbnail">
                                </div>
                                <h4 class="font-size-20 text-truncate">{{ $user->name . ' ' . $user->lastname }}</h4>
                                <p class="text-muted mb-0 text-truncate"> Puesto :
                                    @switch($user->rol)
                                        @case(0)
                                            {{ 'Gerente' }}
                                        @break

                                        @case(1)
                                            {{ 'Administrador' }}
                                        @break

                                        @case(2)
                                            {{ 'Vendedor' }}
                                        @break
                                    @endswitch
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-3 end-start">
                        <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar">Editar</a>
                        <a data-bs-toggle="modal" data-bs-target="#modalEliminar" class="btn btn-danger">Eliminar</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-12">Información</h4>


                            <div class="table">
                                <table class="table table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">ID:</th>
                                            <td>{{ $user->id }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Teléfono:</th>
                                            <td>{{ $user->phone_number }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Correo:</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- Modal Editar -->
        <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="row text-center">

                                <div class="row mb-4">
                                    <div class="col-lg-6  col-sm-12">
                                        <div class="form-outline text-start">
                                            <label class="form-label" for="name">Nombre</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ $user->name }}" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6  col-sm-12">
                                        <div class="form-outline text-start">
                                            <label class="form-label" for="lastname">Apellido</label>
                                            <input type="text" name="lastname" id="lastname" class="form-control"
                                                value="{{ $user->lastname }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-6  col-sm-12">
                                        <div class="form-outline text-start">
                                            <label class="form-label" for="name">Rol</label>
                                            <select name="rol" class="form-select">
                                                <option value="0">Gerente</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Vendedor</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6  col-sm-12">
                                        <div class="form-outline text-start">
                                            <label class="form-label" for="lastname">Foto de perfil</label>
                                            <input type="file" name="avatar" id="avatar" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-6  col-sm-12">
                                        <div class="form-outline text-start">
                                            <label class="form-label" for="lastname">Telefono</label>
                                            <input type="number" name="phone_number" id="phone_number" required
                                                class="form-control" value="{{ $user->phone_number }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-outline mb-4 text-start">
                                            <label class="form-label" for="form3Example3">Correo electronico</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ $user->email }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Guardar</button>
                                </div>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body text-center p-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" fill="currentColor"
                                class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                            <div class="mt-4">
                                <h4 class="mb-3">Estás por eliminar un usuario</h4>
                                <p class="text-muted mb-4">¿Estás seguro de eliminar este usuario?</p>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar usuario</button>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
