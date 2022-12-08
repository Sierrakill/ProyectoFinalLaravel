@extends('plantilla')

@section('title','Editar | Cupon')

@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title mb-4">Editar Nuevo Cupon</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div data-repeater-list="outer-group" class="outer">
                            <div data-repeater-item class="outer">
                                <div class="form-group row mb-4">
                                    <label for="taskname" class="col-form-label col-lg-2">* Nombre</label>
                                    <div class="col-lg-10">
                                        <input id="taskname" name="taskname" type="text" class=" inner form-control" placeholder="Ingresar nombre">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="taskname" class="col-form-label col-lg-2">* Codigo</label>
                                    <div class="col-lg-10">
                                        <input id="taskcodigo" name="Description" type="text" class="inner form-control" placeholder="0000">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label for="taskname" class="col-form-label col-lg-2">* Descuento.</label>
                                    <div class="col-lg-10">
                                        <input id="taskdescuento" name="cantidadMin" type="text" class=" inner form-control" placeholder="Ingresar Descuento %.">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="taskname" class="col-form-label col-lg-2">* Cantidad de usos.</label>
                                    <div class="col-lg-10">
                                        <input id="taskcantidadUsos" name="cantidadMax" type="text" class=" inner form-control" placeholder="Ingresar Cantidad de usos.">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="taskname" class="col-form-label col-lg-2">* Usos Maximos</label>
                                    <div class="col-lg-10">
                                        <input id="taskusosMax" name="taskpeso" type="text" class=" inner form-control" placeholder="Ingresar Usos Max.">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="taskname" class="col-form-label col-lg-2">* Precio Min</label>
                                    <div class="col-lg-10">
                                        <input id="taskprecio" name="taskprecio" type="text" class=" inner form-control" placeholder="Ingresar precio">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Editar Cupon</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>


@endsection

