<template>
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Peticiones</div>
                        <div class="widget-subheading">Total de peticiones capturadas</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-dark"><span>{{cpeticionest}}</span></div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Peticiones En proceso</div>
                        <div class="widget-subheading">Total de peticiones en proceso</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-primary"><span>{{cpeticionese}}</span></div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Peticiones Finalizadas</div>
                        <div class="widget-subheading">Total de peticiones finalizadas</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success"><span>{{cpeticionesf}}</span></div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Peticiones Improcedentes</div>
                        <div class="widget-subheading">Total de peticiones improcedentes</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger"><span>{{cpeticionesi}}</span></div>
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
                        <tr v-for="peticion in peticiones" :key="peticion.id">
                            <th scope="row">#</th>
                            <td><a href="./peticionesv"><button class="mb-2 mr-2 btn btn-link">Peticion Finalizada
                    </button></a><p>{{peticion.s_descripcion}}</p></td>
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
                peticiones:[],
                cpeticionest:0,
                cpeticionesf:0,
                cpeticionese:0,
                cpeticionesi:0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //Obtener datos
            let me = this;
            let url = './dashboardc' //el url activa el metodo del controlador que devuelve los datos del dashboard
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.cpeticionest = response.data[0];
                me.cpeticionesf = response.data[1];
                me.cpeticionese = response.data[3];
                me.cpeticionesi = response.data[2];
            })
            .catch(function (error) {
                console.log(error);
            });

            url = './peticionesf' //el url activa el metodo del controlador que devuelve los datos del dashboard
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.peticiones = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }
</script>
