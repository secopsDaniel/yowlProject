import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import ResendMail from '@/views/ResendMail.vue'
import { useAuthStore } from '@/stores/AuthStore'


 const routes = [
    { path: '/login', component: LoginView },
    { path: '/register', component: RegisterView },
    { path: '/authMail', component: ResendMail, meta: { requiresAuth: true } },

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
