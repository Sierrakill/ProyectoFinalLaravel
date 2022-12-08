@extends('plantilla')


@section('title', 'Index Cupones')

@section('content')

    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Index Cupones</h4>

                    {{-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a>Index</a></li>
                            <li class="breadcrumb-item active">Cupones</li>
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

                        <h4 class="card-title">Cupones</h4>
                        @include('layouts.alert')
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAñadir">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            Añadir Cupón</a>
                        <p class="card-title-desc"></p>


                        <div class="container text-center">
                            <div class="row row-cols-1 row-cols-lg-2 g-2 g-lg-3">
                                @if ($coupons->isNotEmpty())
                                    @foreach ($coupons as $coupon)
                                        <div class="col">
                                            <div class="card bg-info m-1" style="width:400px;">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0"><img alt=""
                                                                class="avatar-md img-fluid"
                                                                src="{{ asset('images/cupones.png') }}"></div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h5 class="card-title">Nombre : {{ $coupon->name }}</h5>
                                                            <h3 class="text-white">Código : {{ $coupon->code }}</h3>
                                                            <p class="text-white">Descuento: % {{ $coupon->discount }}</p>
                                                            <p class="text-white">Usos : {{ $coupon->count_uses }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <!-- Border Buttons -->
                                                    <div class="hstack flex-wrap justify-content-center gap-2 mb-3 mb-lg-0">
                                                        {{-- <a class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#modalEditar">Editar</a>

                                                        <button type="submit" data-bs-toggle="modal"
                                                            data-bs-target="#modalEliminar"
                                                            class="btn btn-danger">Eliminar</button> --}}

                                                        <a href="{{ route('coupons.show', $coupon) }}"
                                                            class="btn btn-primary">Ver
                                                            Detalles</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4 class="card-title">Sin cupones</h4>
                                @endif

                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('coupons.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Cupón</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row mb-4">
                                                <label for="name" class="col-form-label col-lg-3">Nombre cupón</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="name" id="name"
                                                        class="inner form-control" />
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="code" class="col-form-label col-lg-3">Código</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="code" id="code"
                                                        class="inner form-control" />
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="max_uses" class="col-form-label col-lg-3">Limite usos</label>
                                                <div class="col-lg-9">
                                                    <input type="number" name="max_uses" id="max_uses" required
                                                        class="inner form-control" />
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="count_uses" class="col-form-label col-lg-3">Usos</label>
                                                <div class="col-lg-9">
                                                    <input type="number" name="count_uses" id="count_uses" required
                                                        class="inner form-control" />
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="min_amount" class="col-form-label col-lg-3">Cantidad
                                                    minima</label>
                                                <div class="col-lg-9">
                                                    <input type="number" name="min_amount" id="min_amount" required
                                                        class="inner form-control" />
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="discount" class="col-form-label col-lg-3">Descuento %</label>
                                                <div class="col-lg-9">
                                                    <input type="number" name="discount" id="discount" required
                                                        class="inner form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Añadir cupón</button>
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
    </div>
    <!-- End Page-content -->



    </div>
@endsection
