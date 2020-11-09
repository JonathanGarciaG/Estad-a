<SAC.Models.Lista_solicitudes>



<br />
<div class="p-3 mb-2 rounded bg-light">
    <h3>Solicitudes del área</h3>
</div>
<div class="row">
    <div class="col-lg-4">
        <h5><b><small>Inicio periodo:</small></b></h5>
        <input class="form-control" type="date" id="inicio">
    </div>
    <div class="col-lg-4">
        <h5><b><small>Fin periodo:</small></b></h5>
        <input class="form-control" type="date" id="fin">
    </div>
    <div class="col-lg-4">
        <h5><b><small>Estado solicitud:</small></b></h5>
        <select class="form-control" id="estado" name="estado">
            <option value="0">Todas</option>
            <option value="1">Recibidas</option>
            <option value="4">Atendidas</option>
            <option value="2">En proceso</option>
            <option value="3">Improcedente</option>
        </select>
    </div>
</div>
<div class="container-fluid">
    <br />
</div>

<table class=" table mb-0 table-bordered border-dark text-center">
    <thead class="table-sm align-content-center">
        <tr class="">
            <th scope="col" rowspan="2" style="vertical-align : middle;">Resumen de solicitudes registradas</th>
            <th scope="col" rowspan="2" style="vertical-align : middle;">Total</th>
            <th colspan="4">Estados solicitudes</th>
        </tr>
        <tr>
            <th style="background-color: #2B40C8CC;"></th>
            <th style="background-color: #31E416CC;"></th>
            <th style="background-color: #FFFD0BCC;"></th>
            <th style="background-color: #FF0000CC;"></th>
        </tr>

    </thead>
    <tbody>
        <tr>
            <th scope="row">Solicitudes</th>
            <td>ViewBag.total</td> <!--Total-->
            <td>ViewBag.recibidas</td><!--Indicador Azul-->
            <td>ViewBag.atendidas</td><!--Indicador verde-->
            <td>ViewBag.proceso</td><!--Indicador Amarillo-->
            <td>ViewBag.rechazadas</td><!--Indicador Rojo-->
        </tr>
    </tbody>
</table>
<div class="container-fluid">
    <br />
</div>
<table class="table table-bordered text-center" hidden id="tableSolicitudes">
    <thead class="align-content-center">
        <tr>
            <th scope="col">Folio</th>
            <th scope="col">Descripción</th>
            <th scope="col">Prioridad</th>
            <th scope="col">Fecha</th>
            <th scope="col">Servicio</th>
            <th scope="col">Estado</th>
            <th scope="col">Visto</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        
            <tr>
                <td width="10%">
                    item.folio
                </td>
                <td width="35%">
                    item.descripcion
                </td>
                <td width="6%">
                    item.prioridad
                </td>
                <td width="6%">
                    item.fecha
                </td>
                <td width="16%">
                    item.servicio
                </td>
                <td width="6%">
  
                        <span style="padding-top:10%;width:45px;height:45px;background-color:#2B40C8CC;border-radius:50%;display:inline-block"></span>

                        <span style="padding-top:10%;width:45px;height:45px;background-color:#31E416CC;border-radius:50%;display:inline-block"></span>

                        <span style="padding-top:10%;width:45px;height:45px;background-color:#FFFD0BCC;border-radius:50%;display:inline-block"></span>


                        <span style="padding-top:10%;width:45px;height:45px;background-color:#FF0000CC;border-radius:50%;display:inline-block"></span>

                </td>
                <td width="5%">
                    
                        <i class="fa fa-times fa-3x" aria-hidden="true"></i>
                    
                        <i class="fa fa-check fa-3x" aria-hidden="true"></i>
                    
                </td>
                <td width="20%">
                    
                        <a href="@Url.Action("ModificacionEstado", new { @id = item.folio})" class="btn btn-light">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    
                    <a href="@Url.Action("InformacionSolicitud", new { @id = item.folio})" class="btn btn-light">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                    </a>
                    <a href="@Url.Action("HistorialEstados", new { @id = item.folio})" class="btn btn-light">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        }

    </tbody>

</table>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script type="text/javascript">
    $('#inicio').val("@ViewBag.inicio");
    $('#fin').val("@ViewBag.fin");
    $('#estado').val("@ViewBag.estado");
    var url_e_1 = '@Url.Action("Index", "PanelDirector", new { @estado = "id", @inicio = "date1",  @fin = "date2" })';
    var url_e_2 = '@Url.Action("Index", "PanelDirector", new { @estado = "id"})';
</script>
<script src="~/Content/js/Index_panel_director.js"></script>