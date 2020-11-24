@extends('layout')
@section('contenido')
<!-- Pagina de dashboard de admin -->
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home">
                </i>
            </div>
            <div>Inicio
                <div class="page-title-subheading">Página de Inicio
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('data')[0]->nombre_rol=='Administrador')
<dashboardadmin-component></dashboardcapturista-component>
@else            
<dashboardcapturista-component></dashboardcapturista-component>
@endif
@endsection