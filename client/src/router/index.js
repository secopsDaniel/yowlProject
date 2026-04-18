import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AdminView from '../views/AdminView.vue'
import Profil_adView from '@/views/Profil_adView.vue'
import User_postView from '@/views/User_postView.vue'
import CreatePostView from '@/views/CreatePostView.vue'
import FormLinkView from '@/views/FormLinkView.vue'
import DetailPostView from '@/views/DetailPostView.vue'
import IndexView from '@/views/indexView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/home',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/',
      name: 'index',
      component: IndexView,
    },
    {
      path: '/profil_ad',
      name: 'profil_admin',
      component: Profil_adView,
    },
    {
      path: '/admin',
      name: 'admin',
      component: AdminView,
    },
    ,
    {
      path: '/Profil_user',
      name: 'profil_us',
      component: Profil_adView,
    },
    {
      path: '/User_post',
      name: 'post_user',
      component: User_postView,
    },
    {
      path: '/detailpost',
      name: 'detail',
      component: DetailPostView,
    },
    {
      path: '/create',
      name: 'create-post',
      component: CreatePostView,
    },
    {
      path: '/formlink',
      name: 'frmlink',
      component: FormLinkView,
    },
    {
      path: '/VerifyEmail',
      name: 'Vf',
      component: () => import('../views/VerifyEmailView.vue'),
    }
  ],
})

export default router
