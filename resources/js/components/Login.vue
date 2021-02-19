<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="page-header">
              <h2>Inicio de Sesión</h2>
            </div>
            <div class="col-md-12 text-center">
                <p v-if="errors.length">
                    <b>Por favor corrige los siguientes error/es:</b>
                    <ul class="list-group">
                      <li v-for="error in errors" class="list-group-item list-group-item-danger">{{ error }}</li>
                    </ul>
                </p>
            </div>
            <div class="col-md-6" v-if="loginfalse = true">
                <form @submit="checkForm" id="createAdministrator">
                  <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input v-model="email" type="email" class="form-control" id="email" placeholder="Introduzca correo electrónico" name="email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input v-model="password" type="password" class="form-control" id="password" placeholder="********" name="password">
                  </div>
                  <div class="text-center my-4">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            console.log('Componente iniciado.')
        },
         data() {
            return {
                errors: [],
                state: {
                    email: '',
                    password: ''
                }
            }
        },
        methods:{
        checkForm: function (e) {
           
          this.errors = [];
          if (!this.email) {
            this.errors.push('Correo electrónico requerido.');
          }
          if (!this.password) {
            this.errors.push('Contraseña requerida.');
          }
        else
        {
        var formContents = jQuery("#createAdministrator").serialize();
        
        
          axios.post('/vuelogin', formContents).then(function(response, status, request) {  
                            alert(response.data.user);
                        
                        
                    }, function() {
                        console.log('Inicio fallido');
                    });
        }
        
          e.preventDefault();
        }
      }
    }
</script>