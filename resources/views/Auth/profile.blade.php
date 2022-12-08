@extends('plantilla')


@section('title','Perfil')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h4 class="text-primary">Perfil</h4>

                            </div>
                        </div>
                        <div class="col-5 align-self-end">

                            <img src="{{asset('images/profile-img.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="/img/avatars/{{Auth::user()->avatar}}" alt="" class="img-thumbnail ">
                            </div>
                            <h5 class="font-size-20 text-truncate"> {{Auth::user()->name}}</h5>
                            <p class="text-muted mb-0 text-truncate"> Puesto :
                                @switch(Auth::user()->rol)
                                    @case(0)
                                        {{ 'Gerente' }}
                                        @break
                                    @case(1)
                                        {{ 'Administrador' }}
                                        @break
                                    @case(2)
                                        {{ 'Vendedor' }}
                                        @break
                                @endswitch
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-12">Información</h4>


                    <div class="table">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">ID:</th>
                                    <td>{{ Auth::user()->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nombre:</th>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Apellido:</th>
                                    <td>{{ Auth::user()->lastname }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Teléfono:</th>
                                    <td>{{ Auth::user()->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Correo:</th>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end card -->
</div>
@endsection
