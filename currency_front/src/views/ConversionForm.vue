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
  const selectedCurrencyFromObj = currencies.find(currency => currency.code === selectedCurrencyFrom.value);
  const selectedCurrencyToObj = currencies.find(currency => currency.code === selectedCurrencyTo.value);

  if (selectedCurrencyFromObj && selectedCurrencyToObj) {
    const rateFromTo = pairs.find(pair => pair.currency_from.code === selectedCurrencyFrom.value && pair.currency_to.code === selectedCurrencyTo.value);
    const rateToFrom = pairs.find(pair => pair.currency_from.code === selectedCurrencyTo.value && pair.currency_to.code === selectedCurrencyFrom.value);

    if (rateFromTo && rateToFrom) {
      const amountNum = parseFloat(amount.value);
      if (!isNaN(amountNum)) {
        const conversionResultFromTo = amountNum * parseFloat(rateFromTo.rate);
        const conversionResultToFrom = amountNum / parseFloat(rateToFrom.rate);
        conversionResult.value = `${conversionResultFromTo.toFixed(2)} (${selectedCurrencyToObj.name}) / ${conversionResultToFrom.toFixed(2)} (${selectedCurrencyFromObj.name})`;
      } else {
        conversionResult.value = 'Veuillez entrer un montant valide.';
      }
    } else {
      conversionResult.value = 'Impossible de trouver le taux de conversion.';
    }
  } else {
    conversionResult.value = 'Veuillez sélectionner des devises valides.';
  }
};
</script>

<style>
/* Ajoutez ici vos styles personnalisés si nécessaire */
</style>
