@extends('plantilla')


@section('title', 'Mostrar Ordenes')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">

                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Orden : #{{ $order->folio }} </h5>
                                    @include('layouts.alert')
                                </div>
                            </div>
                            <div class="col-7">

                                <a class="btn btn-danger text-light" data-bs-toggle="modal"
                                    data-bs-target="#modalEliminar">Eliminar orden</a>
                                <a class="btn btn-info text-light" data-bs-toggle="modal"
                                    data-bs-target="#modalEditar">Editar orden</a>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ asset('images/profile-img.png') }}" alt="" class="img-fluid">
                                <div class="col">
                                    <h2 class="text-bold">

                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <img src="{{ asset('img/avatars/' . $order->client->avatar) }}" alt=""
                                        class="img-thumbnail rounded-circle">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-12">Información</h4>


                        <div class="table">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Cupon utilizado: </th>
                                        <td> {{ $order->coupon->name }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No. Folio:</th>
                                        <td>#{{ $order->folio }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Método de pago:</th>
                                        <td>
                                            @switch($order->payment_method)
                                                @case(1)
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">Tarjeta</span>
                                                @break

                                                @case(2)
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">Efectivo</span>
                                                @break
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Monto total:</th>
                                        <td>${{ $order->amount }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cliente:</th>
                                        <td> {{ $order->client->name }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Materia:</th>
                                        <td>#{{ $order->prime->id }}</td>
                                        {{-- <td>#{{$order->prime->description}}</td> --}}
                                    </tr>

                                    <tr>
                                        <th scope="row">Estado de la orden:</th>
                                        <td>
                                            @switch($order->status)
                                                @case(0)
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">Pendiente</span>
                                                @break

                                                @case(1)
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">En
                                                        camino</span>
                                                @break

                                                @case(2)
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">Entregada</span>
                                                @break

                                                @case(3)
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">Cancelada</span>
                                                @break

                                                @case(4)
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">Olvidada</span>
                                                @break

                                                @case(5)
                                                    <span class="badge badge-pill badge-soft-warning font-size-12">Pendiente
                                                        de pago</span>
                                                @break
                                            @endswitch
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-body">

                                <h4 class="card-title">Productos</h4>
                                <p class="card-title-desc"></p>


                                <div class="table mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">Foto</th>
                                                <th data-priority="2">Descripción</th>
                                                <th data-priority="3">Unidades</th>
                                                <th data-priority="4">Precio</th>


                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <a href="{{ route('primes.show', $order->prime->id) }}">
                                                        <img src="{{ asset('img/covers/' . $order->prime->cover) }}"
                                                            alt="..." width="100px" height="100px"
                                                            class="img-thumbnail">
                                                    </a>
                                                </td>
                                                <td> {{ $order->prime->description }} </td>
                                                <td> {{ $order->prime->stock }} </td>
                                                <td>$ {{ $order->prime->amount }} </td>

                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        @endsection
        <!-- Modal -->
        <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Orden</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="modal-body text-center p-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" fill="currentColor"
                                class="bi bi-collection-fill" viewBox="0 0 16 16">
                                <path
                                    d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z" />
                            </svg>
                            <div class="mt-4">
                                <h4 class="mb-3">Estás por eliminar una orden</h4>
                                <p class="text-muted mb-4">¿Estás seguro de eliminar esta orden?</p>
                            </div>
                        </div>


                    </div>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-center">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-danger">Eliminar orden</button>
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

        <!-- Modal -->
        <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('orders.update', $order->id) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Orden</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row mb-4">
                                <label for="status" class="col-form-label col-lg-2">Estado de la orden</label>
                                <div class="col-lg-10">
                                    <select name="status" class="form-select">
                                        <option value="0">Pendiente</option>
                                        <option value="1">En camino</option>
                                        <option value="2">Entregada</option>
                                        <option value="3">Cancelada</option>
                                        <option value="4">Olvidada</option>
                                        <option value="5">Pendiente de pago</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
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
