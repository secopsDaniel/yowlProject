<script setup>
import NavBar from '@/components/NavBar.vue';
import SideBar from '@/components/SideBar.vue';


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

      <form @submit.prevent="" class="p-8 space-y-6">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Titre</label>
            <input type="text" placeholder="Titre" 
              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition" required />
          </div>
          <div>
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Source</label>
            <input type="text" placeholder="source" 
              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition" />
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Catégorie</label>
            <input type="url" placeholder="Catégorie choisi" 
              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition" required />
          </div>
          <div>
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Lien de l'image</label>
            <input type="url" placeholder="ajoute un lien image" 
              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition" />
          </div>
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Lien</label>
            <input type="url" placeholder="Le lien récupéré" 
              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition" />
          </div>
        <div>
          <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Description</label>
          <textarea rows="3" placeholder="Décris ce que tu veux partagé" 
            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition resize-none"></textarea>
        </div>

        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-md border border-blue-100 dark:border-blue-800">
          <label class="block text-sm font-bold text-blue-700 dark:text-blue-400 mb-2">Commentaire</label>
          <textarea rows="4" placeholder="Que veux tu dire?" 
            class="w-full px-4 py-3 rounded-xl border border-white dark:border-gray-600 bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 outline-none transition resize-none"></textarea>
        </div>

        <div class="flex justify-center pt-4">
          <button type="submit" 
            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-md shadow-lg shadow-blue-500/30 transition-all active:scale-95 transform">
            créer
          </button>
        </div>

      </form>
    </div>
  </div>
</template>