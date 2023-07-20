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
import { defineProps } from 'vue';

const props = defineProps(['currencies']);
</script>

<style>
/* Ajoutez ici vos styles personnalisés si nécessaire */
</style>
