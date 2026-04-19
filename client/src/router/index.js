import { createRouter, createWebHistory } from 'vue-router'
import Dashbord from '../views/Dashbord.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: 'dashboard'
    },
    {
      path: '/dashboard',
      name: 'AdminPage',
      component: Dashbord,
    }
  ],
})

export default router
