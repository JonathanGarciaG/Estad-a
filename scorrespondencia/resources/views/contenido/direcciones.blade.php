@extends('layout')
@section('contenido')
<!-- Pagina de administracion de direcciones y servicios se llaman los componentes de personas y usuarios -->
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-culture">
                </i>
            </div>
            <div>Direcciones
                <div class="page-title-subheading">Página de Administración de Direcciones y Departamentos
                </div>
            </div>
        </div>
    </div>
</div>            

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Usuarios Activos
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nombre</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Categoría</th>
                        <th class="text-center">Acciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center text-muted">#345</td>
                        <td class="text-center">Departamento de Innovación y Modernización Tecnológica</td>
                        <td class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</td>
                        <td class="text-center">Departamento</td>
                        <td class="text-center">
                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-muted">#347</td>
                        <td class="text-center">Dirección de Atención Ciudadana</td>
                        <td class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</td>
                        <td class="text-center">Dirección</td>
                        <td class="text-center">
                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-muted">#349</td>
                        <td class="text-center">Dirección de Transito</td>
                        <td class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</td>
                        <td class="text-center">Dirección</td>
                        <td class="text-center">
                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <button class="btn-wide btn btn-success">Nuevo</button>
            </div>
        </div>
    </div>
</div>
@endsection