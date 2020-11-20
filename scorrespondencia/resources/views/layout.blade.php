<!doctype html>
<html lang="en">
<?php
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Sistema de Correspondencía</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<link href="./main.css" rel="stylesheet"></head>
<body>
<div id="app">
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header bg-light header-shadow header-text-dark">
            <div class="app-header__logo">
                <div style="margin: 25%;"><img src="logovic.png"  width="90px"></div>                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    
                    <ul class="header-menu nav">
                        @if(session('data')[0]->nombre_rol=='Capturista')
                        <li class="btn-group nav-item">
                            <a href="peticionesfv" class="nav-link">
                                <i class="nav-link-icon fa fa-edit"></i>
                                Realizar Reporte
                            </a>
                        </li>
                        @endif
                    </ul>        </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <li class="btn-group nav-item">
                                    <a href="logout" class="nav-link">
                                        <i class="nav-link-icon fa fa-logout"></i>
                                        Cerrar sesión
                                    </a>
                                </li>
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src={{session('data')[0]->ruta_foto}} alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <h6 tabindex="-1" class="dropdown-header">Cuenta</h6>
                                            <button type="button" tabindex="0" class="dropdown-item">Cerrar Sesion</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{session('data')[0]->nombre_persona}} {{session('data')[0]->apellido_p}} {{session('data')[0]->apellido_m}} 
                                    </div>
                                    <div class="widget-subheading">
                                        {{session('data')[0]->nombre_rol}}
                                    </div>
                                </div>
                                <div class="col-md-2"><img src="logotam.png" width="90px"></div>

                            </div>
                        </div>
                    </div>        </div>
            </div>
        </div>                
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">

                                @if(session('data')[0]->nombre_rol == "Administrador")
                                <li class="app-sidebar__heading">Administrador</li>
                                <li>
                                    <a href="index">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Inicio
                                    </a>
                                    <a href="usuariosv">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                        Usuarios
                                    </a>
                                    <a href="direccionesv">
                                        <i class="metismenu-icon pe-7s-culture"></i>
                                        Direcciones
                                    </a>
                                </li>

                                @elseif(session('data')[0]->nombre_rol == "Director")
                                <li class="app-sidebar__heading">Director</li>
                                <li>
                                    <a href="index">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Inicio
                                    </a>
                                    <a href="peticionesv">
                                        <i class="metismenu-icon pe-7s-mail-open-file"></i>
                                        Peticiones
                                    </a>           
                                </li>

                                @elseif(session('data')[0]->nombre_rol == 'Capturista')
                                <li class="app-sidebar__heading">Capturista</li>
                                <li>
                                    <a href="index">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Inicio
                                    </a>
                                    <a href="peticionesv">
                                        <i class="metismenu-icon pe-7s-mail-open-file"></i>
                                        Peticiones
                                    </a>           
                                </li>

                                @elseif(session('data')[0]->nombre_rol == 'Presidente Municipal')
                                <li class="app-sidebar__heading">Presidente Municipal</li>
                                <li>
                                    <a href="index">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Inicio
                                    </a>
                                    <a href="peticionesv">
                                        <i class="metismenu-icon pe-7s-mail-open-file"></i>
                                        Peticiones
                                    </a>           
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>    
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        
                        @yield('contenido')
                                

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="loader-wrapper">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
<script src="{{ asset('/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>

<script>
    $(window).on("load",function(){
        setTimeout(activar, 1000);
        //Activar función
        function activar() {
            $('[data-toggle="tooltip"]').tooltip();
            $(".loader-wrapper").fadeOut();
        }
    });
</script>

</body>
</html>
