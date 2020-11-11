<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Servicios registrados
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Servicio</th>
                                    <th class="text-center">Dirección encargada</th>
                                    <th class="text-center">Acciones</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="servicio in servicios" :key="servicio.id">
                                <td class="text-center text-muted">{{ servicio.id }}</td>
                                <td class="text-center text-muted">{{ servicio.nombre }}</td>
                                <td class="text-center text-muted">{{ servicio.nombre_direccion }}</td>
                                
                                <td class="text-center">
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning" v-on:click="camposUpdate(servicio)"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" v-on:click="mostrarModalDelete(servicio)"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
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
        <div class="modal fade" id="modalNewServ" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px; left: 100px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- al completar el form utiliza el metodo createNew() para agregar un nuevo registro -->
                    <form action="" v-on:submit.prevent="createNew()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Agregar Nuevo Servicio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de createNew -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de Servicio:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre del servicio</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Dirección a cargo:</label>
                                <div class="col-md-9">
                                    <select id="direccion" name="direccion" v-model="id_direccion" class="form-control" placeholder="Dirección" required>
                                        <option
                                          v-for="direccion in direcciones"
                                          :value="direccion.id"
                                          :key="direccion.id"
                                        >
                                          {{ direccion.nombre }}
                                        </option>
                                    </select>
                                    <span class="help-block">(*) Seleccione la dirección a cargo del servicio</span>
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
        <div class="modal fade" id="modalUpdateServ" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px; left: 100px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- al completar el form utiliza el metodo updateR() para modificar los registros obtenidos -->
                    <form action="" v-on:submit.prevent="updateR()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Editar servicio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de Servicio:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre del servicio</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Dirección a cargo:</label>
                                <div class="col-md-9">
                                    <select id="direccion" name="direccion" v-model="id_direccion" class="form-control" placeholder="Dirección" required>
                                        <option
                                          v-for="direccion in direcciones"
                                          :value="direccion.id"
                                          :key="direccion.id"
                                        >
                                          {{ direccion.nombre }}
                                        </option>
                                    </select>
                                    <span class="help-block">(*) Seleccione la dirección a cargo del servicio</span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" v-on:click="updateR()">Guardar Cambios</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <!-- Fin Modal editar -->

        <!--Inicio del modal eliminar-->
        <div class="modal fade" id="modalDeleteServ"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
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
                nombre : "",
                id_direccion: 0,
                id: 0,
                servicios:[],
                direcciones:[],
                update:0,
                id_borrar:0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //actualiza los datos
            let me = this;
            let url = './servicios' //el url devuelve los registros de la tabla servicios
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.servicios = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
            url = './direcciones'
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
                this.id_direccion = '';
                $('#modalNewServ').modal('show');
            },
            //Metodo para rellenar los campos del formulario y mostrar modal al momento de seleccionar un usuario.
            camposUpdate(data){
                $('#modalUpdateServ').modal('show');
                this.update = data.id;
                let me = this;
                let url = './servicios/'+this.update;
                axios.get(url).then(function (response){
                    me.nombre = response.data.nombre;
                    me.id_direccion = response.data.id_direccion;
                }).catch(function (error){
                    console.log(error);
                });
            },
            //mostrar modal eliminar
            mostrarModalDelete(data) {
                this.id_borrar = data.id;
                $('#modalDeleteServ').modal('show');               
            },
            //Metodo para agregar un nuevo usuario
            createNew() {
                //se toman los parametros de los campos
                const params = {
                    nombre: this.nombre,
                    id_direccion: this.id_direccion
                };

                let me = this;

                let formData = new FormData();
                formData.append('nombre', this.nombre);
                formData.append('id_direccion', this.id_direccion);
                
                //Petición post para hacer un nuevo registro.
                axios.post('./servicios', formData,{
                     headers: {
                    'Content-Type': 'multipart/form-data'
                    }
                }).then(function (response){
                    console.log(response);
                    //Actualizando la lista de servicios.
                    me.reloadData();
                    swal("Exito!", "Se ha registrado un nuevo servicio", "success");
                })
                .catch(function (error){
                    console.log(error);
                });

                //Se limpian los campos del modal
                this.nombre = '';
                this.id_direccion = '';
            
                //Ocultar el modal
                $('#modalNewServ').modal('hide');
            },
            //Metodo para actualizar los datos del registro.
            updateR(){
                let me = this;
                axios.put('./servicios', {
                    'id' : this.update,
                    'nombre' : this.nombre,
                    'id_direccion' : this.id_direccion
                }).then(function (response){
                    swal("Servicio modificada", "Se ha modificado los datos del servicio", "info");
                    me.reloadData();
                }).catch(function (error){
                    console.log(error);
                });
                //Cerrando el modal después de actualizar el usuario.
                $('#modalUpdateServ').modal('hide');
                this.nombre = '';
                this.id_direccion = 0;
            },
            //metodo para eliminar
            onClickDelete() {
                let me = this;
                axios.delete('./servicios/'+this.id_borrar).then(() => {                    
                    me.reloadData();
                    swal("Servicio eliminado", "Se ha eliminado el servicio exitosamente", "info");
                });
                $('#modalDeleteServ').modal('hide');
            },
            //actualizar registros
            reloadData(){
                let me = this;
                let url = './servicios' //url que retorna los registros de la tabla empresas
                axios.get(url).then(function (response) {
                    me.servicios = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>
