﻿<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de información de atención ciudadana</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body class="" style="background-color: rgb(0,161,215);">
  

<div class="container body-content">
  
    <br />
    <br />
    <div class="row justify-content-md-center align-items-center">
        <div class="col-sm-4">
            <div class="card">

                <article class="card-body">
                    <h4 class="card-title text-center mb-4 mt-1">Sistema de información de Atención Ciudadana</h4>
                    <img src="logovic.png" class="" width="50%" style="display: block; margin-left: auto; margin-right: auto;">

                    <hr>
                    <p class="text-dark text-center">Ingrese su nombre de usuario y contraseña</p>
                    <form action="/acceder" method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="usuario" class="form-control" placeholder="Usuario" id="editNombre">
                            </div> <!-- input-group.// -->
                            <div class="input-group">
                                <span id="messageNombre" style="color:#D30000"></span>
    
                            </div>
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="contrasena" class="form-control" placeholder="******" type="password" id="editContrasena">
                            </div> <!-- input-group.// -->
                            <div class="input-group">
                                <span id="messageContrasena" style="color:#D30000"></span>
    
                            </div>
                        </div> <!-- form-group// -->
                        <div class="form-group">
                        @csrf
                            <input type="submit" class="btn btn-primary btn-block"/>
                        </div> <!-- form-group// -->
                    </form>
                </article>
            </div> <!-- card.// -->
        </div>
    </div>
    
    <script></script>
    

    <br />
    <hr />
    <footer>
        <p>&copy; Sistema de información de Atención Ciudadana</p>
    </footer>
</div>
  


</body>
</html>

