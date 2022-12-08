@extends('plantilla')


@section('title', 'Mostrar Marcas')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mt-5 overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">{{ $category->name }}</h5>
                                </div>
                                @include('layouts.alert')
                                <a class="btn btn-danger text-light" data-bs-toggle="modal"
                                    data-bs-target="#modalEliminar">Eliminar categoria</a>
                                <a class="btn btn-info text-light" data-bs-toggle="modal"
                                    data-bs-target="#modalEditar">Editar categoria</a>
                            </div>
                            <div class="col-5 align-self-end">

                                <img src="{{ asset('images/profile-img.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-12">Información</h4>


                        <div class="table-responsive">
                            <p>
                                {{ $category->description }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end card -->
                <div class="row">
                    @foreach ($category->products as $product)
                        <div class="col-xl-4 col-sm-6">

                            <div class="card">
                                <div class="card-body">
                                    <div class="product-img position-relative">

                                        <img src="/img/covers/{{ $product->cover }}" alt=""
                                            class="img-fluid mx-auto d-block">
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h5 class="mb-3 text-truncate"><a href="javascript: void(0);"
                                                class="text-dark">{{ $product->name }}</a></h5>
                                        <div class="hstack flex-wrap justify-content-center gap-2 mb-3 mb-lg-0">

                                            <a type="button" class="btn btn-info"
                                                href="{{ route('products.show', $product->id) }}">Vista de Detalle</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                {{-- <div class="row">
                    @if ($products->isNotEmpty())
                        @foreach ($products as $product)
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img position-relative">

                                            <img src="/img/covers/{{ $product->cover }}" style="width:150px; height:150px;"
                                                alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                        <div class="mt-4 text-center">
                                            <h5 class="mb-3 text-truncate"><a href="javascript: void(0);"
                                                    class="text-dark">{{ $product->name }}</a></h5>
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver
                                                Detalles</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4 class="card-head">Sin productos</h4>
                    @endif
                </div> --}}

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" novalidate>
                        @method('PUT')
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="name" class="col-form-label col-lg-2">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" name="name" id="name"
                                    class="form-control  @error('name') is-invalid @enderror"
                                    value="{{ $category->name }}" />
                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong> {{ $message }} </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="description" class="col-form-label col-lg-2">Descripción</label>
                            <div class="col-lg-10">
                                <input type="text" name="description" id="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    value="{{ $category->description }}" />
                                @error('description')
                                    <span class="invalid-feedback">
                                        <strong> {{ $message }} </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Categoria</h1>
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
                            <h4 class="mb-3">Estás por eliminar una categoria</h4>
                            <p class="text-muted mb-4">¿Estás seguro de eliminar esta categoria?</p>

                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-center">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                <div>
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="delete">Eliminar categoria</button>
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
