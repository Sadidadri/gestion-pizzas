<template>
  <div class="login mt-5">
    <div class="card">
      <div class="card-header">
        Registro
      </div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <label for="email">Nombre</label>
            <input
              type="text"
              class="form-control"
              :class="{ 'is-invalid': errors.name }"
              id="name"
              v-model="details.name"
              placeholder="Introduzca nombre"
            />
            <div class="invalid-feedback" v-if="errors.name">
              {{ errors.name[0] }}
            </div>
          </div>
          <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input
              type="email"
              class="form-control"
              :class="{ 'is-invalid': errors.email }"
              id="email"
              v-model="details.email"
              placeholder="Introduzca email"
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
          <div class="form-group">
            <label for="password_confirmation">Repetir contraseña</label>
            <input
              type="password"
              class="form-control"
              id="password_confirmation"
              v-model="details.password_confirmation"
              placeholder="Repetir contraseña"
            />
          </div>
          <button type="submit" @click="register" class="btn btn-primary">
            Registrarse
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  name: "registro",
  data: function() {
    return {
      details: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
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
    ...mapActions("auth", ["sendRegisterRequest"]),
    register: function(event) {
      event.preventDefault();
      this.sendRegisterRequest(this.details).then(() => {
      });
      this.$router.push({ name: "RegisterComplete" });
    }
  }
};
</script>