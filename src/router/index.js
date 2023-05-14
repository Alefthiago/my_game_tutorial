import { createRouter, createWebHashHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'home',
    component: () => import(/* webpackChunkName: "about" */ '../views/HomeView.vue'),

    
  },
  {
    path: "/login",
    name: "login",
    component: () => import("../views/LoginView.vue")
  },
  {
    path: "/perfil",
    name: "perfil",
    component: () => import("../views/PerfilView.vue")
  },
  {
    path: "/games",
    name: "games",
    component: () => import("../views/GamesView.vue")
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  const userAuth = localStorage.getItem("auth-token");
  if (!userAuth && to.name !== "login" && to.name !== "home") {
    alert("Faça o login!");
    next({ name: "login"})
  } else {
    next();
  }
})
export default router
