@extends('layout')
@section('contenido')
<!-- Pagina de administracion de usuarios y personas se llaman los componentes de personas y usuarios -->
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users">
                </i>
            </div>
            <div>Usuarios y Personas
                <div class="page-title-subheading">Página de Administración de Usuarios y Personas
                </div>
            </div>
        </div>
    </div>
</div>
<usuarios-component></usuarios-component>
<personas-component></personas-component>
<roles-component></roles-component>
@endsection