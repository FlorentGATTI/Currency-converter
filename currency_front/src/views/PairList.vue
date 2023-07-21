<template>
  <div class="container">
    <h1 class="my-4">Liste des paires</h1>
    <ul class="list-group">
      <!-- Afficher chaque paire -->
      <li v-for="pair in pairs" :key="pair.id" class="list-group-item">
        {{ pair.source_currency.name }} ({{ pair.source_currency.code }}) -> {{ pair.target_currency.name }} ({{ pair.target_currency.code }})
      </li>
    </ul>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const { pairs } = defineProps(['pairs']); // Utilisez defineProps pour recevoir les props de la route
</script>

<style>
/* Ajoutez ici vos styles personnalisés si nécessaire */
</style>
