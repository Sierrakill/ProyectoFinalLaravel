@extends('plantilla')


@section('title', 'Index Categorías')

@section('content')

    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Index Categorías</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a>Index</a></li>
                            <li class="breadcrumb-item active">Categorías</li>
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

                        <h4 class="card-title">Categorías</h4>
                        @include('layouts.alert')
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAñadir">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            Añadir nueva categoría</a>
                        <p class="card-title-desc"></p>

                        <div class="table-rep-plugin bg-success">
                            <div class="table mb-0" data-pattern="priority-columns">
                                @if ($categories->isNotEmpty())
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th class="text-white" data-priority="1">ID</th>
                                                <th class="text-white" data-priority="2">Nombre</th>

                                                <th class="text-white" data-priority="3">Descripción</th>
                                                <th class="text-white" data-priority="4">Action</th>

                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <th scope="row">{{ $category->id }}</th>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->description }}</td>
                                                    <td>
                                                        <a href="{{ route('categories.show', $category->id) }}"
                                                            class="btn btn-info">Details</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h4 class="card-title">Sin categorias</h4>
                                @endif
                            </div>

                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Categoría</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('categories.store') }}" method="POST" novalidate>
                                            @csrf
                                            <div class="form-group row mb-4">

                                                <label for="name" class="col-form-label col-lg-2">Nombre</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="name" id="name"
                                                        class="form-control @error('name') is-invalid @enderror "
                                                        value="{{ old('name') }}" />
                                                    @error('name')
                                                        <span class="invalid-feedback">
                                                            <strong> {{ $message }} </strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="taskdescripción"
                                                    class="col-form-label col-lg-2">Descripción</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="description" id="description"
                                                        class="form-control @error('description') is-invalid @enderror"
                                                        value="{{ old('description') }}" />
                                                    @error('description')
                                                        <span class="invalid-feedback">
                                                            <strong> {{ $message }} </strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Añadir marca</button>
                                            </div>
                                            
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

        </div> <!-- end row -->

    </div> <!-- container-fluid -->
    {{ $categories->links() }}

@endsection
