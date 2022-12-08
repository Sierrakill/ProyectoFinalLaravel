@extends('plantilla')


@section('title', 'Index Clientes')

@section('content')

    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Clientes</h4>

                    {{-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="">Clientes</a></li>
                            <li class="breadcrumb-item active">Clientes</li>
                        </ol>
                    </div> --}}

                </div>
            </div>
            @include('layouts.alert')
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Clientes</h4>
                        <a class="btn btn-success text-light" data-bs-toggle="modal" data-bs-target="#modalAñadir">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            Añadir nuevo cliente</a>
                        <p class="card-title-desc"></p>

                        <div class="container">
                            @if ($clients->isNotEmpty())
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th data-priority="1">Foto</th>
                                            <th data-priority="3">Nombre</th>
                                            <th data-priority="1">Apellido</th>
                                            <th data-priority="3">Correo</th>
                                            <th data-priority="3">Action</th>

                                    </thead>
                                    <tbody>



                                        @foreach ($clients as $client)
                                            <tr>
                                                <th>
                                                    <img src="{{ asset('img/avatars/' . $client->avatar) }}" alt="..."
                                                        width="100" height="100" class="img-thumbnail rounded-circle">
                                                </th>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->lastname }}</td>
                                                <td>
                                                    {{-- <span class="badge badge-soft-info"> --}}
                                                    {{ $client->email }}
                                                    {{-- </span> --}}
                                                </td>
                                                <td>

                                                    {{-- <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar">Editar</a>

                                            <button type="submit" data-bs-toggle="modal" data-bs-target="#modalEliminar" class="btn btn-danger">Eliminar</button> --}}

                                                    <a href="{{ route('clients.show', $client) }}" class="btn btn-info">Ver
                                                        Detalles</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <h4 class="card-title">Sin clientes</h4>
                            @endif
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Cliente</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row mb-4">
                                                <label for="name" class="col-form-label col-lg-2">Nombre</label>
                                                <div class="col-lg-10">
                                                    <input id="name" name="name" type="text"
                                                        class=" inner form-control" placeholder="Ingresar nombre">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="lastname" class="col-form-label col-lg-2">Apellido</label>
                                                <div class="col-lg-10">
                                                    <input id="lastname" name="lastname" type="text"
                                                        class="inner form-control" placeholder="Ingresar apellido">
                                                </div>
                                            </div>

                                            {{-- <div class="form-group row mb-4">
                                                <label for="user_id" class="col-form-label col-lg-2">Usuario</label>
                                                <div class="col-lg-10">
                                                    <select name="user_id" class="form-select">
                                                        @if ($users->isNotEmpty())
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                                    <img src="/img/avatar/{{ $user->avatar }}"
                                                                        class="img-thumbnail" alt="">
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <input hidden type="number" name="user_id" id="user_id"
                                                class="inner form-control" value="{{ Auth::user()->id }}" />

                                            <div class="form-group row mb-4">
                                                <label for="avatar" class="col-form-label col-lg-2">Foto</label>
                                                <div class="col-lg-10">
                                                    <input type="file" name="avatar" id="avatar"
                                                        class="inner form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="phone_number" class="col-form-label col-lg-2">Teléfono</label>
                                                <div class="col-lg-10">
                                                    <input type="number" name="phone_number" id="phone_number"
                                                        class="inner form-control" required />
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="email" class="col-form-label col-lg-2">Correo</label>
                                                <div class="col-lg-10">
                                                    <input type="email" name="email" id="email"
                                                        class="inner form-control" />
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="password" class="col-form-label col-lg-2">Contraseña</label>
                                                <div class="col-lg-10">
                                                    <input type="password" name="password" id="password"
                                                        class="inner form-control" />
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Añadir cliente</button>
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
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->



@endsection
