import { createRouter, createWebHistory } from 'vue-router';
import CurrencyList from '@/views/CurrencyList.vue';
import ConversionList from '@/views/ConversionForm.vue';

const routes = [
  {
    path: '/', // Le chemin de la route
    name: 'home', // Le nom de la route
    component: CurrencyList, // Le composant à afficher pour cette route (ici, CurrencyList)
  },
  {
    path: '/conversions', // Le chemin de la route
    name: 'conversions', // Le nom de la route
    component: ConversionList, // Le composant à afficher pour cette route (ici, ConversionList)
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;
