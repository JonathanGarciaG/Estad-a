<template>
    <!-- Componente de fila de producto -->
    <div v-if="estado != 'Finalizado'" class="badge badge-info"> {{ estado }} </div>
    <div v-else class="badge badge-success"> {{ estado }} </div>
</template>

<script>
    export default {
        data(){
            return{
                estado:''
            }
        },
        //Se toman los datos del array del componente padre
        props: ['peticion'],
        mounted() {
            let me=this;
            let url = './getestadopeticion/'+this.peticion.id; //url que retorna los registros de la tabla empresas
            axios.get(url).then(function (response) {
                //console.log(response.data);
                me.estado = response.data[0].estado;
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }
</script>