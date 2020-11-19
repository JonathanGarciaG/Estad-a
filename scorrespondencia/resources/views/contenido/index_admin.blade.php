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
<div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Reportes Totales</div>
                    <div class="widget-subheading">Pendientes: 10</div>
                    <div class="widget-subheading">Finalizados: 41</div>
                    <div class="widget-subheading">Mis peticiones: 3</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>51</span></div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Resumen</h5>
                <canvas id="chart-area"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Notificaciones</h5>
                <table class="mb-0 table table-hover">
                    <thead>
                    <tr>
                        <th><i class="pe-7s-bell"></i></th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><button class="mb-2 mr-2 btn btn-link">Nueva Petición
                </button> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><button class="mb-2 mr-2 btn btn-link">Petición Finalizada
                </button> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><button class="mb-2 mr-2 btn btn-link">Nueva Anotación
                </button> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection