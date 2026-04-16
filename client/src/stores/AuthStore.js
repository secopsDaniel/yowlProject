import { defineStore } from "pinia";
import { authService } from "@/services/authService";
import { parseApiError } from "@/api/kyInstance";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    user: null,
    loading: false,
    errors: null,

  }),

  getters: {
    isAuthenticated: (state) => !!state.user,
  },

  actions: {
    async fetchUser() {
      try {
        this.user = await authService.getme();
      } catch (e){
        this.user = null;
         console.log("fetchUser error", e);
      }
    },

    async login(credentials) {
      this.loading = true;
      this.errors = null;

      try {
        await authService.login(credentials);
        console.log("AVANT fetchUser");
        await this.fetchUser();
        console.log("APRÈS fetchUser");
      } catch (err) {
        const apiError = await parseApiError(err);

        if (apiError.status === 422) {
          this.errors = apiError.errors; // 👈 validation errors
        } else {
          this.errors = { general: apiError.message };
        }

        throw err;
      } finally {
        this.loading = false;
      }
    },

    async register(data) {
      this.loading = true;
      this.errors = null;

      try {
        await authService.register(data);
        await this.fetchUser();
      } catch (err) {
        const apiError = await parseApiError(err);

        if (apiError.status === 422) {
          this.errors = apiError.errors;
        } else {
          this.errors = { general: apiError.message };
        }

        throw err;
      } finally {
        this.loading = false;
      }
    },

    async logout() {
      await authService.logout();
      this.user = null;
    },
  },
});
