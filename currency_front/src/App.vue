<template>
  <v-container>
    <h1>Liste des paires de conversion</h1>
    <v-list>
      <v-list-item v-for="pair in pairs" :key="pair.id">
        <v-list-item-content>
          <v-list-item-title>{{ pair.currency_from }} ➔ {{ pair.currency_to }} ({{ pair.rate }})</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-container>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const pairs = ref([]);

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8000/api/pairs');
    pairs.value = response.data; // Assurez-vous que le format des données est correct
  } catch (error) {
    console.error('Erreur lors de la récupération des données:', error);
  }
});
</script>
