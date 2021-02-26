<template>
    <div id="content">
        <div v-if="this.isAdmin()">
            <h1 class="text-center">Hola Admin</h1>
            <div class="my-5 d-flex justify-content-center">
                <ul>   
                    <li><p>Administrar <router-link to="administrador/pizzas">Pizzas</router-link></p></li>
                    <li><p>Administrar <router-link to="administrador/ingredientes">Ingredientes</router-link></p></li>
                    <li><p>Administrar <router-link to="administrador/pedidos">Pedidos</router-link></p></li>
                    <li><p>Seleccionar <router-link to="administrador/ingredientes_pizza">Ingredientes para las Pizzas</router-link></p></li>
                    <li><p>Administrar <router-link to="administrador/pizzas_pedido">Pizzas de cada Pedido</router-link></p></li>
                </ul>
            </div>
        </div>
        <div v-else>
            <h1 style="color:lightgray" class="text-center mt-5">Error 404. Página no encontrada</h1>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {

            }
        },
        created() {

            
        },
        mounted(){
        },
        methods: {
            isAdmin(){
                if (localStorage.getItem('userLogged')){
                    if(localStorage.getItem('userRole') === "admin"){
                    return true;
                    }
                }
                    return false;
            }
        }
            
    }
</script>