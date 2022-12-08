@extends('plantilla')


@section('title', 'Index Materia Prima')

@section('content')

    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Materia Prima</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a>Index</a></li>
                            <li class="breadcrumb-item active">Maeria Prima</li>
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

                        <h4 class="card-title">Materias Prima</h4>

                        <p class="card-title-desc"></p>
                        @if ($primes->isNotEmpty())
                        <div class="table  mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                    <tr>

                                        <th data-priority="1">Foto</th>
                                        <th data-priority="2">Descripción</th>
                                        <th data-priority="3">Unidades mínimas</th>
                                        <th data-priority="4">Unidades máximas</th>
                                        <th data-priority="5">Action</th>

                                </thead>
                                <tbody>
                                    @foreach ($primes as $prime)
                                        <tr>
                                            <th>
                                                <img src="/img/covers/{{ $prime->cover }}" alt="..." width="100"
                                                    height="100" class="img-thumbnail">
                                            </th>
                                            <td>{{$prime->description}}</td>
                                            <td>{{$prime->stock_min}}</td>
                                            <td>{{$prime->stock_max}}</td>
                                            <td>

                                                <a href="{{ route('primes.show',$prime) }}" class="btn btn-primary">Ver Detalles</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <h4 class="card-title">Sin materias primas</h4>
                        @endif
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    </div>
@endsection
