@extends('layout')
@section('contenido')
<!-- Pagina de Lista de peticiones se llama a el componente de peticiones -->
<?php

$usuario = session('data')[0];

?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-mail-open-file">
                </i>
            </div>
            <div>Peticiones
                <div class="page-title-subheading">Página de Seguimiento de peticiones y generación de acuses
                </div>
            </div>
        </div>
    </div>
</div> 

@if(session('data')[0]->nombre_rol=='Capturista' || session('data')[0]->nombre_rol=='Presidente Municipal')
<peticiones-component></peticiones-component>
@elseif(session('data')[0]->nombre_rol=='Director')
<peticionesdirector-component :id_direccion="{{ $usuario->id_direccion }}" :id_usuario="{{ $usuario->id }}"></peticionesdirector-component>
@endif

@endsection