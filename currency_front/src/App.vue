<template>
  <v-container>
    <!-- Appel de la vue "PairList" en lui passant les paires de conversion en tant que prop -->
    <pair-list :pairs="pairs" />

    <!-- Appel de la vue "CurrencyList" en lui passant les devises en tant que prop -->
    <currency-list :currencies="currencies" />

    <!-- Appel de la vue "ConversionForm" en lui passant les devises en tant que prop -->
    <conversion-form :currencies="currencies" />
  </v-container>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import PairList from './views/PairList.vue';
import CurrencyList from './views/CurrencyList.vue';
import ConversionForm from './views/ConversionForm.vue';

const pairs = ref([]);
const currencies = ref([]);

onMounted(async () => {
  try {
    const responsePairs = await axios.get('http://localhost:8000/api/admin/pairs');
    console.log("data pairs", responsePairs);
    pairs.value = responsePairs.data.pairs;

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
