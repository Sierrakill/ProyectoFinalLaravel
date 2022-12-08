@extends('plantilla')


@section('title', 'Mostrar Productos')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ $product->name }}</h4>
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
                                                    <img src="/img/covers/{{ $product->cover }}"
                                                        style="width: 500px;height: 500px;" alt=""
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

                                <h4 class="mt-1 mb-3">Nombre : {{ $product->name }}</h4>


                                <h6 class="">Descripción:</h6>
                                <p class="text-muted mb-4">{{ $product->description }}</p>

                                @if ($product->categories->isNotEmpty())
                                    <h6 class="">Categorias:</h6>
                                    <ul>

                                        @foreach ($product->categories as $category)
                                            <li>
                                                <a
                                                    href="{{ route('categories.show', $category->id) }}"><span>{{ $category->name }}</span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                <h6 class="">Marca:</h6>
                                <ul>

                                    <li>
                                        <a
                                            href="{{ route('brands.show', $product->brand->id) }}"><span>{{ $product->brand->name }}</span></a>
                                    </li>

                                </ul>
                                @if ($product->primes->isNotEmpty())
                                    <div class="product-color">
                                        <h5 class="font-size-15">Presentaciones :</h5>
                                        @foreach ($product->primes as $prime)
                                            <a href="{{ route('primes.show', $prime->id) }}">
                                                <div class="product-color-item border rounded">
                                                    <img src="/img/covers/{{ $prime->cover }}"
                                                        style="width: 50px;height: 50px;" alt="" class="avatar-md">
                                                </div>
                                                <p>{{ $prime->description }}</p>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif


                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="d-flex">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu ">
                                        <li>
                                            <div class="row">
                                                <div>
                                                    <a class="btn btn-success text-light" data-bs-toggle="modal"
                                                        data-bs-target="#modalAñadir" title="Add precentations">Agregar
                                                        materia </a>

                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div>
                                                    <a class="btn btn-danger text-light" data-bs-toggle="modal"
                                                        data-bs-target="#modalEliminar">Eliminar producto</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div>
                                                    <a class="btn btn-info text-light" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditar">Editar producto</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mb-4">
                            <label for="taskname" class="col-form-label col-lg-2">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" name="name" id="name" class="inner form-control"
                                    value="{{ $product->name }}" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="taskdescripcion" class="col-form-label col-lg-2">Descripción</label>
                            <div class="col-lg-10">
                                <input type="text" name="description" id="description" class="inner form-control"
                                    value="{{ $product->description }}" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="cover" class="col-form-label col-lg-2">Imagen</label>
                            <div class="col-lg-10">
                                <input type="file" name="cover" id="cover" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="brand_id" class="col-form-label col-lg-2">Marca</label>
                            <div class="col-lg-10">
                                <div class="form-check">
                                    <select class="form-select" name="brand_id" id="">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Categories
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body row">
                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="category_id[]" value="{{ $category->id }}">
                                                        <label class="form-check-label text-dark">
                                                            {{ $category->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
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

    <!-- Modal -->
    <div class="modal fade" id="modalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Materia Prima</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('primes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="description" class="col-form-label col-lg-2">Descripción</label>
                            <div class="col-lg-10">
                                <<input type="text" name="description" id="description" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="weight_in_grams" class="col-form-label col-lg-2">Peso (gr)</label>
                            <div class="col-lg-10">
                                <input type="text" name="weight_in_grams" id="weight_in_grams"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="cover" class="col-form-label col-lg-2">Imagen</label>
                            <div class="col-lg-10">
                                <input type="file" name="cover" id="cover" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="amount" class="col-form-label col-lg-2">Cantidad</label>
                            <div class="col-lg-10">
                                <input type="text" name="amount" id="amount" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="stock" class="col-form-label col-lg-2">Stock</label>
                            <div class="col-lg-10">
                                <input type="text" name="stock" id="stock" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="stock_min" class="col-form-label col-lg-2">Cantidad Minima</label>
                            <div class="col-lg-10">
                                <input type="text" name="stock_min" id="stock_min" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="stock_max" class="col-form-label col-lg-2">Cantidad Maxima</label>
                            <div class="col-lg-10">
                                <input type="text" name="stock_max" id="stock_max" class="form-control" />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary">Añadir materia prima</button>
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
    <!-- Modal -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Producto</h1>
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
                            <h4 class="mb-3">Estás por eliminar un producto</h4>
                            <p class="text-muted mb-4">¿Estás seguro de eliminar este producto?</p>

                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-center">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                <div>
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="delete">Eliminar producto</button>
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
