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
<servicios-component></servicios-component>
<direcciones-component></direcciones-component>
@endsection