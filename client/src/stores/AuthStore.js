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
        await this.fetchUser();
      } catch (err) {
        const apiError = await parseApiError(err);

        if (apiError.status === 422) {
          this.errors = apiError.errors;
          this.errors = { general: apiError.message };
        }
        else if (apiError.status == 401) {
            this.errors = {message : apiError.message, status: apiError.status, err: apiError.errors};
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

    async AuthMail (){
      this.user  = null
      this.errors = null
      try {
       await this.fetchUser();
      const res =  authService.sendAuthEmail(this.user)
      return res;
      } catch (error) {
       const apiError = await parseApiError(error);
       this.errors = apiError
      }

    },
    async logout() {
      await authService.logout();
      this.user = null;
    },

    async editMe(id,data){
      this.errors = null
      try {
        const res = await authService.editMe(id,data);
        return res;

      } catch (error) {
       const handleError = await parseApiError(error);
       this.errors = handleError;
      }
    }

  },
});
