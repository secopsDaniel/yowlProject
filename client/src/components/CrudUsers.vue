<script setup>
import { kyInstance } from '@/api/kyInstance';
import {ref, onMounted} from 'vue';

const users = ref([]);

const fetchUsers = async () => {
    try {
        const response = await kyInstance.get('admin/users').json();
        console.log("regarde ici pardon! : ", response);
        users.value = response;
    } catch (error) {
        console.error("Il y a une erreur : ", error)
    }
}

onMounted(fetchUsers);

const DeleteUser = async (id) => {
    if (confirm("Vous allez vraiment supprimer cet utilisateur ?")){
        try{
            await kyInstance.delete(`admin/users/${id}`);
            await fetchUsers();
        } catch (error){
            console.error("Il y a une erreur", error);
        }
    }
}

// const UpdateUserr = async (users) => {
//     try {
//         await kyInstance.put(`admin/users/${user.id}`, {
//             json: user
//         });
//         alert("Mis à jour ok!")
//     }catch(error){
//         console.error("Il y a une erreur sur la mise à jour", error)
//     }
// }
</script>
<template>
    <!-- component -->
<div class="text-gray-900 bg-blue-200">
    <div class="p-4 flex">
        <h1 class="text-3xl">Utilisateurs</h1>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Name</th>
                    <th class="text-left p-3 px-5">Email</th>
                    <th class="text-left p-3 px-5">birthday</th>
                    <!-- <th class="text-left p-3 px-5">Role</th> -->
                    <th></th>
                </tr>
                <tr v-for="user in users" :key="user.id" class="border-b hover:bg-blue-100 bg-gray-100">
                    <td class="p-3 px-5">
                        <input type="text" v-model="user.login" class="bg-transparent border-b-2 border-gray-300 py-2">
                    </td>
                    <td class="p-3 px-5">
                        <input type="text" v-model="user.email" class="bg-transparent border-b-2 border-gray-300 py-2">
                    </td>
                    <td class="p-3 px-5">
                        <input type="text" v-model="user.birthday" class="bg-transparent border-b-2 border-gray-300 py-2">
                    </td>
                    <td class="p-3 px-5">
                        <!-- <select value="user.role" class="bg-transparent border-b-2 border-gray-300 py-2">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select> -->
                    </td>
                    <td class="p-3 px-5 flex justify-end">
                        <button type="button"
                            class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
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