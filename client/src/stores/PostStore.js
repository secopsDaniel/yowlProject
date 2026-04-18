import { defineStore } from 'pinia';
import { categorieService } from '@/services/Categories';
import { postService } from '@/services/postService';
import { parseApiError } from '@/api/kyInstance';

export const usePostStore = defineStore('post', {
  state: () => ({
    categories: [],
    loading: false,
    error: null,
    successMessage: null,
  }),

  actions: {
    async fetchCategories() {
      this.loading = true;
      this.error = null;
      try {
        const res = await categorieService.getAll();
        this.categories = res.data ?? [];
      } catch (err) {
        const apiError = await parseApiError(err);
        this.error = apiError.message;
      } finally {
        this.loading = false;
      }
    },

    async createPost(payload) {
      this.loading = true;
      this.error = null;
      this.successMessage = null;
      try {
        const res = await postService.create(payload);
        this.successMessage = 'Post créé avec succès';
        return res;
      } catch (err) {
        const apiError = await parseApiError(err);
        this.error = apiError.message;
        throw err;
      } finally {
        this.loading = false;
      }
    },
  },
});
