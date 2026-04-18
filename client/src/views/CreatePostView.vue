<script setup>
import { ref, computed, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import NavBar from '@/components/NavBar.vue';
import SideBar from '@/components/SideBar.vue';
import { usePostStore } from '@/stores/PostStore';
import { useAuthStore } from '@/stores/AuthStore';

const router = useRouter();
const postStore = usePostStore();
const authStore = useAuthStore();

const form = ref({
  titre: '',
  source: '',
  categ_id: '',
  links: '',
  description: '',
  commentaire: '',
});

const notification = ref(null);
const categories = computed(() => postStore.categories);
const isLoading = computed(() => postStore.loading);
const errorMessage = computed(() => postStore.error);

const loadCategories = async () => {
  await postStore.fetchCategories();
};

const submitPost = async () => {
  notification.value = null;

  if (!form.value.categ_id) {
    notification.value = { type: 'error', message: 'Veuillez choisir une catégorie.' };
    return;
  }

  try {
    await postStore.createPost(form.value);
    notification.value = { type: 'success', message: 'Post créé avec succès.' };
    router.push({ name: 'home' });
  } catch (err) {
    notification.value = {
      type: 'error',
      message: postStore.error || 'Impossible de créer le post.',
    };
  }
};

onMounted(async () => {
  if (!authStore.user) {
    await authStore.fetchUser();
  }
  await loadCategories();
});
</script>
<template>
    <NavBar/>
    <SideBar/>
  <div class="max-w-4xl mx-auto mt-10 p-4">

    <div class="bg-white dark:bg-gray-800 rounded-1xl border border-gray-100 dark:border-gray-700 overflow-hidden">

      <div class="bg-blue-600 p-6 text-white text-center">
        <h2 class="text-2xl font-bold">Créer un nouveau Post</h2>
        <p class="text-blue-100 text-sm mt-1">Commenter sur invovez Yowl</p>
      </div>

      <form @submit.prevent="submitPost" class="p-8 space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Titre</label>
            <input
              v-model="form.titre"
              type="text"
              placeholder="Titre"
              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition"
              required
            />
          </div>
          <div>
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Source</label>
            <input
              v-model="form.source"
              type="text"
              placeholder="Source du post"
              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition"
              required
            />
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Catégorie</label>
            <select
              v-model="form.categ_id"
              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition"
              required
            >
              <option value="" disabled>Choisir une catégorie</option>
              <option
                v-for="category in categories"
                :key="category.id"
                :value="category.id"
              >
                {{ category.title }} - {{ category.description || 'Aucune description' }}
              </option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Lien</label>
            <input
              v-model="form.links"
              type="url"
              placeholder="URL du contenu à capturer"
              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition"
              required
            />
          </div>
        </div>

        <div>
          <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Description</label>
          <textarea
            v-model="form.description"
            rows="3"
            placeholder="Décris ce que tu veux partager"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition resize-none"
            required
          ></textarea>
        </div>

        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-md border border-blue-100 dark:border-blue-800">
          <label class="block text-sm font-bold text-blue-700 dark:text-blue-400 mb-2">Commentaire</label>
          <textarea
            v-model="form.commentaire"
            rows="4"
            placeholder="Que veux-tu dire ?"
            class="w-full px-4 py-3 rounded-xl border border-white dark:border-gray-600 bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 outline-none transition resize-none"
          ></textarea>
        </div>

        <div class="flex justify-center pt-4">
          <button
            type="submit"
            :disabled="isLoading"
            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-md shadow-lg shadow-blue-500/30 transition-all active:scale-95 transform disabled:cursor-not-allowed disabled:bg-blue-400"
          >
            {{ isLoading ? 'Création...' : 'Créer' }}
          </button>
        </div>

      </form>
    </div>
  </div>
</template>
