@extends('layout')
@section('contenido')
<!-- Pagina de Lista de peticiones se llama a el componente de peticiones -->
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-mail-open-file">
                                        </i>
                                    </div>
                                    <div>Reportes
                                        <div class="page-title-subheading">Página de Seguimiento de peticiones y reportes
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            

<peticiones-component></peticiones-component>

@endsection