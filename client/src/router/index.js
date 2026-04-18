import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import ResendMail from '@/views/ResendMail.vue'
import { useAuthStore } from '@/stores/AuthStore'
import HomeView from '../views/HomeView.vue'
import AdminView from '../views/AdminView.vue'
import Profil_adView from '@/views/Profil_adView.vue'
import User_postView from '@/views/User_postView.vue'
import CreatePostView from '@/views/CreatePostView.vue'
import FormLinkView from '@/views/FormLinkView.vue'
import DetailPostView from '@/views/DetailPostView.vue'

 const routes = [
    { path: '/login', component: LoginView },
    { path: '/register', component: RegisterView },
    { path: '/authMail', component: ResendMail, meta: { requiresAuth: true } },
    {
      path: '/',
      name: 'home',
      component: HomeView,
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

  ]


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
  })
router.beforeEach(async (to, from, next) => {
  const authStore = useAuthStore();

  if (!authStore.user) {
    await authStore.fetchUser();
  }

  if (to.meta.requiresAuth && !authStore.isAuthenticated) {
        next("/login");
  } else {
       next();
  }
});






export default router
