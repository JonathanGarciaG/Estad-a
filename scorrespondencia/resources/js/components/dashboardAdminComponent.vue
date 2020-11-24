<template>
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Usuarios</div>
                        <div class="widget-subheading">Total de usuarios registrados</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-dark"><span>{{cusuarios}}</span></div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Personas</div>
                        <div class="widget-subheading">Totaal de personas registradas</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-primary"><span>{{cpersonas}}</span></div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Direcciones</div>
                        <div class="widget-subheading">Total de direcciones registradas</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success"><span>{{cdirecciones}}</span></div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Servicios</div>
                        <div class="widget-subheading">Total de servicios registrados</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger"><span>{{cservicios}}</span></div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-md-12 col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Notificaciones</h5>
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th><i class="pe-7s-bell"></i></th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="usuario in usuarios" :key="usuario.id">
                            <th scope="row">#</th>
                            <td><a href="./peticionesv"><button class="mb-2 mr-2 btn btn-link">Nuevo Usuario
                    </button></a><p>{{usuario.nombre}}</p></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                usuarios:[],
                cusuarios:0,
                cpersonas:0,
                cdirecciones:0,
                cservicios:0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //Obtener datos
            let me = this;
            let url = './dashboardadmin' //el url activa el metodo del controlador que devuelve los datos del dashboard
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.cusuarios = response.data[0];
                me.cpersonas = response.data[1];
                me.cdirecciones = response.data[2];
                me.cservicios = response.data[3];
            })
            .catch(function (error) {
                console.log(error);
            });

            url = './ultimosusers' //el url activa el metodo del controlador que devuelve los datos del dashboard
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.usuarios = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }
</script>
