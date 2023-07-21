import { createApp } from 'vue';
import App from '@/App.vue';
import { router } from './router'; // Importez le router depuis le chemin correct

const app = createApp(App);

app.use(router);

app.mount('#app');
