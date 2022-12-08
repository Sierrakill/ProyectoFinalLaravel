@extends('plantillaLogin')

@section('title', 'Registrar usuario')


@section('content')

    <div class="account-pages pt-sm-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Registrate </h5>
                                        <p>Obten una cuenta DevStore ahora</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('images/profile-img.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="index.html">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('images/logo.svg') }}" alt="" class="rounded-circle"
                                                height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            @include('layouts.alert')
                            <div class="p-2">
                                <form action="{{ route('users.save') }}" method="post" enctype="multipart/form-data"
                                    novalidate>
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input id="name" name="name" type="text" class="inner form-control"
                                            placeholder="Ingresar nombre">
                                        <div class="invalid-feedback">
                                            Por favor, ingresar nombre
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Apellido</label>
                                        <input id="lastname" name="lastname" type="text" class="inner form-control"
                                            placeholder="Ingresar apellido">
                                        <div class="invalid-feedback">
                                            Por favor, ingresar apellido
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="rol" class="form-label">Rol</label>
                                        <div class="mb-3">

                                            <select name="rol" class="form-select" aria-label="Default select example">
                                                <option value="0">Gerente</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Usuario</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Teléfono</label>
                                        <input id="phone_number" name="phone_number" type="number" required
                                            class=" inner form-control" placeholder="Ingresar teléfono">
                                        <div class="invalid-feedback">
                                            Por favor, ingresar teléfono
                                        </div>
                                    </div>



                                    <div class="mb-3">
                                        <label for="email" class="form-label">Correo</label>
                                        <input id="email" name="email" type="email" class=" inner form-control"
                                            placeholder="Ingresar correo">
                                        <div class="invalid-feedback">
                                            Por favor, ingresar correo
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input id="password" name="password" type="password" class=" inner form-control"
                                            placeholder="Ingresar contraseña">
                                        <div class="invalid-feedback">
                                            Por favor, ingresar contraseña
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="avatar" class="col-form-label col-lg-2">Foto</label>
                                        <p>
                                            Sube una foto:
                                            <input type="file" name="avatar">
                                        </p>
                                    </div>

                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light"
                                            type="submit">Registrate</button>
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
                    <div class="pt-5 mt-5 text-center">

                        <div>
                            <p>Ya tienes una cuenta? <a href="{{ route('Auth.login') }}"
                                    class="fw-medium text-primary">Iniciar Sesión</a> </p>
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Creado by DevStore <i class="mdi mdi-heart text-danger"></i>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
