import { defineStore } from "pinia";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    authUser: null,
    authErrors: [],
  }),
  getters: {
    user: (state) => state.authUser,
    authError: (state) => state.authErrors,
  },
  actions: {
    async getToken() {
      await axios.get("/sanctum/csrf-cookie");
    },
    async getUser() {
      const userData = await axios.get("/api/user");
      this.authUser = userData.data;
      console.log(userData);
    },
    async handleLogin(data) {
      this.authErrors = [];
      await this.getToken();
      try {
        await axios.post("/login", {
          email: data.email,
          password: data.password
        });
        // location.reload()
        // router.push("/");
        const closeButton = document.querySelector('#login-model [data-modal-hide]');
        closeButton.click();
      }catch(error) {
        if(error.response.status === 422) {
          this.authErrors = error.response.data.errors;
        }
      }
    },
    async handelSignup(data) {
      this.authErrors = [];
      await this.getToken();
      try {
        await axios.post("/register", {
          name: data.name,
          email: data.email,
          phone_number: data.phone_number,
          password: data.password,
          password_confirmation: data.confirm_password,
        });
        // location.reload();
        const closeButton = document.querySelector('#signup-model [data-modal-hide]');
        closeButton.click();
      }catch(error) {
        if(error.response.status === 422) {
          this.authErrors = error.response.data.errors;
        }
      }
    },
    async handleLogout() {
      await axios.post("/logout");
      this.authUser = null;
    }
  }
})