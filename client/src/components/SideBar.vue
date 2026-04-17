<template>
  <aside class="fixed left-0 top-0 h-screen w-20 bg-[#101A26] border-r border-gray-200 z-50 flex flex-col items-center py-8">
    <nav class="flex-1 w-full px-2 space-y-4 mt-20">
      <RouterLink to="/">
        <button class="w-full p-3 flex justify-center rounded-lg text-blue-500 hover:bg-blue-700 hover:text-blue-200 transition-colors">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
        </button>
      </RouterLink>

      <RouterLink to="/Profil_user">
        <button class="w-full p-3 flex justify-center rounded-lg text-blue-500 hover:bg-blue-700 hover:text-blue-200 transition-colors">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </button>
      </RouterLink>

      <RouterLink to="/User_post">
        <button class="w-full p-3 flex justify-center rounded-lg text-blue-500 hover:bg-blue-700 hover:text-blue-200 transition-colors">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
          </svg>
        </button>
      </RouterLink>
      
      </nav>

    <div class="mt-auto pb-4">
      <button class="w-12 h-12 rounded-full border-2 border-transparent hover:border-blue-500 transition-all overflow-hidden">
        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User" class="w-full h-full object-cover">
      </button>
    </div>
  </aside>
</template>