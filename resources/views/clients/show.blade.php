@extends('plantilla')


@section('title', 'Mostrar clientes')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xl-12">
                <div class="card overflow-hidden">
                    <div class="bg-info bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h4 class="text-primary">Detalles Clientes</h4>
                                    @include('layouts.alert')
                                </div>
                            </div>
                            <div class="col-5 align-self-end">

                                <img src="{{ asset('images/clients/clients.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <img src="{{ asset('img/avatars/' . $client->avatar) }}" alt=""
                                        class="img-thumbnail rounded-circle">
                                </div>
                                <h5 class="font-size-15 text-truncate"> {{ $client->name }} </h5>



                            </div>

                            <div class="container">
                                <div class="col-sm-3 end-start">
                                    <a class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalEditar">Editar</a>
                                    <a data-bs-toggle="modal" data-bs-target="#modalEliminar"
                                        class="btn btn-danger">Eliminar</a>
                                </div>


                            </div> <!-- container-fluid -->

                        </div>
                    </div>
                </div>
                <!-- end card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Ordenes</h4>

                                <p class="card-title-desc"></p>

                                <div class="container">
                                    @if ($client->orders->isNotEmpty())

                                        <table id="tech-companies-1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th data-priority="1">Folio</th>
                                                    <th data-priority="2">Monto Total</th>
                                                    <th data-priority="3">Estatus</th>
                                                    <th data-priority="4">Action</th>

                                            </thead>
                                            <tbody>
                                                @foreach ($client->orders as $order)
                                                    <tr>
                                                        @switch($order->client_id)
                                                            @case($client->id)
                                                                <td> {{ $order->folio }} </td>
                                                                <td> {{ $order->amount }} </td>
                                                                <td>
                                                                    @switch($order->status)
                                                                        @case(0)
                                                                            <span
                                                                                class="badge badge-pill badge-soft-warning font-size-12">Pendiente</span>
                                                                        @break

                                                                        @case(1)
                                                                            <span
                                                                                class="badge badge-pill badge-soft-warning font-size-12">En
                                                                                camino</span>
                                                                        @break

                                                                        @case(2)
                                                                            <span
                                                                                class="badge badge-pill badge-soft-warning font-size-12">Entregada</span>
                                                                        @break

                                                                        @case(3)
                                                                            <span
                                                                                class="badge badge-pill badge-soft-warning font-size-12">Cancelada</span>
                                                                        @break

                                                                        @case(4)
                                                                            <span
                                                                                class="badge badge-pill badge-soft-warning font-size-12">Olvidada</span>
                                                                        @break

                                                                        @case(5)
                                                                            <span
                                                                                class="badge badge-pill badge-soft-warning font-size-12">Pendiente
                                                                                de pago</span>
                                                                        @break
                                                                    @endswitch
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('orders.show', $order) }}"
                                                                        class="btn btn-info">Ver Detalles</a>
                                                                </td>
                                                            @break

                                                            @default
                                                        @endswitch


                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    @else
                                        <h4 class="card-title">Sin ordenes</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-12">Información Cliente</h4>


                        <div class="table">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">ID:</th>
                                        <td>{{ $client->id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nombre:</th>
                                        <td>{{ $client->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Apellido:</th>
                                        <td>{{ $client->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Teléfono:</th>
                                        <td>{{ $client->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Correo:</th>
                                        <td>{{ $client->email }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>


        @endsection
        <!-- Modal -->
        <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('clients.update', $client->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                    <input id="name" name="name" type="text" class=" inner form-control"
                                        placeholder="Ingresar nombre" value="{{ $client->name }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="lastname" class="col-form-label col-lg-2">Apellido</label>
                                <div class="col-lg-10">
                                    <input id="lastname" name="lastname" type="text" class="inner form-control"
                                        placeholder="Ingresar apellido" value="{{ $client->lastname }}">
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
                                    <input type="number" name="phone_number" id="phone_number" required
                                        class="inner form-control" value="{{ $client->phone_number }}" />
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="email" class="col-form-label col-lg-2">Correo</label>
                                <div class="col-lg-10">
                                    <input type="email" name="email" id="email" class="inner form-control"
                                        value="{{ $client->email }}" />
                                </div>
                            </div>
                            {{-- <div class="form-group row mb-4">
                                <label for="password" class="col-form-label col-lg-2">Contraseña</label>
                                <div class="col-lg-10">
                                    <input type="password" name="password" id="password"
                                        class="inner form-control" value="{{$client->password or old('password')}}"/>
                                </div>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Editar cliente</button>
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

        <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Cliente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="modal-body text-center p-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160"
                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                            <div class="mt-4">
                                <h4 class="mb-3">Estás por eliminar una cliente</h4>
                                <p class="text-muted mb-4">¿Estás seguro de eliminar esta cliente?</p>

                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                            <form action="{{ route('clients.destroy', $client) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div>
                                        <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="delete">Eliminar cliente</button>
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
        </div>
