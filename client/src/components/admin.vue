<script setup lang="ts">
import CrudUsers from './CrudUsers.vue';

</script>

<template>
<div class="grid grid-cols-8  w-dvw h-dvh bg-back-50">
  <div class="col-span-1 h-ful  l overflow-y-auto">
    <div class=" p-2 h-full w-full flex flex-col bg-[#101A26] dark:bg-gray-900 border-r border-r-gray-200"><a href="/app">
        <div class="flex justify-start items-center gap-2 py-2 px-4 cursor-pointer "><svg width="36" height="36"
            viewBox="0 0 903 1000" fill="none" xmlns="http://www.w3.org/2000/svg">
          </svg></div>
          <div class="logo">Yo<span>wl</span></div>
      </a>
      <div class="flex flex-col h-full overflow-y-auto overflow-x-hidden flex-grow pt-0 justify-between">
        <div class="flex flex-col  space-y-1 mx-1 lg:mt-1 ">
          <div class="px-5 pt-1 hidden lg:block">
            
          </div>
          
          <a
            class="flex flex-row items-center  justify-center lg:justify-start rounded-md h-12 focus:outline-none pr-3.5  lg:pr-6 font-semibold text-gray-500 hover:text-primary-400 cursor-pointer "
            href="#"><span class="inline-flex justify-center items-center ml-3.5 text-blue-400 hover:text-blue-600">
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </span><span class="ml-0 lg:ml-2 text-sm tracking-wide truncate capitalize hidden lg:block">Users</span></a>
              <a
            class="flex flex-row items-center  justify-center lg:justify-start rounded-md h-12 focus:outline-none pr-3.5  lg:pr-6 font-semibold text-gray-500 hover:text-primary-400 cursor-pointer "
            href="#"><span class="inline-flex justify-center items-center ml-3.5 text-blue-400 hover:text-blue-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="1.25rem" height="1.25rem" viewBox="0 0 24 24" fill="none"><g opacity="0.50"><path d="M21 8H13C12.7348 8 12.4804 7.89464 12.2929 7.70711C12.1054 7.51957 12 7.26522 12 7C12 6.73478 12.1054 6.48043 12.2929 6.29289C12.4804 6.10536 12.7348 6 13 6H21C21.2652 6 21.5196 6.10536 21.7071 6.29289C21.8946 6.48043 22 6.73478 22 7C22 7.26522 21.8946 7.51957 21.7071 7.70711C21.5196 7.89464 21.2652 8 21 8ZM21 12H13C12.7348 12 12.4804 11.8946 12.2929 11.7071C12.1054 11.5196 12 11.2652 12 11C12 10.7348 12.1054 10.4804 12.2929 10.2929C12.4804 10.1054 12.7348 10 13 10H21C21.2652 10 21.5196 10.1054 21.7071 10.2929C21.8946 10.4804 22 10.7348 22 11C22 11.2652 21.8946 11.5196 21.7071 11.7071C21.5196 11.8946 21.2652 12 21 12Z" fill="currentColor"></path><path d="M21 16H3C2.73478 16 2.48043 15.8946 2.29289 15.7071C2.10536 15.5196 2 15.2652 2 15C2 14.7348 2.10536 14.4804 2.29289 14.2929C2.48043 14.1054 2.73478 14 3 14H21C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15C22 15.2652 21.8946 15.5196 21.7071 15.7071C21.5196 15.8946 21.2652 16 21 16ZM13 20H3C2.73478 20 2.48043 19.8946 2.29289 19.7071C2.10536 19.5196 2 19.2652 2 19C2 18.7348 2.10536 18.4804 2.29289 18.2929C2.48043 18.1054 2.73478 18 3 18H13C13.2652 18 13.5196 18.1054 13.7071 18.2929C13.8946 18.4804 14 18.7348 14 19C14 19.2652 13.8946 19.5196 13.7071 19.7071C13.5196 19.8946 13.2652 20 13 20Z" fill="currentColor"></path></g><rect x="2" y="4" width="8" height="8" rx="2" fill="currentColor"></rect></svg></span><span class="ml-0 lg:ml-2 text-sm tracking-wide truncate capitalize hidden lg:block">Profil</span>
            </a>
            <a
            class="flex flex-row items-center  justify-center lg:justify-start rounded-md h-12 focus:outline-none pr-3.5  lg:pr-6 font-semibold text-gray-500 hover:text-primary-400 cursor-pointer "
            href="#"><span class="inline-flex justify-center items-center ml-3.5 text-red-400 hover:text-red-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="1.25rem" height="1.25rem" viewBox="0 0 24 24"><path fill="currentColor" d="M15 2h-1c-2.828 0-4.243 0-5.121.879C8 3.757 8 5.172 8 8v8c0 2.828 0 4.243.879 5.121C9.757 22 11.172 22 14 22h1c2.828 0 4.243 0 5.121-.879C21 20.243 21 18.828 21 16V8c0-2.828 0-4.243-.879-5.121C19.243 2 17.828 2 15 2" opacity=".6"></path><path fill="currentColor" d="M8 8c0-1.538 0-2.657.141-3.5H8c-2.357 0-3.536 0-4.268.732S3 7.143 3 9.5v5c0 2.357 0 3.535.732 4.268S5.643 19.5 8 19.5h.141C8 18.657 8 17.538 8 16z" opacity=".4"></path><path fill="currentColor" fill-rule="evenodd" d="M4.47 11.47a.75.75 0 0 0 0 1.06l2 2a.75.75 0 0 0 1.06-1.06l-.72-.72H14a.75.75 0 0 0 0-1.5H6.81l.72-.72a.75.75 0 1 0-1.06-1.06z" clip-rule="evenodd"></path></svg></span><span class="ml-0 lg:ml-2 text-sm tracking-wide truncate capitalize hidden lg:block">Logout</span>
            </a>
          </div>
      </div>
    </div>
  </div>
  <div class="w-full h-full col-span-7">
    <div class="w-full h-dvw flex flex-col  w-full h-dvh overflow-y-auto p-4  bg-white dark:bg-gray-900">
      <div class="w-full h-dvw h-full flex flex-col bg-white dark:bg-gray-900">
        <div class="w-full flex items-center justify-between">
          <header class="py-4 flex items-start  flex-col">
            <div class="flex items-start gap-2">
              <div>
                <h1 class="text-xl font-bold">Gestion</h1>
                <h5 class="text-sm text-gray-600"></h5>
              </div>
            </div>
          </header>
          <div class="max-w-sm w-full flex items-center justify-center py-2 gap-2 z-50">
            <div class="w-full flex relative flex-col gap-1">
              <button>
                <input type="text" class="border rounded-lg px-3 py-2 mb-0 text-sm w-full outline-none focus:border-primary-500" placeholder="chercher" required value="" >
              </button>
            </div>
            <div>
              
            </div>
          </div>
        </div>
        <div class="flex flex-col overflow-y-auto h-full">
          <table class="min-w-full bg-white border undefined">
             <CrudUsers/>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<style scoped>
.logo {
    font-size: 35px; 
    font-weight: bold;
    color: rgb(0, 98, 255);
    padding-left: 20px;
}

.logo span{
    color:white;
}

@media (max-width: 768px) {
.logo {
    font-size: 10px;
}
}
</style>