<template>
    <div class="container">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Ingresa los datos</h5>
                <div class="row"><label for="examplePassword" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5"></div>
                    <div class="col-sm-5" style="text-align: right;"> <label class="card-title">Folio: </label></div>
                </div>
                
                <form v-on:submit.prevent="mostrarModal()" enctype="multipart/form-data" class="form-horizontal">

                
                    <h5 class="card-title">Información del solicitante</h5>
                    <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10"><input name="p_nombre" id="p_nombre" v-model="p_nombre" placeholder="Nombre" type="text" class="form-control"></div>
                    </div>
                    <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">Apellidos</label>
                        <div class="col-sm-5"><input name="p_apellido_p" id="p_apellido_p" v-model="p_apellido_p" placeholder="Apellido Paterno" type="text" class="form-control"></div>
                        <div class="col-sm-5"><input name="p_apellido_m" id="p_apellido_m" v-model="p_apellido_m" placeholder="Apellido Materno" type="text" class="form-control"></div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Teléfono y correo electrónico</label>
                            <div class="col-sm-5"><input type="text" name="p_celular" id="p_celular" v-model="p_celular" placeholder="Celular" class="form-control"></input></div>
                            <div class="col-sm-5"><input type="text" name="p_fijo" id="p_fijo" placeholder="Fijo" class="form-control"></input></div>                                                    
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5"><input type="email" name="p_correo" id="p_correo" v-model="p_correo" placeholder="Correo electrónico" class="form-control"></input></div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Domicilio</label>
                            <div class="col-sm-5"><input type="text" name="p_cp" id="p_cp" v-model="p_cp" placeholder="Código postal" class="form-control" readonly></input></div>
                            <div class="col-sm-5"><select type="text" name="p_id_colonia" id="p_id_colonia" v-model="p_id_colonia" placeholder="N/A" v-on:change="showCP1()" class="form-control">
                                <option
                                v-for="colonia in colonias"
                                :value="colonia.id"
                                :key="colonia.id">
                                {{ colonia.nombre }}
                                </option>
                            </select></div>                                                    
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5"><input type="text" name="p_calle_p" id="p_calle_p" v-model="p_calle_p" placeholder="Calle" class="form-control"></input></div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-5"><input type="text" name="p_calle_1" id="p_calle_1" v-model="p_calle_1" placeholder="Entre Calle" class="form-control"></input></div>
                            <div class="col-sm-5"><input type="text" name="p_calle_2" id="p_calle_2" v-model="p_calle_2" placeholder="Y calle" class="form-control"></input></div>                                                    
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5"><input type="text" name="p_numero_e" id="p_numero_e" v-model="p_numero_e" placeholder="Número exterior" class="form-control"></input></div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><textarea name="p_referencias" id="p_referencias" v-model="p_referencias" class="form-control" placeholder="Referencias"></textarea></div>
                    </div>

                    <h5 class="card-title">Información de la solicitud</h5>

                    <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Descripción*</label>
                        <div class="col-sm-10"><textarea name="s_descripcion" id="s_descripcion" v-model="s_descripcion" class="form-control" placeholder="Descripción de la Solicitud" required></textarea></div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Adjuntar documento</label>
                        <div class="col-sm-10"><input name="ruta_archivo" id="ruta_archivo" v-on:change="handleFiles()" type="file" class="form-control-file" accept="application/pdf,.jpg">
                            <small class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Tipo de solicitud*</label>
                        <div class="col-sm-5"><select type="text" name="s_tipo" id="s_tipo" v-model="s_tipo" class="form-control" required>
                            <option value="1">Gestión</option>
                            <option value="2">Información</option>
                            <option value="3">Otro</option>
                        </select></div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Área y servicio*</label>
                            <div class="col-sm-5"><select type="text" name="id_direccion" id="id_direccion" v-model="id_direccion" placeholder="Dirección" v-on:change="showService()" class="form-control" required>
                                <option selected>Area</option>
                                <option
                                v-for="direccion in direcciones"
                                :value="direccion.id"
                                :key="direccion.id">
                                {{ direccion.nombre }}
                                </option>
                            </select></div>
                            <div class="col-sm-5"><select type="text" name="s_id_servicio" id="s_id_servicio" v-model="s_id_servicio" placeholder="Servicio" class="form-control" required>
                                <option
                                v-for="servicio in servicios"
                                :value="servicio.id"
                                :key="servicio.id">
                                {{ servicio.nombre }}
                                </option>
                            </select></div>                                  
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Prioridad de la Solicitud*</label>
                        <div class="col-sm-5"><select type="text" name="s_id_prioridad" id="s_id_prioridad" v-model="s_id_prioridad" placeholder="Calle" class="form-control" required>
                            <option
                                v-for="prioridad in prioridades"
                                :value="prioridad.id"
                                :key="prioridad.id">
                                {{ prioridad.nombre }}
                            </option>
                        </select></div>
                    </div>

                    <h5>Ubicación</h5>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Colonia</label>
                            <div class="col-sm-5"><input type="text" name="s_cp" id="s_cp" v-model="s_cp" placeholder="Código postal" class="form-control" readonly></input></div>
                            <div class="col-sm-5"><select type="text" name="s_id_colonia" id="s_id_colonia" v-model="s_id_colonia" placeholder="N/A" v-on:change="showCP2()" class="form-control">
                                <option
                                v-for="colonia in colonias"
                                :value="colonia.id"
                                :key="colonia.id">
                                {{ colonia.nombre }}
                                </option>
                            </select></div>                                                    
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Calle</label>
                        <div class="col-sm-10"><input type="text" placeholder="Calle" name="s_calle_p" id="s_calle_p" v-model="s_calle_p" class="form-control"></input></div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5"><input type="text" placeholder="Entre Calle" name="s_calle_1" id="s_calle_1" v-model="s_calle_1" class="form-control"></input></div>
                        <div class="col-sm-5"><input type="text" placeholder="Y Calle" name="s_calle_2" id="s_calle_2" v-model="s_calle_2" class="form-control"></input></div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Numero Exterior</label>
                        <div class="col-sm-5"><input type="text" placeholder="No. Exterior" id="s_numero_e" name="s_numero_e" v-model="s_numero_e" class="form-control"></input></div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Referencias</label>
                        <div class="col-sm-10"><textarea name="s_referencias" id="s_referencias" v-model="s_referencias" placeholder="Referencias" class="form-control"></textarea></div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleText" class="col-sm-12 col-form-label"></label>
                    
                    </div>

                    <h5 class="card-title">Información del beneficiario</h5>

                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">El solicitante es el beneficiario</label>
                        <div class="col-sm-5"><input type="checkbox" name="selectMulti" v-on:change="blockB()" id="exampleSelectMulti" class="form-control"></input></div>
                    </div>
                    <div class="position-relative row form-group"><label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10"><input name="b_nombre" id="b_nombre" v-model="b_nombre"  placeholder="Nombre" :disabled="disabledinput" type="text" class="form-control"></div>
                    </div>
                    <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">Apellidos</label>
                        <div class="col-sm-5"><input name="b_apellido_p" id="b_apellido_p" v-model="b_apellido_p" placeholder="Apellido Paterno" :disabled="disabledinput" type="text" class="form-control"></div>
                        <div class="col-sm-5"><input name="b_apellido_m" id="b_apellido_m" v-model="b_apellido_m"  placeholder="Apellido Materno" :disabled="disabledinput" type="text" class="form-control"></div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Teléfono y correo electrónico</label>
                            <div class="col-sm-5"><input type="text" name="b_celular" id="b_celular" v-model="b_fijo"  placeholder="Celular" :disabled="disabledinput" class="form-control"></input></div>
                            <div class="col-sm-5"><input type="text" name="b_fijo" id="b_fijo" v-model="b_fijo" placeholder="Fijo" :disabled="disabledinput" class="form-control"></input></div>                                                    
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5"><input type="email" name="b_correo" id="b_correo" v-model="b_correo"  placeholder="Correo electrónico" :disabled="disabledinput" class="form-control"></input></div>
                    </div>
                       
                    <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5" style="text-align: right;">
                            <button class="btn btn-secondary">Enviar</button>
                        </div>
                    </div>
                    </form>

            </div>
        </div>

        <!--Inicio del modal de confirmación-->
        <div class="modal fade" id="modalNew" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- al completar el form utiliza el metodo createNew() para registrar la solicitud -->
                <form action="" v-on:submit.prevent="createNew()" enctype="multipart/form-data" class="form-horizontal">

                    <div class="modal-header">
                        <h5 class="modal-title"  id="exampleModalLongTitle">Confirmar registro de solicitud</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <h5>¿Está seguro de registrar la Información ingresada?</h5>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Si</button>
                    </div> 

                </form>

                </div>
            </div>
        </div>
        <!--Fin del modal-->

    </div>
