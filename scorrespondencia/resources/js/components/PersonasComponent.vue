<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Personas registradas
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre</th>
                                    <th class="text-center">Cargo</th>
                                    <th class="text-center">Acciones</th> 
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="persona in personas" :key="persona.id">
                                    <td class="text-center text-muted">{{ persona.id }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img width="40" class="rounded-circle" v-bind:src="'.'+persona.ruta_foto" alt="">
                                                    </div>
                                                </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ persona.nombre }} {{ persona.apellido_p }} {{ persona.apellido_m }}</div>
                                                <div class="widget-subheading opacity-7">{{ persona.cargo }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ persona.cargo }}</td>
                                <td class="text-center">
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning" v-on:click="camposUpdate(persona)"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" v-on:click="mostrarModalDelete(persona)"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="d-block text-center card-footer">
                        <button class="btn-wide btn btn-success" data-toggle="modal" v-on:click="mostrarModal()">Nuevo</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal agregar nuevo -->
        <div class="modal fade" id="modalNew" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px; left: 100px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- al completar el form utiliza el metodo createNew() para agregar un nuevo registro -->
                    <form action="" v-on:submit.prevent="createNew()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Agregar Nueva Persona</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de newUser -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre de la persona</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Apellido Paterno:</label>
                                <div class="col-md-9">
                                    <input type="text" id="apellido_p" name="apellido_p" v-model="apellido_p" class="form-control" placeholder="Apellido Paterno" required>
                                    <span class="help-block">(*) Ingrese el Apellido Paterno de la persona</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Apellido Materno:</label>
                                <div class="col-md-9">
                                    <input type="text" id="apellido_m" name="apellido_m" v-model="apellido_m" class="form-control" placeholder="Apellido" required>
                                    <span class="help-block">(*) Ingrese el Apellido Materno de la persona</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Cargo:</label>
                                <div class="col-md-9">
                                    <input type="text" id="cargo" name="cargo" v-model="cargo" class="form-control" placeholder="Cargo" required>
                                    <span class="help-block">(*) Ingrese el cargo de la persona</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Foto:</label>
                                <div class="col-md-9">
                                    <input type="file" id="files" ref="files" @change="handleFilesUpload"/>
                                    </select>                                    
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar Persona</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>

        <!-- Modal editar -->
        <div class="modal fade" id="modalUpdate" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px; left: 100px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- al completar el form utiliza el metodo updateR() para modificar los registros obtenidos -->
                    <form action="" v-on:submit.prevent="updateR()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Editar Persona</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre de la persona</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Apellido Paterno:</label>
                                <div class="col-md-9">
                                    <input type="text" id="apellido_p" name="apellido_p" v-model="apellido_p" class="form-control" placeholder="Apellido Paterno" required>
                                    <span class="help-block">(*) Ingrese el Apellido Paterno de la persona</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Apellido Materno:</label>
                                <div class="col-md-9">
                                    <input type="text" id="apellido_m" name="apellido_m" v-model="apellido_m" class="form-control" placeholder="Apellido" required>
                                    <span class="help-block">(*) Ingrese el Apellido Materno de la persona</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Cargo:</label>
                                <div class="col-md-9">
                                    <input type="text" id="cargo" name="cargo" v-model="cargo" class="form-control" placeholder="Cargo" required>
                                    <span class="help-block">(*) Ingrese el cargo de la persona</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Foto:</label>
                                <div class="col-md-9">
                                    <input type="file" id="files" ref="files" @change="handleFilesUpload"/>                                   
                                </div>
                                <div class="col-md-6">
                                    <img width="40" v-bind:src="'.'+this.foto_old">                                    
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <!-- Fin Modal editar -->

        <!--Inicio del modal de Información-->
        <div class="modal fade" id="modalDelete"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
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
                foto_old:"",
                update:0,
                id_borrar:0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //actualiza los datos
            let me = this;
            let url = './personas' //el url devuelve los registros de la tabla personas
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.personas = response.data;
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
