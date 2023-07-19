import { createRouter, createWebHistory } from 'vue-router';

// Importez ici les composants que vous utilisez pour les routes
import CurrencyList from '@/views/CurrencyList.vue';
import ConversionList from '@/views/ConversionForm.vue';

// Définissez ici toutes vos routes en utilisant le format RouteRecordRaw
const routes = [
  {
    path: '/', // Le chemin de la route
    name: 'home', // Le nom de la route
    component: CurrencyList, // Le composant à afficher pour cette route (ici, CurrencyList)
  },
  {
    path: '/conversions', // Le chemin de la route
    name: 'conversions', // Le nom de la route
    // Utilisez @ts-ignore pour ignorer l'erreur liée à l'importation de ConversionList
    // @ts-ignore
    component: ConversionList, // Le composant à afficher pour cette route (ici, ConversionList)
  },
  // Ajoutez d'autres routes selon vos besoins
];

// Créez le routeur en utilisant les routes définies ci-dessus
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;
