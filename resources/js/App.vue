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
                            <!--<router-link to="/" v-if="" class="nav-item nav-link menu-item">Panel Administración</router-link>
                            <router-link to="/login" v-if="!userIsLogged" class="nav-item nav-link menu-item">Iniciar Sesión</router-link>
                            <router-link to="to"@click.native="logout" id="logout-link" v-if="userIsLogged" class="nav-item nav-link menu-item">Cerrar Sesión</router-link> -->
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
      
    }
  },
  computed: {
    ...mapGetters("auth", ["user"])
  },
  mounted() {
    

    //if (!localStorage.getItem("userLogged")) {
    //  this.getUserData();
    //}else{
    //  this.userIsLogged = true;
    //}
    
    console.log(this.$store.state.auth);
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