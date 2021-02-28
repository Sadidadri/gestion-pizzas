<template>
  <div class="login mt-5">
    <div class="card">
      <div class="card-header">
        Inicio de Sesión
      </div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input
              type="email"
              class="form-control"
              :class="{ 'is-invalid': errors.email }"
              id="email"
              v-model="details.email"
              placeholder="Inserte correo electrónico"
            />
            <div class="invalid-feedback" v-if="errors.email">
              {{ errors.email[0] }}
            </div>
          </div>
          <div class="form-group">
            <label for="password">Contraseña</label>
            <input
              type="password"
              class="form-control"
              :class="{ 'is-invalid': errors.password }"
              id="password"
              v-model="details.password"
              placeholder="Contraseña"
            />
            <div class="invalid-feedback" v-if="errors.password">
              {{ errors.password[0] }}
            </div>
          </div>
          <button type="submit" @click="login" class="btn btn-primary">
            Enviar
          </button>
        </form>
        <p class="text-center">Si aún no dispones de una cuenta, puedes crearte una pulsando <a href="/register">aquí</a></p>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";


export default {
  name: "login",
  data: function() {
    return {
      details: {
        email: null,
        password: null
      }
    };
  },
  computed: {
    ...mapGetters(["errors"])
  },
  mounted() {
    this.$store.commit("setErrors", {});
  },
  methods: {
    ...mapActions("auth", ["sendLoginRequest"]),
    login: function(event) {
      event.preventDefault();
      this.sendLoginRequest(this.details).then(() => {
        this.$router.push({ name: "Home" });
      });
    }
  }
};
</script>