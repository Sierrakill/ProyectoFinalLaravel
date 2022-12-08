@extends('plantilla')


@section('title', 'Index Ordenes')

@section('content')

    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Lista de Ordenes</h4>
                    {{-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a>Index</a></li>
                            <li class="breadcrumb-item active">Productos</li>
                        </ol>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-body">
                        <h4 class="mb-sm-0 font-size-18 pb-3"> Ordenes</h4>
                        @include('layouts.alert')
                        <div class="row mb-2">

                            <div class="col-sm-4">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <button type="button"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"
                                        data-bs-toggle="modal" data-bs-target="#modalAñadir"><i
                                            class="mdi mdi-plus me-1"></i>Añadir nueva orden</button>
                                    {{-- <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">


                                </div>
                            </div><!-- end col-->
                        </div>
                        @if ($orders->isNotEmpty())
                            <div class="table">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="table-light">
                                        <tr>

                                            <th class="align-middle">No. Folio</th>
                                            <th class="align-middle">Cliente</th>
                                            <th class="align-middle">Monto</th>
                                            <th class="align-middle">Tipo de pago</th>
                                            <th class="align-middle">Estado de la orden</th>
                                            <th class="align-middle">Ver Detalles</th>
                                            {{-- <th class="align-middle">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>

                                                <td><a class="text-body fw-bold">{{ $order->folio }}</a> </td>
                                                <td>{{ $order->client_id }}</td>

                                                <td>
                                                    $ {{ $order->amount }}
                                                </td>
                                                <td>
                                                    @switch($order->payment_method)
                                                        @case(1)
                                                            <i class="fas fa-money-bill-alt me-1"></i> Tarjeta
                                                        @break

                                                        @case(2)
                                                            <i class="fas fa-money-bill-alt me-1"></i> Efectivo
                                                        @break
                                                    @endswitch

                                                </td>
                                                <td>
                                                    @switch($order->status)
                                                        @case(0)
                                                            <span
                                                                class="badge badge-pill badge-soft-warning font-size-12">Pendiente</span>
                                                        @break

                                                        @case(1)
                                                            <span class="badge badge-pill badge-soft-warning font-size-12">En
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
                                                            <span class="badge badge-pill badge-soft-warning font-size-12">Pendiente
                                                                de pago</span>
                                                        @break
                                                    @endswitch
                                                </td>

                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <a href="{{ route('orders.show', $order) }}"
                                                        class="btn btn-primary btn-sm btn-rounded">Ver Detalles</a>
                                                </td>
                                                {{-- <td>
                                                    <div class="d-flex gap-3">

                                                        <a class="text-success" data-bs-toggle="modal"
                                                            data-bs-target="#modalEditar"><i
                                                                class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a class="text-danger"data-bs-toggle="modal"
                                                            data-bs-target="#modalEliminar"><i
                                                                class="mdi mdi-delete font-size-18"></i></a>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h4 class="card-head">Sin ordenes</h4>
                        @endif
                        <ul class="pagination pagination-rounded justify-content-end mb-2">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                    <i class="mdi mdi-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                    <i class="mdi mdi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->



        <!-- Modal -->
        <div class="modal fade" id="modalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Orden</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row mb-4">
                                <label for="client_id" class="col-form-label col-lg-2">Cliente</label>
                                <div class="col-lg-10">
                                    <select name="client_id" class="form-select" id="client_id">
                                        @if ($clients->isNotEmpty())
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="prime_id" class="col-form-label col-lg-2">Materia prima</label>
                                <div class="col-lg-10">
                                    <select name="prime_id" class="form-select">
                                        @if ($primes->isNotEmpty())
                                            @foreach ($primes as $prime)
                                                <option value="{{ $prime->id }}">{{ $prime->description }}
                                                    <img src="/img/covers/{{ $prime->cover }}" class="img-thumbnail"
                                                        alt="">
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="quantity" class="col-form-label col-lg-2">Cantidad</label>
                                <div class="col-lg-10">
                                    <input type="number" name="quantity" id="quantity" class=" inner form-control" required />
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="coupon_id" class="col-form-label col-lg-2">Cupón</label>
                                <div class="col-lg-10">
                                    <select name="coupon_id" class="form-select">
                                        @if ($coupons->isNotEmpty())
                                            @foreach ($coupons as $coupon)
                                                <option value="{{ $coupon->id }}">{{ $coupon->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="tasktotal" class="col-form-label col-lg-2">Metodo de pago</label>
                                <div class="col-lg-10">
                                    <select name="payment_method" class="form-select">
                                        <option value="1">Tarjeta</option>
                                        <option value="2">Efectivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Añadir orden</button>
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






    </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- container-fluid -->

@endsection
{{ $orders->links() }}
