import { defineStore } from 'pinia';
import { categorieService } from '@/services/Categories';
import { postService } from '@/services/postService';
import {CommentService} from '@/services/commentaire';
import { parseApiError } from '@/api/kyInstance';

export const usePostStore = defineStore('post', {
  state: () => ({
    categories: [],
    posts: [],
    currentPage: 1,
    hasMore: true,
    loading: false,
    error: null,
    successMessage: null,
    validationErrors: {}, 
  }),

  actions: {
    async fetchCategories() {
      this.loading = true;
      this.error = null;
      this.validationErrors = {};
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

    async getPostById(id) {
      try {
        const res = await postService.getById(id);
        return res;
      } catch (err) {
        const apiError = await parseApiError(err);
        throw apiError;
      }
    },

    async fetchAllPosts({  categ_id = null } = {}) {
      this.loading = true;
      this.error = null;
      this.posts = [];
      this.currentPage = 1;
      this.hasMore = true;
      try {
        const res = await postService.getAll({ page: 1, categ_id: categ_id });
        this.posts = res.data.data ?? [];
        this.hasMore = res.data.next_page_url !== null;
      } catch (err) {
        const apiError = await parseApiError(err);
        this.error = apiError.message;
      } finally {
        this.loading = false;
      }
    },

    async loadMorePosts() {
      if (!this.hasMore || this.loading) return;
      this.loading = true;
      try {
        const res = await postService.getAll({page : this.currentPage + 1});
        this.posts.push(...(res.data.data ?? []));
        this.currentPage++;
        this.hasMore = res.data.next_page_url !== null;
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
      this.validationErrors = {};
      try {
        const res = await postService.create(payload);
        this.successMessage = 'Post créé avec succès';
        return res;
      } catch (err) {
        const apiError = await parseApiError(err);

        if (apiError.type === 'validation') {
          this.validationErrors = apiError.errors;
          this.error = apiError.message;
        } else {
          // Pour les autres erreurs
          this.error = apiError.message;
        }

        throw err;
      } finally {
        this.loading = false;
      }
    },

    async createComment(payload) {
      try {
        const res = await CommentService.createComment(payload);
        return res;
      } catch (err) {
        const apiError = await parseApiError(err);
        throw apiError;
      }
    },

    async updateComment(id, payload) {
      try {
        const res = await CommentService.updateComment(id, payload);
        return res;
      } catch (err) {
        const apiError = await parseApiError(err);
        throw apiError;
      }
    },

    async deleteComment(id) {
      try {
        const res = await CommentService.deleteComment(id);
        return res;
      } catch (err) {
        const apiError = await parseApiError(err);
        throw apiError;
      }
    },


    // Méthode pour obtenir l'erreur d'un champ spécifique
    getFieldError(fieldName) {
      return this.validationErrors[fieldName]?.[0] || null;
    },

    // Méthode pour vérifier si un champ a une erreur
    hasFieldError(fieldName) {
      return !!this.validationErrors[fieldName];
    },

    // Méthode pour nettoyer les erreurs
    clearErrors() {
      this.error = null;
      this.validationErrors = {};
    }
  },
});
