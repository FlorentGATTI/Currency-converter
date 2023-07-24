<template>
  <v-container>
    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">Conversion App</a>

        <!-- Toggler/collapsible Button -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link to="/" class="nav-link" active-class="active">
                Accueil
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/currencies" class="nav-link" active-class="active">
                Liste des devises
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/logout" class="nav-link" active-class="active">
                Logout
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Afficher la liste des paires de conversion sur la page d'accueil -->
    <router-view :pairs="pairs" :currencies="currencies" />

  </v-container>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const pairs = ref([]);
const currencies = ref([]);

onMounted(async () => {
  try {
    // Récupérer les paires de conversion depuis l'API
    const responsePairs = await axios.get('http://localhost:8000/api/admin/pairs');
    pairs.value = responsePairs.data.pairs;

    // Récupérer les devises depuis l'API
    const responseCurrencies = await axios.get('http://localhost:8000/api/admin/currencies');
    currencies.value = responseCurrencies.data.currencies;
  } catch (error) {
    console.error('Erreur lors de la récupération des données:', error);
  }
});
</script>


<style>
/* Ajoutez ici vos styles personnalisés si nécessaire */
</style>
