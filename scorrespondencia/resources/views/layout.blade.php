<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@ViewBag.Title - Sistema de atención ciudadana</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="~/Content/font-awesome-4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(99,100,102)">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand">
                <img src="~/Content/img/logovic.png" height="40" />
            </a>
            <a class="navbar-brand">
                Sistema de atención ciudadana
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action("Index","Solicitudes")">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action("Create","Solicitudes")">Registrar solicitud</a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action("Index","PanelDirector")">Inicio</a>
                        </li>
                    

                    <li class="nav-item">
                            <a class="nav-link" href="#">Ingresar persona</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ingresar usuario</a>
                        </li>

                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>

                </ul>


                <ul class="nav navbar-nav navbar-right">
                    
                        <li class="nav-item dropdown">
                            <span id="cantidad_n" class="badge badge-pill badge-primary" style="float:left;margin-bottom:-10px;"></span> <!-- your badge -->

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Notificaciones
                            </a>
                            <div class="dropdown-menu" style="min-width:400px !important;" aria-labelledby="navbarDropdown" id="notificaciones_lista">
                            </div>
                        </li>
                    

                    <li class="nav-item">
                        <a class="nav-link" href="#!" onclick="cerrarSesionFunc()">Cerrar sesión (@Session["Usuario"])</a>
                    </li>
                    <li class="nav-item">
                        <a>
                            <img src="~/Content/img/logotam.png" height="40" />
                        </a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
            </div>
        </nav>
    }

    <div class="container body-content" width="160%">
        <br />
        <br />
        <br />

        <br />
        <hr />
        <footer>
            <p> - Sistema de atención ciudadana</p>
        </footer>
    </div>



</body>

<div class="modal fade" id="modalCerrarSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cerrar sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>¿Esta seguro de cerrar sesión?</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="@Url.Action("Logoff","Access",null)" class="btn btn-success">Aceptar</a>
            </div>
        </div>
    </div>
</div>
</html>



<script type="text/javascript">
    function cerrarSesionFunc() {
        $('#modalCerrarSesion').modal('show');
    }

</script>