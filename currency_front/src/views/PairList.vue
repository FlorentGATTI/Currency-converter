<template>
  <div class="container">
    <h1 class="my-4">Liste des paires</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Devise source</th>
          <th scope="col">Devise cible</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Afficher chaque paire -->
        <tr v-for="pair in pairs" :key="pair.id">
          <td>{{ pair.source_currency.name }} ({{ pair.source_currency.code }})</td>
          <td>{{ pair.target_currency.name }} ({{ pair.target_currency.code }})</td>
          <td>
            <button class="btn btn-primary me-3" @click="editPair(pair)">Modifier</button>
            <button class="btn btn-danger" @click="deletePair(pair)">Supprimer</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const { pairs } = defineProps(['pairs']); // Utilisez defineProps pour recevoir les props de la route

// Méthode pour gérer l'édition d'une paire
const editPair = (pair) => {
  // Implémentez la logique pour l'édition ici
  console.log('Éditer la paire:', pair);
};

// Méthode pour gérer la suppression d'une paire
const deletePair = (pair) => {
  // Implémentez la logique pour la suppression ici
  console.log('Supprimer la paire:', pair);
};
</script>

<style>
/* Ajoutez ici vos styles personnalisés si nécessaire */
</style>
