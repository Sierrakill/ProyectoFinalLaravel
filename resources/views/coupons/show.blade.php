@extends('plantilla')


@section('title', 'Mostrar cupón')

@section('content')
    <div class="container">
        <div class="row ">

            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h4 class="text-primary">Cupón {{ $coupon->name }}</h4>
                                    @include('layouts.alert')
                                </div>
                                <a class="btn btn-danger text-light" data-bs-toggle="modal"
                                    data-bs-target="#modalEliminar">Eliminar cupón</a>
                                <a class="btn btn-info text-light" data-bs-toggle="modal"
                                    data-bs-target="#modalEditar">Editar cupón</a>
                            </div>
                            <div class="col-xl-6">
                                <div class="product-detai-imgs">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-4">
                                            <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">
                                                <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill"
                                                    href="#product-1" role="tab" aria-controls="product-1"
                                                    aria-selected="true">
                                                    <img src="{{ asset('images/cupones.png') }}" alt=""
                                                        class="img-fluid mx-auto d-block rounded">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="product-1" role="tabpanel"
                                                    aria-labelledby="product-1-tab">
                                                    <div>
                                                        <img src="{{ asset('images/cupones.png') }}" alt=""
                                                            class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="product-2" role="tabpanel"
                                                    aria-labelledby="product-2-tab">
                                                    <div>
                                                        <img src="{{ asset('images/product/img-8.png') }}" alt=""
                                                            class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="product-3" role="tabpanel"
                                                    aria-labelledby="product-3-tab">
                                                    <div>
                                                        <img src="{{ asset('images/product/img-7.png') }}" alt=""
                                                            class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="product-4" role="tabpanel"
                                                    aria-labelledby="product-4-tab">
                                                    <div>
                                                        <img src="{{ asset('images/product/img-8.png') }}" alt=""
                                                            class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mt-4 mt-xl-3">
                                    <a href="javascript: void(0);" class="text-primary">Cupones</a>
                                    <h4 class="mt-1 mb-3">Nombre : {{ $coupon->name . ' (' . $coupon->id . ')' }} </h4>




                                    <h5 class="mb-4">Descuento : <b value="">{{ $coupon->discount }} %</b></h5>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div>
                                                <p class="text-muted" value=""><i
                                                        class="bx bxs-customize font-size-16 align-middle text-primary me-1"></i>
                                                    Cantidad de usos : {{ $coupon->count_uses }}</p>
                                                <p class="text-muted" value=""><i
                                                        class="bx bxs-dashboard font-size-16 align-middle text-primary me-1"></i>
                                                    Limite de usos : {{ $coupon->max_uses }} </p>
                                                <p class="text-muted" value=""><i
                                                        class="bx bx-euro font-size-16 align-middle text-primary me-1"></i>
                                                    Precio Minimo : $ {{ $coupon->min_amount }}</p>
                                                <p class="text-muted" value=""><i
                                                        class="bx bxs-dashboard font-size-16 align-middle text-primary me-1"></i>
                                                    Codigo : {{ $coupon->code }} </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Cupón</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="modal-body text-center p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" fill="currentColor"
                        class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z" />
                    </svg>
                    <div class="mt-4">
                        <h4 class="mb-3">Estás por eliminar una cupón</h4>
                        <p class="text-muted mb-4">¿Estás seguro de eliminar este cupón?</p>

                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <form action="{{ route('coupons.destroy', $coupon) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="hstack gap-2 justify-content-center">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>

                        <button type="submit" class="btn btn-danger">Delete</button>

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

<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <form action="{{ route('coupons.update', $coupon->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cupón</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label for="count_uses" class="col-form-label col-lg-3">Usos</label>
                        <div class="col-lg-9">
                            <input type="number" name="count_uses" id="count_uses" class="inner form-control"
                                value="{{ $coupon->count_uses }}" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar cupón</button>
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
