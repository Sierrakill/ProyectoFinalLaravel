@extends('plantilla')

@section('title', 'Index Productos')

@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Productos</h4>
                    @include('layouts.alert')
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a>Index</a></li>
                            <li class="breadcrumb-item active">Productos</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12">

                <div class="row mb-3">
                    <div class="col-xl-4 col-sm-6">
                        <div class="mt-2">
                            <h5>Productos</h5>

                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAñadir">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                                Añadir nuevo producto</a>
                        </div>
                    </div>

                </div>
                <div class="row">
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
                </div>


                <!-- Modal -->
                <div class="modal fade" id="modalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">

                                    <div class="row text-center">

                                        <div class="form-group row mb-4">
                                            <div class="col-lg-6  col-sm-12">
                                                <div class="form-outline text-start">
                                                    <label class="form-label" for="name"> name</label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        value="{{ old('name') }}" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6  col-sm-12">
                                                <div class="form-outline text-start">
                                                    <label class="form-label" for="lastname">description</label>
                                                    <input type="text" name="description" id="description"
                                                        class="form-control" value="{{ old('description') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-lg-6  col-sm-12">
                                                <div class="form-outline text-start">
                                                    <label class="form-label" for="name">cover</label>
                                                    <input type="file" name="cover" id="cover"
                                                        class="form-control" />
                                                </div>
                                            </div>


                                            <div class="col-lg-6  col-sm-12">
                                                <div class="form-outline text-start">
                                                    <label class="form-label" for="lastname">brand</label>
                                                    {{-- <input type="text" name="brand_id" id="brand_id" class="form-control" /> --}}
                                                    <select class="form-select" name="brand_id" id="">
                                                        @if ($brands->isNotEmpty())
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}">{{ $brand->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                                        Categories
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingOne"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body row">
                                                        @if ($categories->isNotEmpty())
                                                            @foreach ($categories as $category)
                                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="category_id[]"
                                                                            value="{{ $category->id }}">
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

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Añadir producto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>





                <div class="row">
                    <div class="col-lg-12">
                        <ul class="pagination pagination-rounded justify-content-center mt-3 mb-4 pb-1">
                            <li class="page-item disabled">
                                <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="javascript: void(0);" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">4</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">5</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link"><i
                                        class="mdi mdi-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end row -->








        </div>
    </div>
    <!-- end row -->
@endsection
