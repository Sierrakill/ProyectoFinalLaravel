@extends('plantilla')

@section('title','Home')

 @section('content')

 <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Productos</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <div class="col-lg-12">

            <div class="row">
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
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end row -->

</div> <!-- container-fluid -->


@endsection
