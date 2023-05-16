import { createRouter, createWebHashHistory } from 'vue-router'

// Definindo as rotas da aplicação
const routes = [
  {
    path: '/',
    name: 'home',
    component: () => import('../views/HomeView.vue')
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('../views/LoginView.vue')
  },
  {
    path: '/perfil',
    name: 'perfil',
    component: () => import('../views/PerfilView.vue')
  },
  {
    path: '/tutorial',
    name: 'tutorial',
    component: () => import('../views/TutorialView.vue')
  },
  {
    path: '/course',
    name: 'course',
    component: () => import('../views/CourseView.vue')
  },
]

// Criando o router
const router = createRouter({
  // Definindo o tipo de histórico
  history: createWebHashHistory(),
  // Passando as rotas definidas
  routes
})
export default router
