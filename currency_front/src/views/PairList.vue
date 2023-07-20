<template>
  <div class="container">
    <h1 class="my-4">Liste des paires de conversion</h1>
    <ul class="list-group">
      <!-- Afficher chaque paire de conversion -->
      <li v-for="pair in pairs" :key="pair.id" class="list-group-item">
        {{ pair.currency_from }} ➔ {{ pair.currency_to }} ({{ pair.rate }})
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
