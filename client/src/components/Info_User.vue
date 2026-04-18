<script setup>
</script>

<template>
  <section class="w-full bg-gray-50 dark:bg-gray-900 min-h-screen pl-20 pt-[80px]">
    
    <div class="max-w-5xl mx-auto px-4 pb-12">
      
      <div class="w-full h-48 bg-gradient-to-r from-blue-600 to-blue-400 rounded-b-2xl shadow-inner"></div>

      <div class="relative flex flex-col items-center sm:items-start px-6">
        
        <div class="relative -mt-20">
          <img 
            src="https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?q=80&w=300" 
            alt="Profile"
            class="w-32 h-32 sm:w-40 sm:h-40 rounded-2xl object-cover border-4 border-white dark:border-gray-900 shadow-xl"
          />
        </div>

        <div class="mt-4 text-center sm:text-left sm:ml-4 flex-1">
          <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Samuel Abera</h1>
          <p class="text-blue-500 font-medium">@samuel_dev</p>
          
          <div class="flex gap-8 mt-4 justify-center sm:justify-start">
            <div class="text-center">
              <span class="block font-bold text-xl dark:text-white">128</span>
              <span class="text-xs text-gray-400 uppercase tracking-wider">Posts</span>
            </div>
            <div class="text-center">
              <span class="block font-bold text-xl dark:text-white">3.2k</span>
              <span class="text-xs text-gray-400 uppercase tracking-wider">Likes</span>
            </div>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-10 px-2">
        
        <div class="lg:col-span-1">
          <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
            <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-6">Informations</h2>
            <ul class="space-y-4">
              <li class="flex items-center gap-4 text-gray-600 dark:text-gray-300">
                <span class="bg-blue-50 dark:bg-blue-900/30 p-2 rounded-lg">i</span> 
                Addis Ababa, Ethiopia
              </li>
              <li class="flex items-center gap-4 text-gray-600 dark:text-gray-300">
                <span class="bg-blue-50 dark:bg-blue-900/30 p-2 rounded-lg">i</span> 
                samuel@example.com
              </li>
              <li class="flex items-center gap-4 text-gray-600 dark:text-gray-300">
                <span class="bg-blue-50 dark:bg-blue-900/30 p-2 rounded-lg">i</span> 
                14 Mai 1977
              </li>
            </ul>
            <button class="w-full mt-8 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition-all active:scale-95 shadow-lg shadow-blue-500/20">
              Modifier le profil
            </button>
          </div>
        </div>

        <div class="lg:col-span-2">
          <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 min-h-[400px]">
             <h2 class="text-xl font-bold dark:text-white mb-6">Activité récente</h2>
             <div class="flex flex-col items-center justify-center h-64 border-2 border-dashed border-gray-100 dark:border-gray-700 rounded-2xl">
                <div class="text-4xl mb-2 text-gray-300">icon</div>
                <p class="text-gray-400 italic font-light">Aucune publication pour le moment.</p>
             </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>