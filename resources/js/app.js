/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
//import vue
import App from './App.vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes';

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

//Componentes CRUD pizzas
Vue.component('ver_pizzas',require('./components/AllPizzas.vue').default);
Vue.component('crear_pizzas',require('./components/CreatePizza.vue').default);
Vue.component('editar_pizzas',require('./components/EditPizza.vue').default);

//Componentes CRUD ingredientes
Vue.component('ver_ingredientes',require('./components/AllIngredientes.vue').default);
Vue.component('crear_ingredientes',require('./components/CreateIngrediente.vue').default);
Vue.component('editar_ingredientes',require('./components/EditIngrediente.vue').default);

//CRUD Relacion de ingredientes vinculados a cada pizza
Vue.component('ver_ingredientes_pizza',require('./components/AllRel_Pi_Ing.vue').default);
Vue.component('crear_ingredientes_pizza',require('./components/CreateRel_Pi_Ing.vue').default);
Vue.component('editar_ingredientes_pizza',require('./components/EditRel_Pi_Ing.vue').default);

//Componentes CRUD Pedidos
Vue.component('ver_pedidos',require('./components/AllPedidos.vue').default);

Vue.component('ver_pizzas_pedido',require('./components/AllRel_Pe_Piz.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
    
});