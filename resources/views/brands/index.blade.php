@extends('plantilla')


@section('title', 'Index Marcas')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Marcas</h4>
                        @include('layouts.alert')
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAñadir">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            Añadir nueva marca</a>
                        <p class="card-title-desc"></p>
                        @if ($brands->isNotEmpty())
                            <div class="table-rep-plugin">
                                <div class="table mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">ID</th>
                                                <th data-priority="3">Nombre</th>
                                                <th data-priority="3">Descripcion</th>
                                                <th data-priority="3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($brands as $brand)
                                                <tr>
                                                    <th scope="row">{{ $brand->id }}</th>
                                                    <td>{{ $brand->name }}</td>
                                                    <td>{{ $brand->description }}</td>
                                                    <td>
                                                        <a href="{{ route('brands.show', $brand->id) }}"
                                                            class="btn btn-info">Details</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        @else
                            <h4 class="card-title">Sin marcas</h4>
                        @endif
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Marca</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('brands.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label for="name" class="col-form-label col-lg-2">Nombre</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="name" id="name"
                                                    class="inner form-control" value="{{ old('name') }}" />
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="description" class="col-form-label col-lg-2">Descripción</label>
                                            <div class="col-lg-10">
                                                <input id="descripcion" name="description" type="text"
                                                    class="inner form-control" placeholder="Ingresar apellido">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Añadir marca</button>
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
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    </div>
@endsection
