<template>
    <div class="container"> 
        <header class="row">
            <div class="col-sm-6">
                <router-link to="/" class="nav-item nav-link align-middle">
                    <img id="logo" src='images/contenido/logo.png' alt="image"  />
                </router-link>
            </div>
            <div class="col-sm-6 d-flex align-items-center">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="d-flex collapse navbar-collapse justify-content-end">
                        <div class="navbar-nav d-flex justify-content-around">
                            <router-link to="/" class="nav-item nav-link">Inicio</router-link>
                            <router-link to="/" class="nav-item nav-link">Sobre Nosotros</router-link>
                            <router-link to="/" v-if="this.$userRoles == 'admin'" class="nav-item nav-link">Panel Administración</router-link>
                            <router-link to="/login" v-if="this.$userRoles == 'invitado'" class="nav-item nav-link">Iniciar Sesión</router-link>
                            <router-link to="/logout" v-if="this.$userRoles != 'invitado'" class="nav-item nav-link">Cerrar Sesión</router-link>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        

        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {
        mounted(){
            console.log(this.$userRoles);
        }
    }
</script>