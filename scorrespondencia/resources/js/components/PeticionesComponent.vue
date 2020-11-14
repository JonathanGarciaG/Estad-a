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
                                <td class="text-center">{{peticion.s_prioridad}}</td>
                                <td class="text-center">{{peticion.created_at}}</td>
                                <td class="text-center">
                                    <div class="badge badge-success">{{peticion.id}}</div>
                                </td>
                                <td class="text-center">
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning" on:click="camposUpdate(peticion)"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
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
                    </div>

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
