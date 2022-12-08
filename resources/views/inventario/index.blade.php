@extends('plantilla')


@section('title', 'Index Inventario')

@section('content')

    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Inventario</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a>Index</a></li>
                            <li class="breadcrumb-item active">Inventario</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Inventario</h4>
                        <p class="card-title-desc">Materia Prima</p>


                        <div class="table mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Foto</th>
                                        <th data-priority="2">ID producto</th>
                                        <th data-priority="3">Descripción</th>
                                        <th data-priority="4">Peso</th>
                                        <th data-priority="5">Cantidad</th>
                                        <th data-priority="6">Precio</th>
                                        <th data-priority="7">Cantidad mínima</th>
                                        <th data-priority="8">Cantidad máxima</th>


                                </thead>
                                <tbody>
                                    @foreach ($primes as $prime)
                                        <tr>
                                            <td>
                                                <a href="{{ route('primes.show', $prime) }}"><img
                                                        src="/img/covers/{{ $prime->cover }}" alt="..."
                                                        style="width: 100px;height: 100px;"></a>
                                            </td>
                                            <td>{{ $prime->id }}</td>
                                            <td>{{ $prime->description }}</td>
                                            <td>{{ $prime->weight_in_grams }} gramos</td>
                                            <td>{{ $prime->stock }}</td>
                                            <td>${{ $prime->amount }}</td>
                                            <td>{{ $prime->stock_min }}</td>
                                            <td>{{ $prime->stock_max }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="container">
            <a class="btn btn-primary" href="{{ route('prime.exportar') }}" download="Acme Documentation (ver. 2.0.1).txt">Descargar Excel</a>
            <form action="{{ route('prime.importar') }}" method="post" enctype="multipart/form-data" target="_blank">
                @csrf
                <p>
                    Sube un archivo de Excel:
                    <input type="file" name="archivosubido">
                    <input class="btn btn-primary" type="submit" value="Subir datos">
                </p>
            </form>
        </div>

    </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    </div>
@endsection