</template>

<script>
    export default {
        data(){
            return{
                p_nombre : "",
                p_apellido_p : "",
                p_apellido_m : "",
                p_celular : "",
                p_fijo : "",
                p_correo : "",
                p_id_colonia : 0,
                p_calle_p : "",
                p_calle_1 : "",
                p_calle_2 : "",
                p_numero_e : "",
                p_referencias : "",
                s_descripcion : "",
                s_tipo : 1,
                s_id_servicio : 0,
                s_id_prioridad : 0,
                b_solicitante : 1,
                b_nombre : "",
                b_apellido_p : "",
                b_apellido_m : "",
                b_celular : "",
                b_fijo : "",
                b_correo : "",
                s_id_colonia : 0,
                s_calle_p : "",
                s_calle_1 : "",
                s_calle_2 : "",
                s_numero_e : "",
                s_referencias : "",
                p_cp : "",
                s_cp : "",
                id_persona: 0,
                id_direccion: 0,
                ruta_archivo: "",
                id: 0,
                servicios:[],
                direcciones:[],
                colonias:[],
                prioridades:[],
                update:0,
                id_borrar:0,
                disabledinput:false
            }
        },
        mounted() {
            console.log('Component mounted.')
            //actualiza los datos
            let me = this;
            let url = './direcciones' //el url devuelve los registros de la tabla direccions
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.direcciones = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
            url = './prioridades'
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.prioridades = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
            url = './colonias'
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.colonias = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        //metodos utilizados
        methods: {
            //metodo para mostrar modal
            mostrarModal() {
                $('#modalNew').modal('show');
            },
            //Metodo para agregar un nuevo registro
            createNew() {
                let me = this;
                //Se toman los datos que se ingresaron y se guardan en un formdata
                let formData = new FormData();
                formData.append('p_nombre', this.p_nombre);
                formData.append('p_apellido_p', this.p_apellido_p);
                formData.append('p_apellido_m', this.p_apellido_m);
                formData.append('p_celular', this.p_celular);
                formData.append('p_fijo', this.p_fijo);
                formData.append('p_correo', this.p_correo);
                formData.append('p_id_colonia', this.p_id_colonia);
                formData.append('p_calle_p', this.p_calle_p);
                formData.append('p_calle_1', this.p_calle_1);
                formData.append('p_calle_2', this.p_calle_2);
                formData.append('p_numero_e', this.p_numero_e);
                formData.append('p_referencias', this.p_referencias);
                formData.append('s_descripcion', this.s_descripcion);
                formData.append('s_tipo', this.s_tipo);
                formData.append('s_id_servicio', this.s_id_servicio);
                formData.append('s_id_prioridad', this.s_id_prioridad);
                formData.append('b_solicitante', this.b_solicitante);
                formData.append('b_nombre', this.b_nombre);
                formData.append('b_apellido_p', this.b_apellido_p);
                formData.append('b_apellido_m', this.b_apellido_m);
                formData.append('b_celular', this.b_celular);
                formData.append('b_fijo', this.b_fijo);
                formData.append('b_correo', this.b_correo);
                formData.append('s_id_colonia', this.s_id_colonia);
                formData.append('s_calle_p', this.s_calle_p);
                formData.append('s_calle_1', this.s_calle_1);
                formData.append('s_calle_2', this.s_calle_2);
                formData.append('s_numero_e', this.s_numero_e);
                
                //Petición post para hacer un nuevo registro.
                axios.post('./solicitudes', formData,{
                     headers: {
                    'Content-Type': 'multipart/form-data'
                    }
                }).then(function (response){
                    console.log(response);
                    let id_solicitud = response.data.id;
                    let id_usuario = 1; 

                    //Petición post para hacer un nuevo registro al historial de estados de peticion.
                    axios.post('./historiales', {
                        'descripcion' : "Recibido",
                        'id_estado' : 1,
                        'id_solicitud' : id_solicitud,
                        'id_usuario' : id_usuario
                    }).then(function (response){
                        console.log(response);
                        //Actualizando la lista de direcciones.
                        swal("Solicitud registrada", "Se ha registrado una nueva peticion", "success");
                        window.location.href = './peticionesv'
                    })
                    .catch(function (error){
                        console.log(error);
                    });
                })
                .catch(function (error){
                    console.log(error);
                });

                $('#modalNew').modal('hide');
            },
            handleFiles(){
                
            },
            blockB(){
                if(this.b_solicitante == 1){
                    this.b_solicitante = 2;
                    this.disabledinput = true;
                }else{
                    this.b_solicitante = 1;
                    this.disabledinput = false;
                }
            },
            showCP1(){
                //Muestra codigo postal
                let me = this;
                let url = './getcp/'+me.p_id_colonia //el url devuelve los registros de la tabla direccions
                axios.get(url).then(function (response) {
                    //se almacenan al array los datos de la respuesta obtenida del url
                    me.p_cp = response.data.codigo_postal;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            showCP2(){
                //Muestra codigo postal
                let me = this;
                let url = './getcp/'+me.s_id_colonia //el url devuelve los registros de la tabla direccions
                axios.get(url).then(function (response) {
                    //se almacenan al array los datos de la respuesta obtenida del url
                    me.s_cp = response.data.codigo_postal;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            showService(){
                //Muestra servicios del area
                let me = this;
                let url = './getservice/'+me.id_direccion //el url devuelve los registros de la tabla direccions
                axios.get(url).then(function (response) {
                    //se almacenan al array los datos de la respuesta obtenida del url
                    me.servicios = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>
