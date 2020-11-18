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
                                    <td class="text-center text-muted">{{ peticion.id }}-{{ peticion.created_at}}</td>
                                    <td class="text-center">{{ peticion.s_descripcion }}</td>
                                    <td class="text-center">{{peticion.prioridad}}</td>
                                    <td class="text-center">{{peticion.created_at}}</td>
                                    <td class="text-center">
                                        <div v-if="peticion.estado==2" class="badge badge-success">Finalizado</div>
                                        <div v-else class="badge badge-info">En proceso</div>
                                    </td>
                                    <td class="text-center">
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning" v-on:click="camposUpdate(peticion)"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning" v-on:click="mostrarModal(peticion)"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-success" v-on:click="mostrarModalDelete(peticion)"><i class="pe-7s-note btn-icon-wrapper"> </i></button>
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
                <!-- al completar el form utiliza el metodo onClickDelete() para eliminar los datos de los productos -->
                <form action="" v-on:submit.prevent="UpdateR()" enctype="multipart/form-data" class="form-horizontal">


                    <div class="modal-header">
                        <h5 class="modal-title"  id="exampleModalLongTitle">Datos de Petición</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <ul class="list-group">
                            <button class="active list-group-item-action list-group-item">Petición</button>
                            <button class="list-group-item-action list-group-item">Nombre del Solicitante</button>
                            <button class="list-group-item-action list-group-item">Telefono del solicitante</button>
                            <button class="list-group-item-action list-group-item">Fecha</button>
                            <button class="list-group-item-action list-group-item">Estado</button>
                            <button class="list-group-item-action list-group-item">Ultima fecha de modificación de Estado</button>
                            <button class="list-group-item-action list-group-item">Ultima justificación de modificación de estado</button>
                            <button class="list-group-item-action list-group-item">Descripción de solicitud</button>
                            <button class="list-group-item-action list-group-item">Servicio asignado</button>
                            <button class="list-group-item-action list-group-item">Prioridad de la solicitud</button>
                            <button class="list-group-item-action list-group-item">Colonia</button>
                            <button class="list-group-item-action list-group-item">Calle</button>
                            <button class="list-group-item-action list-group-item">Entre calles</button>
                            <button class="list-group-item-action list-group-item">Referencias</button>
                        </ul>

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
                                <textarea type="text" id="descripcion" name="descripcion" v-model="descripcion"></textarea>
                            </div>
                        </div>

                        <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Adjuntar documento</label>
                            <div class="col-sm-10"><input name="ruta_archivo" id="ruta_archivo" v-on:change="handleFiles()" type="file" class="form-control-file" accept="application/pdf,.jpg">
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

        <!--Inicio del modal de mostrar historial de estados -->
        <div class="modal fade" id="modalInfo"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- al completar el form utiliza el metodo onClickDelete() para eliminar los datos de los productos -->
                <form action="" enctype="multipart/form-data" class="form-horizontal">


                    <div class="modal-header">
                        <h5 class="modal-title"  id="exampleModalLongTitle">Eliminar Persona</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h5>¿Está seguro que desea eliminar el registro de persona?</h5>

                        <!-- Se utiliza un input oculto para tomar el id del producto que se va a borrar -->
                        <div class="form-group row">
                        <div class="col-md-9">
                            <input type="hidden" id="id_borrar" name="id_borrar" v-model="id_borrar" class="form-control" placeholder="idborrar" required>
                        </div>
                    </div>

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

        <!--Inicio del modal de Historial-->
        <div class="modal fade" id="modalHistorial"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- al completar el form utiliza el metodo onClickDelete() para eliminar los datos de los productos -->
                <form action="" v-on:submit.prevent="onClickDelete()" enctype="multipart/form-data" class="form-horizontal">


                    <div class="modal-header">
                        <h5 class="modal-title"  id="exampleModalLongTitle">Eliminar Persona</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h5>¿Está seguro que desea eliminar el registro de persona?</h5>

                        <!-- Se utiliza un input oculto para tomar el id del producto que se va a borrar -->
                        <div class="form-group row">
                        <div class="col-md-9">
                            <input type="hidden" id="id_borrar" name="id_borrar" v-model="id_borrar" class="form-control" placeholder="idborrar" required>
                        </div>
                    </div>

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
                nombre:"", 
                apellido_p:"",  
                apellido_m:"",
                cargo:"",
                ruta:"", 
                id: 0,
                personas:[],
                peticiones:[],
                estados:[],
                foto_old:"",
                update:0,
                id_borrar:0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //actualiza los datos
            let me = this;
            let url = './solicitudes' //el url devuelve los registros de la tabla personas
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
            mostrarModal() {
                //Se limpian los campos del modal
                this.nombre = '';
                this.apellido_p = '';
                this.apellido_m = '';
                this.cargo = '';
                this.ruta = '';
                $('#modalNew').modal('show');
            },
            //Metodo para rellenar los campos del formulario y mostrar modal al momento de seleccionar un usuario.
            camposUpdate(data){
                $('#modalUpdate').modal('show');
                this.update = data.id;
                let me = this;
                let url = './personas/'+this.update;
                axios.get(url).then(function (response){
                    me.nombre = response.data.nombre;
                    me.apellido_p = response.data.apellido_p;
                    me.apellido_m = response.data.apellido_m;
                    me.cargo = response.data.cargo;
                    me.foto_old = response.data.ruta_foto;
                }).catch(function (error){
                    console.log(error);
                });
            },
            //mostrar modal eliminar
            mostrarModalDelete(data) {
                this.id_borrar = data.id;
                $('#modalDelete').modal('show');               
            },
            //Metodo para agregar un nuevo usuario
            createNew() {
                //se toman los parametros de los campos
                const params = {
                    nombre: this.nombre,
                    apellido_p: this.apellido_p,
                    apellido_m: this.apellido_m,
                    cargo: this.cargo,
                    ruta: this.ruta
                };

                let me = this;

                let formData = new FormData();
                formData.append('nombre', this.nombre);
                formData.append('apellido_p', this.apellido_p);
                formData.append('apellido_m', this.apellido_m);
                formData.append('cargo', this.cargo);
                formData.append('ruta', this.ruta);
                
                //Petición post para hacer un nuevo registro.
                axios.post('./personas', formData,{
                     headers: {
                    'Content-Type': 'multipart/form-data'
                    }
                }).then(function (response){
                    console.log(response);
                    //Actualizando la lista de productos.
                    me.reloadData();
                    swal("Exito!", "Se ha registrado una nueva persona!", "success");
                })
                .catch(function (error){
                    console.log(error);
                });

                //Se limpian los campos del modal
                this.nombre = '';
                this.apellido_p = '';
                this.apellido_m = '';
                this.cargo = '';
                this.ruta = '';
            
                //Ocultar el modal
                $('#modalNew').modal('hide');
            },
            //Metodo para actualizar los datos del registro.
            updateR(){
                /*let formData = new FormData();
                formData.append('nombre', this.nombre);
                formData.append('apellido_p', this.apellido_p);
                formData.append('apellido_m', this.apellido_m);
                formData.append('cargo', this.cargo);
                formData.append('ruta_foto', this.ruta);*/

                let me = this;
                axios.put('./personas', {
                    'id' : this.update,
                    'nombre' : this.nombre,
                    'apellido_p' : this.apellido_p,
                    'apellido_m' : this.apellido_m,
                    'cargo' : this.cargo,
                    'ruta_foto' : this.ruta
                }).then(function (response){
                    swal("Persona modificada", "Se ha modificado la información de la persona", "info");
                    me.reloadData();
                }).catch(function (error){
                    console.log(error);
                });
                //Cerrando el modal después de actualizar el usuario.
                $('#modalUpdate').modal('hide');
                this.nombre = '';
                this.apellido_p = '';
                this.apellido_m = '';
                this.cargo = '';
                this.ruta = '';
            },
            //metodo para eliminar
            onClickDelete() {
                let me = this;
                axios.delete('./personas/'+this.id_borrar).then(() => {                    
                    me.reloadData();
                    swal("Persona eliminada", "Se ha eliminado la persona exitosamente", "info");
                });
                $('#modalDelete').modal('hide');
            },
            //actualizar registros
            reloadData(){
                let me = this;
                let url = './personas' //url que retorna los registros de la tabla empresas
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
