import { createApp } from 'vue';
import App from './App.vue';
import { router } from './router'; // Importez le router depuis le chemin correct

// Importez les autres composants utilisés dans les routes
import PairList from './views/PairList.vue';
import CurrencyList from './views/CurrencyList.vue';
import Logout from './views/Logout.vue';
import Login from './views/Login.vue';

// Créez l'application Vue
const app = createApp(App);

// Utilisez le router
app.use(router);

// Déclarez les autres composants utilisés dans les routes
app.component('PairList', PairList);
app.component('CurrencyList', CurrencyList);
app.component('Logout', Logout);
app.component('Login', Login);

// Montez l'application Vue
app.mount('#app');
