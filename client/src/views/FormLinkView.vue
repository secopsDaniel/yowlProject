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
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Lien</label>
            <input type="text" placeholder="Coller le lien ici" 
              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition" required />
          </div>
          <div>
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Source</label>
            <input type="text" placeholder="Entrez la vraie source Ex: youtube.com" 
              class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition" />
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Catégorie</label>
            <select  class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none transition" required >
                <option value="week">Autres</option>
                <option value="month">Sport</option>
                <option value="year">Dance</option>
            </select>
          </div>
        </div>

        <div class="flex justify-center pt-4">
        <RouterLink to="/create">
          <button type="submit" 
            class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-md shadow-lg shadow-blue-500/30 transition-all active:scale-95 transform">
            Valider
          </button>
        </RouterLink>
        </div>

      </form>
    </div>
  </div>
</template>