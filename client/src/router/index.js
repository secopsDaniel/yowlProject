import { createRouter, createWebHistory } from 'vue-router'
import DashbordView from '../views/DashbordView.vue'
import UpdateView from '@/views/UpdateView.vue'

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
      component: DashbordView,
    },
    {
      path: '/updateUsers',
      name: 'Update Users',
      component: UpdateView,
    }
  ],
})

export default router
