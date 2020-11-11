<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Direcciones registradas
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre de dirección</th>
                                    <th class="text-center">Persona a cargo</th>
                                    <th class="text-center">Acciones</th> 
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="direccion in direcciones" :key="direccion.id">
                                    <td class="text-center text-muted">{{ direccion.id }}</td>
                                    <td class="text-center text-muted">{{ direccion.nombre }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img width="40" class="rounded-circle" v-bind:src="'.'+direccion.ruta_foto" alt="">
                                                    </div>
                                                </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ direccion.nombre_persona }} {{ direccion.apellido_p }} {{ direccion.apellido_m }}</div>
                                                <div class="widget-subheading opacity-7">{{ direccion.cargo }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning" v-on:click="camposUpdate(direccion)"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" v-on:click="mostrarModalDelete(direccion)"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
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
                            <h5 class="modal-title"  id="exampleModalLongTitle">Agregar Nueva dirección</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de createNew -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de Dirección:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre de la dirección</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Persona a gargo:</label>
                                <div class="col-md-9">
                                    <select id="persona" name="persona" v-model="id_persona" class="form-control" placeholder="Persona" required>
                                        <option
                                          v-for="persona in personas"
                                          :value="persona.id"
                                          :key="persona.id"
                                        >
                                          {{ persona.nombre }} {{ persona.apellido_p }} {{persona.apellido_m}}
                                        </option>
                                    </select>
                                    <span class="help-block">(*) Seleccione la persona acargo de la dirección</span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar dirección</button>
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
                            <h5 class="modal-title"  id="exampleModalLongTitle">Editar direccion</h5>
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
                                    <span class="help-block">(*) Ingrese el Nombre de la direccion</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Persona a cargo:</label>
                                <div class="col-md-9">
                                    <select id="persona" name="persona" v-model="id_persona" class="form-control" placeholder="Persona" required>
                                        <option
                                          v-for="persona in personas"
                                          :value="persona.id"
                                          :key="persona.id"
                                        >
                                          {{ persona.nombre }} {{ persona.apellido_p }} {{persona.apellido_m}}
                                        </option>
                                    </select>
                                    <span class="help-block">(*) Seleccione la persona a cargo de la dirección</span>
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

        <!--Inicio del modal eliminar-->
        <div class="modal fade" id="modalDelete"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- al completar el form utiliza el metodo onClickDelete() para eliminar los datos de los productos -->
                <form action="" v-on:submit.prevent="onClickDelete()" enctype="multipart/form-data" class="form-horizontal">


                    <div class="modal-header">
                        <h5 class="modal-title"  id="exampleModalLongTitle">Eliminar dirección</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h5>¿Está seguro que desea eliminar el registro de la dirección?</h5>

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
                id_persona:0,
                id: 0,
                direcciones:[],
                personas:[],
                update:0,
                id_borrar:0
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
        },
        //metodos utilizados
        methods: {
            //metodo para mostrar modal
            mostrarModal() {
                //Se limpian los campos del modal
                this.nombre = '';
                this.id_persona = '';
                $('#modalNew').modal('show');
            },
            //Metodo para rellenar los campos del formulario y mostrar modal al momento de seleccionar un usuario.
            camposUpdate(data){
                $('#modalUpdate').modal('show');
                this.update = data.id;
                let me = this;
                let url = './direcciones/'+this.update;
                axios.get(url).then(function (response){
                    me.nombre = response.data.nombre;
                    me.id_persona = response.data.id_persona;
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
                    id_persona: this.id_persona
                };

                let me = this;

                let formData = new FormData();
                formData.append('nombre', this.nombre);
                formData.append('id_persona', this.id_persona);
                
                //Petición post para hacer un nuevo registro.
                axios.post('./direcciones', formData,{
                     headers: {
                    'Content-Type': 'multipart/form-data'
                    }
                }).then(function (response){
                    console.log(response);
                    //Actualizando la lista de direcciones.
                    me.reloadData();
                    swal("Exito!", "Se ha registrado una nueva dirección!", "success");
                })
                .catch(function (error){
                    console.log(error);
                });

                //Se limpian los campos del modal
                this.nombre = '';
                this.id_persona = '';
            
                //Ocultar el modal
                $('#modalNew').modal('hide');
            },
            //Metodo para actualizar los datos del registro.
            updateR(){
                let me = this;
                axios.put('./direcciones', {
                    'id' : this.update,
                    'nombre' : this.nombre,
                    'id_persona' : id_persona
                }).then(function (response){
                    swal("Dirección modificada", "Se ha modificado los datos de la dirección", "info");
                    me.reloadData();
                }).catch(function (error){
                    console.log(error);
                });
                //Cerrando el modal después de actualizar el usuario.
                $('#modalUpdate').modal('hide');
                this.nombre = '';
                this.id_persona = 0;
            },
            //metodo para eliminar
            onClickDelete() {
                let me = this;
                axios.delete('./direcciones/'+this.id_borrar).then(() => {                    
                    me.reloadData();
                    swal("direccion eliminada", "Se ha eliminado la direccion exitosamente", "info");
                });
                $('#modalDelete').modal('hide');
            },
            //actualizar registros
            reloadData(){
                let me = this;
                let url = './direccions' //url que retorna los registros de la tabla empresas
                axios.get(url).then(function (response) {
                    me.direccions = response.data;
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
