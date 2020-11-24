<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Reportes
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">Folio</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Prioridad</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Opciones</th> 
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="peticion in peticiones" :key="peticion.id">
                                    <td class="text-center text-muted">{{ peticion.id }}-{{ new Date(peticion.created_at).getFullYear()}}</td>
                                    <td class="text-center">{{ peticion.s_descripcion }}</td>
                                    <td class="text-center">{{peticion.prioridad}}</td>
                                    <td class="text-center">{{peticion.created_at}}</td>
                                    <td class="text-center">
                                        <estado-component :peticion="peticion"></estado-component>
                                    </td>
                                    <td class="text-center">
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning" v-on:click="mostrarModal(peticion)"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-info" v-on:click="mostrarModalInfo(peticion)"><i class="pe-7s-look btn-icon-wrapper"> </i></button>
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-success" v-on:click="mostrarModalHistorial(peticion)"><i class="pe-7s-menu btn-icon-wrapper"> </i></button>
                                    </td>
                                </tr>              
                            </tbody>
                        </table>
                    </div>
                    <div class="d-block text-center card-footer">
                        <button class="btn-wide btn btn-success">Nuevo</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Inicio del modal de Editar estado-->
        <div class="modal fade" id="modalNew" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- al completar el form utiliza el metodo createNew() para agregar un nuevo registro en el Historial -->
                <form action="" v-on:submit.prevent="createNew()" enctype="multipart/form-data" class="form-horizontal">

                    <div class="modal-header">
                        <h5 class="modal-title"  id="exampleModalLongTitle">Información de la Petición</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <ul class="list-group">
                            <button class="active list-group-item-action list-group-item">Petición</button>
                            <button class="list-group-item-action list-group-item"><strong>Nombre del Solicitante:</strong> <center>{{ nombre }}</center></button>
                            <button class="list-group-item-action list-group-item"><strong>Telefono del solicitante:</strong> {{ telefono }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Fecha:</strong> {{ fecha }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Estado:</strong> {{ estado }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Ultima fecha de modificación de Estado:</strong> {{ ultimafecha }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Ultima justificación de modificación de estado:</strong> {{ ultimanota }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Descripción de solicitud:</strong> {{ descripcions }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Servicio asignado:</strong> {{ servicio }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Prioridad de la solicitud:</strong> {{ prioridad }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Colonia:</strong> {{ colonia }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Calle:</strong> {{ calle }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Entre calles:</strong> {{ entre }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Referencias:</strong> {{ referencias }}</button>
                        </ul>

                        <hr>

                        <h5>Información para cambio de estado</h5>

                        <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Estado:</label>
                            <div class="col-sm-5"><select type="text" name="id_estado" id="id_estado" v-model="id_estado" placeholder="Estado" class="form-control" required>
                                <option
                                    v-for="estado in estados"
                                    :value="estado.id"
                                    :key="estado.id">
                                    {{ estado.nombre }}
                                </option>
                            </select></div>
                        </div>

                        <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Justificación del cambio de estado:</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" type="text" id="descripcion" name="descripcion" v-model="descripcion" required></textarea>
                            </div>
                        </div>

                        <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Adjuntar documento</label>
                            <div class="col-sm-10"><input name="ruta_archivo" id="ruta_archivo" v-on:change="handleFilesUpload()" type="file" class="form-control-file" accept="application/pdf,.jpg">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>

                    </div>
 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
                </form>

                </div>

            </div>
        </div>
        <!--Fin del modal-->

        <!--Inicio del modal de Informacion-->
        <div class="modal fade" id="modalInfo" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form action="" enctype="multipart/form-data" class="form-horizontal">

                    <div class="modal-header">
                        <h5 class="modal-title"  id="exampleModalLongTitle">Historial de estados</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <ul class="list-group">
                            <button class="active list-group-item-action list-group-item">Petición</button>
                            <button class="list-group-item-action list-group-item"><strong>Nombre del Solicitante:</strong> <center>{{ nombre }}</center></button>
                            <button class="list-group-item-action list-group-item"><strong>Telefono del solicitante:</strong> {{ telefono }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Fecha:</strong> {{ fecha }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Estado:</strong> {{ estado }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Ultima fecha de modificación de Estado:</strong> {{ ultimafecha }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Ultima justificación de modificación de estado:</strong> {{ ultimanota }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Descripción de solicitud:</strong> {{ descripcions }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Servicio asignado:</strong> {{ servicio }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Prioridad de la solicitud:</strong> {{ prioridad }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Colonia:</strong> {{ colonia }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Calle:</strong> {{ calle }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Entre calles:</strong> {{ entre }}</button>
                            <button class="list-group-item-action list-group-item"><strong>Referencias:</strong> {{ referencias }}</button>
                        </ul>
                        
                    </div>
 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
                </form>

                </div>

            </div>
        </div>
        <!--Fin del modal-->

        <!--Inicio del modal de Informacion-->
        <div class="modal fade" id="modalHistorial" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title"  id="exampleModalLongTitle">Información de la Petición</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Opciones</th> 
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="historial in historiales" :key="historial.id">
                                        <td class="text-center text-muted">{{ historial.id }}</td>
                                        <td class="text-center">{{historial.descripcion }}</td>
                                        <td class="text-center">{{historial.estado}}</td>
                                        <td class="text-center">{{historial.fecha}}</td>
                                        <td class="text-center">
                                            <a :href="'./acuse/'+historial.id_solicitud" target="_blank"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-success"><i class="pe-7s-copy-file btn-icon-wrapper"> </i></button></a>
                                        </td>
                                    </tr>              
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>

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
                descripcion:"",
                ruta:"", 
                id: 0,
                personas:[],
                peticiones:[],
                estados:[],
                historiales:[],
                id_peticion:0,
                id_estado:0,
                nombre:'',
                telefono:'',
                fecha:"",
                estado:"",
                ultimafecha:"",
                ultimanota:"",
                descripcions:"",
                servicio:"",
                prioridad:"",
                colonia:"",
                calle:"",
                entre:"",
                referencias:"",
                id_solicitud:0,
                id_usuario:0,
                e_descripcion:"",
                id_usuario_a:0
            }
        },
        props: ['id_direccion'],
        mounted() {
            console.log('Component mounted.')
            //actualiza los datos
            let me = this;
            let url = './getusersession' //el url devuelve los registros de la tabla personas
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.id_usuario_a = response.data;
                console.log(me.id_usuario_a)
            })
            .catch(function (error) {
                console.log(error);
            });
            //console.log(id_usuario_a)
            url = './getsolicitudes/'+me.id_direccion //el url devuelve los registros de la tabla personas
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.peticiones = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });

            url = './estados' //el url devuelve los registros de la tabla estados
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.estados = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        //metodos utilizados
        methods: {
            //metodo para mostrar modal
            mostrarModal(data) {
                let me = this;
                this.descripcion = '';
                this.id_estado = 0;
                this.ruta = '';
                this.id_solicitud = data.id;
                //Se limpian los campos del modal
                let url = './peticioninfo/'+data.id;
                axios.get(url).then(function (response){
                    console.log(response.data);
                    me.nombre = response.data[0].p_nombre+" "+response.data[0].p_apellido_p+" "+response.data[0].p_apellido_m;
                    me.telefono = response.data[0].p_celular;
                    me.fecha = response.data[0].created_at;
                    me.estado = response.data[0].descripcion;
                    me.ultimafecha = response.data[0].ultima;
                    me.ultimanota = response.data[0].descripcion;
                    me.descripcions = response.data[0].s_descripcion;
                    me.servicio = response.data[0].servicio;
                    me.prioridad = response.data[0].prioridad;
                    me.colonia = response.data[0].colonia;
                    me.calle = response.data[0].s_calle_p;
                    me.entre = response.data[0].s_calle_1+" "+response.data[0].s_calle_2;
                    me.referencias = response.data[0].s_referencias;
                    $('#modalNew').modal('show');                    
                }).catch(function (error){
                    console.log(error);
                });
            },
            //Metodo para rellenar los campos del formulario y mostrar modal al momento de seleccionar un usuario.
            mostrarModalInfo(data){
                let me = this;
                this.descripcion = '';
                this.id_estado = 0;
                this.ruta = '';
                this.id_solicitud = data.id;
                //Se limpian los campos del modal
                let url = './peticioninfo/'+data.id;
                axios.get(url).then(function (response){
                    console.log(response.data);
                    me.nombre = response.data[0].p_nombre+" "+response.data[0].p_apellido_p+" "+response.data[0].p_apellido_m;
                    me.telefono = response.data[0].p_celular;
                    me.fecha = response.data[0].created_at;
                    me.estado = response.data[0].descripcion;
                    me.ultimafecha = response.data[0].ultima;
                    me.ultimanota = response.data[0].descripcion;
                    me.descripcions = response.data[0].s_descripcion;
                    me.servicio = response.data[0].servicio;
                    me.prioridad = response.data[0].prioridad;
                    me.colonia = response.data[0].colonia;
                    me.calle = response.data[0].s_calle_p;
                    me.entre = response.data[0].s_calle_1+" "+response.data[0].s_calle_2;
                    me.referencias = response.data[0].s_referencias;
                    $('#modalInfo').modal('show');                    
                }).catch(function (error){
                    console.log(error);
                });
            },
            //mostrar modal eliminar
            mostrarModalHistorial(data) {
                let me = this;
                let url = './gethistorial/'+data.id;
                axios.get(url).then(function (response){
                    me.historiales = response.data;
                    $('#modalHistorial').modal('show');                    
                }).catch(function (error){
                    console.log(error);
                });             
            },
            //Metodo para agregar un nuevo usuario
            createNew() {
                //se toman los parametros de los campos
                let me = this;
                this.id_usuario = me.id_usuario_a;

                let formData = new FormData();
                formData.append('descripcion', this.descripcion);
                formData.append('id_estado', this.id_estado);
                formData.append('id_solicitud', this.id_solicitud);
                formData.append('id_usuario', this.id_usuario);
                formData.append('ruta', this.ruta);
                
                //Petición post para hacer un nuevo registro.
                axios.post('./historiales', formData,{
                     headers: {
                    'Content-Type': 'multipart/form-data'
                    }
                }).then(function (response){
                    console.log(response);
                    //Actualizando la lista de productos.
                    me.reloadData();
                    swal("Exito", "Se ha añadido un nuevo estado en la petición", "success");
                })
                .catch(function (error){
                    console.log(error);
                });

                //Se limpian los campos del modal
                this.descripcion = '';
                this.id_estado = 0;
                this.ruta = '';
            
                //Ocultar el modal
                $('#modalNew').modal('hide');
            },
            mostrarDoc(data){
                let url = './acuse/'+data.id_solicitud;
                axios.get(url).then(function (response){
                                       
                }).catch(function (error){
                    console.log(error);
                });
            },
            //actualizar registros
            reloadData(){
                let me = this;
                let url = './solicitudes' //url que retorna los registros de la tabla empresas
                axios.get(url).then(function (response) {
                    me.personas = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            //metodo para tomar la imagen
            handleFilesUpload(e){
                let file = e.target.files[0];
                console.log(file);
                this.ruta = file;
                console.log(this.ruta);
            }
            
        }
    }
</script>
