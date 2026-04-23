<script setup>
import {ref, onMounted} from 'vue';
import { adminService } from '@/services/admin';

const users = ref([]);


// function searchf(){
//  users.value = users.value.filter(el =>{
//   //  console.log(el)
//     el?.firstName.include(search.value)

//  })
// }
// console.log(newdata.value)



onMounted( async () =>{
  users.value = await adminService.fetchUsers();
  // console.log(users.value)
});

const DeleteUser = async (id) => {
    if (confirm("Vous allez vraiment supprimer cet utilisateur ?")){
        adminService.deleteUser(id);
        adminService.fetchUsers();

    }
}

const UpdateUserr = async (user) => {
   adminService.updateUser(user)
     alert("Mis à jour ok!");
}
</script>
<template>

    <!-- component -->
<div class="text-gray-900 bg-blue-200">
    <div class="p-4 flex">
        <h1 class="text-3xl">Utilisateurs  {{ users.length }}</h1>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Nom</th>
                    <th class="text-left p-3 px-5">Prénom</th>
                    <th class="text-left p-3 px-5">Pseudo</th>
                    <th class="text-left p-3 px-5">Email</th>
                    <th class="text-left p-3 px-5">Genre</th>
                    <th class="text-left p-3 px-5">Role</th>
                    <th class="text-left p-3 px-5">Email_vérifié</th>
                    <th></th>
                </tr>
                <tr v-for="user in users" :key="user.id" class="border-b hover:bg-blue-100 bg-gray-100">
                    <td class="p-3 px-5">
                        <input type="text" v-model="user.firstName" class="bg-transparent border-b-2 border-gray-300 py-2">
                    </td>
                    <td class="p-3 px-5">
                        <input type="text" v-model="user.lastName" class="bg-transparent border-b-2 border-gray-300 py-2">
                    </td>
                    <td class="p-3 px-5">
                        <input type="text" v-model="user.login" class="bg-transparent border-b-2 border-gray-300 py-2">
                    </td>
                    <td class="p-3 px-5 text-gray-500">
                        {{ user.email }}
                    </td>
                    <td class="p-3 px-5 text-gray-500">
                        {{ user.gender }}
                    </td>
                    <td class="p-3 px-5">
                        <select v-model="user.role" class="bg-transparent border-b-2 border-gray-300 py-2">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </td>
                    <td class="p-3 px-5 text-gray-500">
                        {{ user.is_verified }}
                    </td>
                    <td class="p-3 px-5 flex justify-end">
                        <!-- <RouterLink to="/"> -->
                        <button type="button"
                           @click="UpdateUserr(user)" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save
                        </button>


                            <button @click="DeleteUser(user.id)"
                            type="button"
                            class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
</template>
