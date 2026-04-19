<script setup>
import Admin from '@/components/admin.vue';
import { useAuthStore } from '@/stores/AuthStore';
import { onMounted } from 'vue';
import { useRouter } from 'vue-router';
const auth = useAuthStore()
 const route =  useRouter()
onMounted(()=>{
  if (auth.user.role !== 'admin' ) {
      route.push({name:'home'})
  }
})
</script>

<template>
  <div>
     <Admin/>
  </div>
</template>
