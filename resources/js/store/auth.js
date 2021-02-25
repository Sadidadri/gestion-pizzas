import axios from "axios";

export default {
  namespaced: true,

  state: {
    userData: null
  },

  getters: {
    user: state => state.userData
  },

  mutations: {
    setUserData(state, user) {
      state.userData = user;
    }
  },

  actions: {
    getUserData({ commit }) {
      axios
        .get("http://localhost:8000/api/" + "user")
        .then(response => {
          commit("setUserData", response.data);
        })
        .catch(() => {
          localStorage.removeItem("authToken");
        });
    },
    sendLoginRequest({ commit }, data) {
      commit("setErrors", {}, { root: true });
      return axios
        .post("http://localhost:8000/api/" + "login", data)
        .then(response => {
          commit("setUserData", response.data.user);
          localStorage.setItem("authToken", response.data.token);
          localStorage.setItem("userLogged",true)
        });
    },
    sendRegisterRequest({ commit }, data) {
      commit("setErrors", {}, { root: true });
      return axios
        .post("http://localhost:8000/api/" + "register", data)
        .then(response => {
          commit("setUserData", response.data.user);
          localStorage.setItem("authToken", response.data.token);
          localStorage.setItem("userLogged",true)
        });
    },
    sendLogoutRequest({ commit }) {
      axios.post("http://localhost:8000/api/" + "logout").then(() => {
        commit("setUserData", null);
        localStorage.removeItem("authToken");
        localStorage.removeItem("userLogged");
      });
    },
    sendVerifyResendRequest() {
      return axios.get("http://localhost:8000/api/" + "email/resend");
    },
    sendVerifyRequest({ dispatch }, hash) {
      return axios
        .get("http://localhost:8000/api/" + "email/verify/" + hash)
        .then(() => {
          dispatch("getUserData");
        });
    }
  }
};