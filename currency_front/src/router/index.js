import { createRouter, createWebHistory } from 'vue-router';
import PairList from '@/views/PairList.vue';
import CurrencyList from '@/views/CurrencyList.vue';
import Logout from '@/views/Logout.vue';
import Login from '@/views/Login.vue';
import { ref } from 'vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: PairList,
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/currencies',
    name: 'CurrencyList',
    component: CurrencyList,
  },
  {
    path: '/logout',
    name: 'Logout',
    component: Logout,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// Variable d'état pour suivre l'état de connexion
const isAdminLoggedIn = ref(false);

// Redirection conditionnelle
router.beforeEach((to, from, next) => {
  if (to.name !== 'Login' && !isAdminLoggedIn.value) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    next({ name: 'Login' });
  } else if (to.name === 'Login' && isAdminLoggedIn.value) {
    // Rediriger vers la page d'accueil si l'utilisateur est déjà connecté
    next({ name: 'Home' });
  } else {
    next(); // Autoriser l'accès à la route
  }
});

export { router, isAdminLoggedIn }; // Export the router and isAdminLoggedIn variables
