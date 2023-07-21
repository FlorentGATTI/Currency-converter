// router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import PairList from '@/views/PairList.vue';
import CurrencyList from '@/views/CurrencyList.vue';
import Logout from '@/views/Logout.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: PairList // Utilisez le composant PairList pour la route d'accueil
  },
  {
    path: '/currencies',
    name: 'CurrencyList',
    component: CurrencyList
  },
  {
    path: '/logout',
    name: 'Logout',
    component: Logout
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
