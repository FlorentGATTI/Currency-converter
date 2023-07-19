<template>
  <div class="container">
    <h1 class="my-4">Effectuer une conversion</h1>
    <form @submit.prevent="convertCurrency" class="my-4">
      <div class="mb-3">
        <label for="from" class="form-label">De :</label>
        <select v-model="selectedCurrencyFrom" class="form-select">
          <option v-for="currency in currencies" :value="currency.code" :key="currency.id">
            {{ currency.name }} ({{ currency.code }})
          </option>
        </select>
      </div>

      <div class="mb-3">
        <label for="to" class="form-label">Vers :</label>
        <select v-model="selectedCurrencyTo" class="form-select">
          <option v-for="currency in currencies" :value="currency.code" :key="currency.id">
            {{ currency.name }} ({{ currency.code }})
          </option>
        </select>
      </div>

      <div class="mb-3">
        <label for="amount" class="form-label">Montant :</label>
        <input type="number" v-model="amount" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Convertir</button>
    </form>

    <!-- Afficher le résultat de la conversion -->
    <div v-if="conversionResult" class="alert alert-success mt-4">
      {{ amount }} {{ selectedCurrencyFrom }} ➔ {{ conversionResult }} {{ selectedCurrencyTo }}
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps(['currencies']);

const selectedCurrencyFrom = ref('');
const selectedCurrencyTo = ref('');
const amount = ref('');
const conversionResult = ref('');

const convertCurrency = () => {
  // Mettre en œuvre la logique pour effectuer la conversion ici
  // Vous pouvez utiliser des appels API pour communiquer avec l'API Laravel
  // et effectuer la conversion côté serveur
  // Mettez à jour la propriété 'conversionResult' avec le résultat de la conversion
};
</script>

<style>
/* Ajoutez ici vos styles personnalisés si nécessaire */
</style>
