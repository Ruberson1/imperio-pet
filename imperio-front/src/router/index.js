import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/clientes',
    name: 'Clientes',
    component: () => import(/* webpackChunkName: "clientes" */ '../views/Clientes.vue')
  },
  {
    path: '/agendamentos',
    name: 'Agendamentos',
    component: () => import(/* webpackChunkName: "agendamentos" */ '../views/Agendamentos.vue')
  },
  {
    path: '/servicos',
    name: 'Servicos',
    component: () => import(/* webpackChunkName: "servicos" */ '../views/Servicos.vue')
  },
  {
    path: '/cadastrar',
    name: 'Cadastro',
    component: () => import(/* webpackChunkName: "cadastro" */ '../views/Cadastro.vue')
  },
  {
    path: '/pets',
    name: 'pets',
    component: () => import(/* webpackChunkName: "pets" */ '../views/Pet.vue')
  }
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
