<script setup>
import Info_User from '@/components/Info_User.vue';
import SideBar from '@/components/SideBar.vue';
import User_Nav from '@/components/User_Nav.vue';
</script>
<template>
    <User_Nav/>
    <div class="flex h-screen">
        <SideBar/>
        <main class="">
    <Info_User/>
        </main>
    </div>
</template>