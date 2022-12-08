@extends('plantilla')


@section('title', 'Mostrar Materia Prima')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Detalles</h4>
                @include('layouts.alert')

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="product-detai-imgs">
                                <div class="row">

                                    <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="product-1" role="tabpanel"
                                                aria-labelledby="product-1-tab">
                                                <div>
                                                    <img src="/img/covers/{{ $prime->cover }}" alt=""
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

                                <h4 class="mt-1 mb-3">Descripcion : {{ $prime->description }}</h4>
                                <a class="btn btn-danger text-light" data-bs-toggle="modal"
                                    data-bs-target="#modalEliminar">Eliminar materia</a>
                                <a class="btn btn-info text-light" data-bs-toggle="modal"
                                    data-bs-target="#modalEditar">Editar materia</a>
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h4 class="text-primary">Unidades: {{ $prime->stock }} </h4>

                                        </div>
                                    </div>

                                </div>

                                <h5 class="mb-4">Precio : <b>${{ $prime->amount }} USD</b></h5>
                                <h6 class="">Descripción:</h6>
                                <p class="text-muted mb-4">{{ $prime->description }}</p>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted"><i
                                                    class="bx bx-data font-size-16 align-middle text-primary me-1"></i> Peso
                                                :{{ $prime->weight_in_grams }} gr</p>
                                            <p class="text-muted"><i
                                                    class="bx bx-sort-down triangle font-size-16 align-middle text-primary me-1"></i>
                                                Cantidad Min : {{ $prime->stock_min }} </p>
                                            <p class="text-muted"><i
                                                    class="bx bx-sort-up font-size-16 align-middle text-primary me-1"></i>
                                                Cantidad Max : {{ $prime->stock_max }}</p>
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
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Materia Prima</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('primes.update', $prime->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="description" class="col-form-label col-lg-2">Descripción</label>
                            <div class="col-lg-10">
                                <input type="text" name="description" id="description" class="form-control"
                                    value="{{ $prime->description }}" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="weight_in_grams" class="col-form-label col-lg-2">Precio</label>
                            <div class="col-lg-10">
                                <input type="text" name="amount" id="amount" class="form-control"
                                    value="{{ $prime->amount }}" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="stock" class="col-form-label col-lg-2">Unidades</label>
                            <div class="col-lg-10">
                                <input type="text" name="stock" id="stock" class="form-control"
                                    value="{{ $prime->stock }}" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="stock_min" class="col-form-label col-lg-2">Unidades minimas</label>
                            <div class="col-lg-10">
                                <input type="text" name="stock_min" id="stock_min" class="form-control"
                                    value="{{ $prime->stock_min }}" />
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="stock_min" class="col-form-label col-lg-2">Unidades maximas</label>
                            <div class="col-lg-10">
                                <input type="text" name="stock_max" id="stock_max" class="form-control"
                                    value="{{ $prime->stock_max }}" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="weight_in_grams" class="col-form-label col-lg-2">Peso (gr)</label>
                            <div class="col-lg-10">
                                <input type="text" name="weight_in_grams" id="weight_in_grams" class="form-control"
                                    value="{{ $prime->weight_in_grams }}" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="cover" class="col-form-label col-lg-2">Imagen</label>
                            <div class="col-lg-10">
                                <input type="file" name="cover" id="cover" class="form-control" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar materia prima</button>
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

    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Materia Prima</h1>
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
                            <h4 class="mb-3">Estás por eliminar un materia prima</h4>
                            <p class="text-muted mb-4">¿Estás seguro de eliminar este materia prima?</p>

                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-center">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                        <form action="{{ route('primes.destroy', $prime) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                <div>
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="delete">Eliminar materia prima</button>
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
@endsection
