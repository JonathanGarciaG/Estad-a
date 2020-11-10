<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Usuarios registrados
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Persona</th>
                                    <th class="text-center">Nombre de Usuario</th>
                                    <th class="text-center">Contraseña</th> 
                                    <th class="text-center">Rol</th> 
                                    <th class="text-center">Acciones</th> 
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="usuario in usuarios" :key="usuario.id">
                                    <td class="text-center text-muted">{{ usuario.id }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img width="40" class="rounded-circle" v-bind:src="'.'+usuario.ruta_foto" alt="">
                                                    </div>
                                                </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ usuario.nombre_persona }} {{ usuario.apellido_p }} {{ usuario.apellido_m }}</div>
                                                <div class="widget-subheading opacity-7">{{ usuario.cargo }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ usuario.nombre }}</td>
                                <td class="text-center">{{ usuario.contraseña }}</td>
                                <td class="text-center">{{ usuario.nombre_rol }}</td>
                                <td class="text-center">
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning" v-on:click="camposUpdate(usuario)"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" v-on:click="mostrarModalDelete(usuario)"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
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
        <div class="modal fade" id="modalNewUser" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px; left: 100px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- al completar el form utiliza el metodo createNew() para agregar un nuevo registro -->
                    <form action="" v-on:submit.prevent="createNew()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Registrar Nuevo Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de CreateNew -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de Usuario:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre de Usuario" required>
                                    <span class="help-block">(*) Ingrese el Nombre de Usuario</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Contraseña:</label>
                                <div class="col-md-9">
                                    <input type="password" id="contraseña" name="contraseña" v-model="contraseña" class="form-control" placeholder="Contraseña" required>
                                    <span class="help-block">(*) Ingrese la Contraseña de Usuario</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Repetir Contraseña:</label>
                                <div class="col-md-9">
                                    <input type="password" id="contraseña2" name="contraseña2" v-model="contraseña2" class="form-control" placeholder="Repetir Contraseña" required>
                                    <span class="help-block">(*) Vuelva a ingresar la contraseña</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Persona asociada:</label>
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
                                    <span class="help-block">(*) Seleccione la persona asociada a la cuenta de usuario</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Rol:</label>
                                <div class="col-md-9">
                                    <select id="rol" name="rol" v-model="id_rol" class="form-control" placeholder="Roles" required>
                                        <option
                                          v-for="rol in roles"
                                          :value="rol.id"
                                          :key="rol.id"
                                        >
                                          {{ rol.nombre }}
                                        </option>
                                    </select>
                                    <span class="help-block">(*) Seleccione el rol de la cuenta de usuario</span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>

        <!-- Modal editar -->
        <div class="modal fade" id="modalUpdateUser" tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px; left: 100px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- al completar el form utiliza el metodo updateR() para modificar los registros obtenidos -->
                    <form action="" v-on:submit.prevent="updateR()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Registrar Nuevo Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de CreateNew -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de Usuario:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre de Usuario" required>
                                    <span class="help-block">(*) Ingrese el Nombre de Usuario</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Contraseña:</label>
                                <div class="col-md-9">
                                    <input type="password" id="contraseña" name="contraseña" v-model="contraseña" class="form-control" placeholder="Contraseña" required>
                                    <span class="help-block">(*) Ingrese la Contraseña de Usuario</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Repetir Contraseña:</label>
                                <div class="col-md-9">
                                    <input type="password" id="contraseña2" name="contraseña2" v-model="contraseña2" class="form-control" placeholder="Repetir contraseña" required>
                                    <span class="help-block">(*) Vuelva a ingresar la contraseña</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Persona asociada:</label>
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
                                    <span class="help-block">(*) Seleccione la persona asociada a la cuenta de usuario</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Rol:</label>
                                <div class="col-md-9">
                                    <select id="rol" name="rol" v-model="id_rol" class="form-control" placeholder="Roles" required>
                                        <option
                                          v-for="rol in roles"
                                          :value="rol.id"
                                          :key="rol.id"
                                        >
                                          {{ rol.nombre }}
                                        </option>
                                    </select>
                                    <span class="help-block">(*) Seleccione el rol de la cuenta de usuario</span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <!-- Fin Modal editar -->

        <!--Inicio del modal eliminar-->
        <div class="modal fade" id="modalDeleteUser"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- al completar el form utiliza el metodo onClickDelete() para eliminar los datos de los productos -->
                <form action="" v-on:submit.prevent="onClickDelete()" enctype="multipart/form-data" class="form-horizontal">


                    <div class="modal-header">
                        <h5 class="modal-title"  id="exampleModalLongTitle">Eliminar usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h5>¿Está seguro que desea eliminar el registro de usuario?</h5>

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
                contraseña:"",  
                contraseña2:"", 
                id_persona:0,
                id_rol:0,
                id: 0,
                usuarios:[],
                personas:[],
                roles:[],
                update:0,
                id_borrar:0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //actualiza los datos
            let me = this;
            let url = './usuarios' //el url devuelve los registros de la tabla usuarios
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.usuarios = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
            url = './personas' //el url devuelve los registros de la tabla personas
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.personas = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
            url = './roles' //el url devuelve los registros de la tabla roles
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
                this.contraseña = '';
                this.contraseña2 = '';
                this.id_persona = 0;
                this.id_rol = 0;
                $('#modalNewUser').modal('show');
            },
            //Metodo para rellenar los campos del formulario y mostrar modal al momento de seleccionar un usuario.
            camposUpdate(data){
                $('#modalUpdateUser').modal('show');
                this.update = data.id;
                let me = this;
                let url = './usuarios/'+this.update;
                axios.get(url).then(function (response){
                    me.nombre = response.data.nombre;
                    me.contraseña = response.data.contraseña;
                    me.contraseña2 = response.data.contraseña;
                    me.id_persona = response.data.id_persona;
                    me.id_rol = response.data.id_rol;
                }).catch(function (error){
                    console.log(error);
                });
            },
            //mostrar modal eliminar
            mostrarModalDelete(data) {
                this.id_borrar = data.id;
                $('#modalDeleteUser').modal('show');               
            },
            //Metodo para agregar un nuevo usuario
            createNew() {
                //se toman los parametros de los campos
                const params = {
                    nombre: this.nombre,
                    contraseña: this.contraseña,
                    contraseña2: this.contraseña2,
                    id_persona: this.id_persona,
                    id_rol: this.id_rol
                };

                let me = this;

                let formData = new FormData();
                formData.append('nombre', this.nombre);
                formData.append('contraseña', this.contraseña);
                formData.append('contraseña2', this.contraseña2);
                formData.append('id_persona', this.id_persona);
                formData.append('id_rol', this.id_rol);

                if(me.contraseña != me.contraseña2){
                    console.log(me.contraseña+" y "+me.contraseña2);
                    swal("Error", "Las contraseñas no coinciden", "error");
                }else{
                    //Petición post para hacer un nuevo registro.
                    axios.post('./usuarios', formData,{
                         headers: {
                        'Content-Type': 'multipart/form-data'
                        }
                    }).then(function (response){
                        console.log(response);
                        //Actualizando la lista de usuarios.
                        me.reloadData();
                        swal("Exito!", "Se ha registrado una nueva usuario!", "success");
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
                    $('#modalNewUser').modal('hide');
                }
          
            },
            //Metodo para actualizar los datos del registro.
            updateR(){
                if(this.contraseña != this.contraseña2){
                    swal("Error", "Las contraseñas no coinciden", "error");
                }else{
                    let me = this;
                    axios.put('./usuarios', {
                        'id' : this.update,
                        'nombre' : this.nombre,
                        'contraseña' : this.contraseña,
                        'id_persona' : this.id_persona,
                        'id_rol' : this.id_rol
                    }).then(function (response){
                        swal("Usuario modificado", "Se ha modificado la información del Usuario", "info");
                        me.reloadData();
                    }).catch(function (error){
                        console.log(error);
                    });
                    //Cerrando el modal después de actualizar el usuario.
                    $('#modalUpdateUser').modal('hide');
                    this.nombre = '';
                    this.contraseña = '';
                    this.contraseña2 = '';
                    this.id_persona = 0;
                    this.id_rol = 0;
                }
                
            },
            //metodo para eliminar
            onClickDelete() {
                let me = this;
                axios.delete('./usuarios/'+this.id_borrar).then(() => {                    
                    me.reloadData();
                    swal("Usuario eliminado", "Se ha eliminado el Usuario exitosamente", "info");
                });
                $('#modalDeleteUser').modal('hide');
            },
            //actualizar registros
            reloadData(){
                let me = this;
                let url = './usuarios' //url que retorna los registros de la tabla empresas
                axios.get(url).then(function (response) {
                    me.usuarios = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            
        }
    }
</script>
