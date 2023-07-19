<template>
  <div>
    <CurrencyList :currencies="currencies" />
    <PairList :pairs="pairs" />
    <ConversionForm :currencies="currencies" />
  </div>
</template>

<script setup>
import { ref } from 'vue';
import CurrencyList from '@/views/CurrencyList.vue';
import PairList from '@/views/PairList.vue';
import ConversionForm from '@/views/ConversionForm.vue';

const currencies = ref([]); // Tableau pour stocker les devises
const pairs = ref([]); // Tableau pour stocker les paires de conversion
</script>
