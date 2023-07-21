<template>
  <div class="container">
    <h1 class="my-4">Liste des devises</h1>
    <ul class="list-group">
      <!-- Afficher chaque devise -->
      <li v-for="currency in currencies" :key="currency.id" class="list-group-item">
        {{ currency.name }} ({{ currency.code }})
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const currencies = ref([]);

onMounted(async () => {
  try {
    const responseCurrencies = await axios.get('http://localhost:8000/api/admin/currencies');
    console.log("data currencies", responseCurrencies);
    currencies.value = responseCurrencies.data.currencies;
  } catch (error) {
    console.error('Erreur lors de la récupération des données:', error);
  }
});
</script>

<style>
/* Ajoutez ici vos styles personnalisés si nécessaire */
</style>
