import TokenService from '../services/TokenService';
import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'

const routes: Array<RouteRecordRaw> = [
    {
        path: '/',
        component: () => import('@/layouts/AppMain.vue'),
        children: [
            {
                path: '',
                name: 'home',
                component: () => import('@/views/client/home/index.vue')
            },
        ]
    },
  {
    path: '/register',
    name: 'register',
    component: () => import("@/views/admin/auth/AppRegister.vue")
  },
  {
    path: '/login',
    name: 'login',
    component: () => import("@/views/admin/auth/AppLogin.vue")
  },
  {
    path: '/panel',
    component: () => import('@/layouts/admin/AppMain.vue'),
    children: [
        {
            path: '',
            name: 'dashboard',
            component: () => import('../views/home/dashboard.vue')
        },
    ]
  },
  {
    path: "/:pathMatch(.*)*",
    name: "NotFound",
    component: () => import('@/components/common/NotFound.vue'),
    meta: {
      requiresAuth: false
    }
  }
]

const router = createRouter({
  history: createWebHistory('/'),
  routes
});

router.beforeEach((to, from, next) => {
  const token: string|null = TokenService.getToken();

  if (token) {
    if (to.path === '/login') {
      next('/');
    }
  } else if (to.path !== '/login') {
    next('/login');
  }

  next();
})

export default router
