@extends('layout')
@section('contenido')
<!-- Pagina de administración de direcciones y servicios se llaman los componentes de personas y usuarios -->
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

<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Ingresa los datos</h5>
        <div class="row"><label for="examplePassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5"></div>
            <div class="col-sm-5" style="text-align: right;"> <label class="card-title">Folio: </label></div>
        </div>
       
        <form class="">
            <h5 class="card-title">Información del solicitante</h5>

            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10"><input name="email" id="exampleEmail" placeholder="Nombre" type="text" class="form-control"></div>
            </div>
            <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">Apellidos</label>
                <div class="col-sm-5"><input name="password" id="examplePassword" placeholder="Apellido Paterno" type="text" class="form-control"></div>
                <div class="col-sm-5"><input name="password" id="examplePassword" placeholder="Apellido Materno" type="text" class="form-control"></div>
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Teléfono y correo electrónico</label>
                    <div class="col-sm-5"><input type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Celular" class="form-control"></input></div>
                    <div class="col-sm-5"><input type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Fijo" class="form-control"></input></div>                                                    
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-5"><input type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Correo electrónico" class="form-control"></input></div>
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Domicilio</label>
                    <div class="col-sm-5"><input type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Código postal" class="form-control"></input></div>
                    <div class="col-sm-5"><select type="text" name="selectMulti" id="exampleSelectMulti" placeholder="N/A" class="form-control"></select></div>                                                    
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-5"><input type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Calle" class="form-control"></input></div>
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5"><input type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Entre Calle" class="form-control"></input></div>
                    <div class="col-sm-5"><input type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Y calle" class="form-control"></input></div>                                                    
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-5"><input type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Número exterior" class="form-control"></input></div>
            </div>
            <h5 class="card-title">Información de la solicitud</h5>

            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-10"><textarea name="text" id="exampleText" class="form-control" placeholder="Descripción de la Solicitud"></textarea></div>
            </div>
            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Adjuntar documento</label>
                <div class="col-sm-10"><input name="file" id="exampleFile" type="file" class="form-control-file" require>
                    <small class="form-text text-muted"></small>
                </div>
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Tipo de solicitud</label>
                <div class="col-sm-5"><select type="text" name="selectMulti" id="exampleSelectMulti" class="form-control">
                    <option value="1">Gestión</option>
                    <option value="2">Información</option>
                    <option value="3">Otro</option>
                </select></div>
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Área y servicio</label>
                    <div class="col-sm-5"><select type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Dirección" class="form-control"></select></div>
                    <div class="col-sm-5"><select type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Servicio" class="form-control"></select></div>                                  
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Prioridad de la Solicitud</label>
                <div class="col-sm-5"><select type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Calle" class="form-control"></select></div>
            </div>

            <h5>Ubicación</h5>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Calle</label>
                <div class="col-sm-10"><input type="text" placeholder="Calle" name="selectMulti" id="exampleSelectMulti" class="form-control"></input></div>
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Calles</label>
                <div class="col-sm-5"><input type="text" placeholder="Entre Calle" id="exampleSelectMulti" class="form-control"></input></div>
                <div class="col-sm-5"><input type="text" placeholder="Y Calle" name="selectMulti" id="exampleSelectMulti" class="form-control"></input></div>
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Numero Exterior</label>
                <div class="col-sm-5"><input type="text" placeholder="No. Exterior" id="exampleSelectMulti" class="form-control"></input></div>
            </div>
            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Referencias</label>
                <div class="col-sm-10"><textarea name="text" id="exampleText" class="form-control"></textarea></div>
            </div>
            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-12 col-form-label">
            
            </div>

            <h5 class="card-title">Información del beneficiario</h5>

            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">El solicitante es el beneficiario</label>
                <div class="col-sm-5"><input type="checkbox" name="selectMulti" id="exampleSelectMulti" class="form-control"></input></div>
            </div>
            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10"><input name="email" id="exampleEmail" placeholder="Nombre" type="text" class="form-control"></div>
            </div>
            <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">Apellidos</label>
                <div class="col-sm-5"><input name="password" id="examplePassword" placeholder="Apellido Paterno" type="text" class="form-control"></div>
                <div class="col-sm-5"><input name="password" id="examplePassword" placeholder="Apellido Materno" type="text" class="form-control"></div>
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Teléfono y correo electrónico</label>
                    <div class="col-sm-5"><input type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Celular" class="form-control"></input></div>
                    <div class="col-sm-5"><input type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Fijo" class="form-control"></input></div>                                                    
            </div>
            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-5"><input type="text" name="selectMulti" id="exampleSelectMulti" placeholder="Correo electrónico" class="form-control"></input></div>
            </div>
            
           
            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-5" style="text-align: right;"></div>
                <div class="col-sm-5" style="text-align: right;">
                    <button class="btn btn-secondary">Enviar</button>
                </div>
            </div>
                <div class="col-sm-10"><textarea hidden="" name="hidden" id="exampleText" class="form-control"></textarea></div>
            </div>
        </form>
    </div>
</div>
@endsection