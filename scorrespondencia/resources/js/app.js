/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import swal from 'sweetalert';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('personas-component', require('./components/PersonasComponent.vue').default);
Vue.component('roles-component', require('./components/RolesComponent.vue').default);
Vue.component('usuarios-component', require('./components/UsuariosComponent.vue').default);
Vue.component('direcciones-component', require('./components/DireccionesComponent.vue').default);
Vue.component('servicios-component', require('./components/ServiciosComponent.vue').default);
Vue.component('formpeticion-component', require('./components/FormPeticionComponent.vue').default);
Vue.component('peticiones-component', require('./components/PeticionesComponent.vue').default);
Vue.component('peticionesdirector-component', require('./components/PeticionesDirectorComponent.vue').default);
Vue.component('estado-component', require('./components/EstadoComponent.vue').default);
Vue.component('dashboardcapturista-component', require('./components/dashboardCapturistaComponent.vue').default);
Vue.component('dashboardadmin-component', require('./components/dashboardAdminComponent.vue').default);
//Vue.component('dashboarddirector-component', require('./components/dashboardDirectorComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
