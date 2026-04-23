<script setup>
import Allpostuser from '@/components/allpostuser.vue';
import SideBar from '@/components/SideBar.vue';
import User_Nav from '@/components/User_Nav.vue';
</script>
<template>
    <User_Nav/>
    <div class="flex h-screen">
        <SideBar/>
        <main class="">
    <Allpostuser/>
        </main>
    </div>
</template>