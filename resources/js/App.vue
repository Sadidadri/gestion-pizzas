<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/pizzas" class="nav-item nav-link">Listado de Pizzas</router-link>
                    <router-link to="/ingredientes" class="nav-item nav-link">Listado de Ingredientes</router-link>
                    <router-link to="/pedidos" class="nav-item nav-link">Listado de Pedidos</router-link>
                </div>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>