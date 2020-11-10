<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Roles
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre de Rol</th>
                                    <th class="text-center">Acciones</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="rol in roles" :key="rol.id">
                                    <td class="text-center text-muted">{{ rol.id }}</td>                      
                                    <td class="text-center">{{ rol.nombre }}</td>
                                    <td class="text-center">
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning" v-on:click="camposUpdate(rol)"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" v-on:click="mostrarModalDelete(rol)"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
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
        <div class="modal fade" id="modalNewRol" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px; left: 100px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- al completar el form utiliza el metodo createNew() para agregar un nuevo registro -->
                    <form action="" v-on:submit.prevent="createNew()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Agregar Nuevo Rol</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de createNew -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de rol:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre del rol</span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar rol</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>

        <!-- Modal editar -->
        <div class="modal fade" id="modalUpdateRol" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px; left: 100px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- al completar el form utiliza el metodo updateR() para modificar los registros obtenidos -->
                    <form action="" v-on:submit.prevent="updateR()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Editar rol</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de rol:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre de la rol</span>
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
        <div class="modal fade" id="modalDeleteRol"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- al completar el form utiliza el metodo onClickDelete() para eliminar los datos de los productos -->
                <form action="" v-on:submit.prevent="onClickDelete()" enctype="multipart/form-data" class="form-horizontal">


                    <div class="modal-header">
                        <h5 class="modal-title"  id="exampleModalLongTitle">Eliminar rol</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h5>¿Está seguro que desea eliminar el registro de rol?</h5>

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
                id: 0,
                roles:[],
                update:0,
                id_borrar:0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //actualiza los datos
            let me = this;
            let url = './roles' //el url devuelve los registros de la tabla roles
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.roles = response.data;
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
                $('#modalNewRol').modal('show');
            },
            //Metodo para rellenar los campos del formulario y mostrar modal al momento de seleccionar un rol.
            camposUpdate(data){
                $('#modalUpdateRol').modal('show');
                this.update = data.id;
                let me = this;
                let url = './roles/'+this.update;
                axios.get(url).then(function (response){
                    me.nombre = response.data.nombre;
                }).catch(function (error){
                    console.log(error);
                });
            },
            //mostrar modal eliminar
            mostrarModalDelete(data) {
                this.id_borrar = data.id;
                $('#modalDeleteRol').modal('show');               
            },
            //Metodo para agregar un nuevo rol
            createNew() {
                //se toman los parametros de los campos
                const params = {
                    nombre: this.nombre,
                };

                let me = this;

                let formData = new FormData();
                formData.append('nombre', this.nombre);
                
                //Petición post para hacer un nuevo registro.
                axios.post('./roles', formData,{
                     headers: {
                    'Content-Type': 'multipart/form-data'
                    }
                }).then(function (response){
                    console.log(response);
                    //Actualizando la lista de roles.
                    me.reloadData();
                    swal("Exito!", "Se ha registrado una nuevo rol", "success");
                })
                .catch(function (error){
                    console.log(error);
                });

                //Se limpian los campos del modal
                this.nombre = '';
            
                //Ocultar el modal
                $('#modalNewRol').modal('hide');
            },
            //Metodo para actualizar los datos del registro.
            updateR(){
                let me = this;
                axios.put('./roles', {
                    'id' : this.update,
                    'nombre' : this.nombre
                }).then(function (response){
                    swal("Rol modificado", "Se ha modificado la información del rol", "info");
                    me.reloadData();
                }).catch(function (error){
                    console.log(error);
                });
                this.nombre = '';
                //Cerrando el modal después de actualizar el rol.
                $('#modalUpdateRol').modal('hide');
                
            },
            //metodo para eliminar
            onClickDelete() {
                let me = this;
                axios.delete('./roles/'+this.id_borrar).then(() => {                    
                    me.reloadData();
                    swal("Rol eliminado", "Se ha eliminado el rol exitosamente", "info");
                });
                $('#modalDeleteRol').modal('hide');
            },
            //actualizar registros
            reloadData(){
                let me = this;
                let url = './roles' //url que retorna los registros de la tabla empresas
                axios.get(url).then(function (response) {
                    me.roles = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }            
        }
    }
</script>
