@extends('layout')
@section('contenido')
<!-- Pagina de Formulario de peticiones se llama al componente del Formulario de la peticion -->
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-mail-open-file">
                </i>
            </div>
            <div>Registrar una petición
                <div class="page-title-subheading">Página para realizar una petición
                </div>
            </div>
        </div>
    </div>
</div>            

<formpeticion-component></formpeticion-component>

@endsection