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
                            <router-link to="/" class="nav-item nav-link menu-item">Inicio</router-link>
                            <router-link to="/" class="nav-item nav-link menu-item">Sobre Nosotros</router-link>
                            <router-link to="/" v-if="this.$userIsAdmin" class="nav-item nav-link menu-item">Panel Administración</router-link>
                            <router-link to="/login" v-show="!user" class="nav-item nav-link menu-item">Iniciar Sesión</router-link>
                            <router-link to="to"@click.native="logout" id="logout-link " v-on:click.native="logout" v-show="user" class="nav-item nav-link menu-item">Cerrar Sesión</router-link>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        

        <router-view> </router-view>
    </div>
</template>
 
<script>
import { mapGetters, mapActions } from "vuex";
export default {
  data(){
    return{
      userIsAdmin:false,
    }
  },
  computed: {
    ...mapGetters("auth", ["user"])
  },
  mounted() {
    if (localStorage.getItem("authToken")) {
      this.getUserData();
    }
    if($('meta[name=author]').attr('content') == "admin"){
      this.userIsAdmin = true;
    }

  },
  methods: {
    ...mapActions("auth", ["sendLogoutRequest", "getUserData"]),
    logout() {
      this.sendLogoutRequest();
      this.$router.push("/");
    }
  }
};
</script>