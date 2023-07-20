<template>
  <div class="container">
    <h1>Liste des paires de conversion</h1>
    <ul class="list-group">
      <li v-for="pair in pairs" :key="pair.id" class="list-group-item">
        <div v-if="pair.source_currency && pair.target_currency">
          {{ pair.source_currency.name }} ➔ {{ pair.target_currency.name }} ({{ pair.rate }})
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps(['pairs']);
</script>

<style>
/* Ajoutez ici vos styles personnalisés si nécessaire */
</style>
