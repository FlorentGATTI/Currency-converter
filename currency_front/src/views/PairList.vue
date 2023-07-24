<template>
  <div class="container">
    <h1 class="my-4">Liste des paires</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Devise source</th>
          <th scope="col">Devise cible</th>
          <th scope="col">Nombre de requêtes</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Afficher chaque paire -->
        <tr v-for="pair in pairs" :key="pair.id">
          <td>
            <!-- Affichage normal si on n'est pas en mode édition -->
            <template v-if="!pair.editing"> {{ pair.source_currency.name }} ({{ pair.source_currency.code }}) </template>
            <!-- Affichage du select en mode édition -->
            <template v-else>
              <select v-model="pair.source_currency_id" class="form-select" required>
                <option v-for="currency in currencies" :key="currency.id" :value="currency.id">{{ currency.name }} ({{ currency.code }})</option>
              </select>
            </template>
          </td>
          <td>
            <!-- Même logique pour la devise cible -->
            <template v-if="!pair.editing"> {{ pair.target_currency.name }} ({{ pair.target_currency.code }}) </template>
            <template v-else>
              <select v-model="pair.target_currency_id" class="form-select" required>
                <option v-for="currency in currencies" :key="currency.id" :value="currency.id">{{ currency.name }} ({{ currency.code }})</option>
              </select>
            </template>
          </td>
          <td>{{ getRequestsCount(pair.id) }}</td>
          <td>
            <!-- Bouton Modifier si on n'est pas en mode édition -->
            <button v-show="!pair.editing" class="btn btn-primary me-3" @click="editPair(pair)">Modifier</button>
            <!-- Bouton Annuler si on est en mode édition -->
            <button v-show="pair.editing" class="btn btn-secondary me-3" @click="cancelEdit(pair)">Annuler</button>
            <!-- Bouton Enregistrer si on est en mode édition -->
            <button v-show="pair.editing" class="btn btn-success" @click="updatePair(pair)">Enregistrer</button>
            <!-- Bouton Supprimer si on n'est pas en mode édition -->
            <button v-show="!pair.editing" class="btn btn-danger" @click="deletePair(pair)">Supprimer</button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Formulaire pour ajouter une nouvelle paire -->
    <form @submit.prevent="addPair" class="mb-3">
      <div class="row align-items-end">
        <div class="col-md-4 mb-3">
          <label for="sourceCurrency">Devise source</label>
          <select v-model="newPair.source_currency_id" class="form-select" id="sourceCurrency" required>
            <option disabled value="">Sélectionnez une devise</option>
            <option v-for="currency in currencies" :key="currency.id" :value="currency.id">{{ currency.name }} ({{ currency.code }})</option>
          </select>
          <!-- Afficher le message d'erreur pour le champ Devise source s'il y a une erreur -->
          <div v-if="newPair.errors.source_currency_id" class="text-danger">
            {{ newPair.errors.source_currency_id[0] }}
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="targetCurrency">Devise cible</label>
          <select v-model="newPair.target_currency_id" class="form-select" id="targetCurrency" required>
            <option disabled value="">Sélectionnez une devise</option>
            <option v-for="currency in currencies" :key="currency.id" :value="currency.id">{{ currency.name }} ({{ currency.code }})</option>
          </select>
          <!-- Afficher le message d'erreur pour le champ Devise cible s'il y a une erreur -->
          <div v-if="newPair.errors.target_currency_id" class="text-danger">
            {{ newPair.errors.target_currency_id[0] }}
          </div>
        </div>
        <div class="col-md-4 mb-3 me-auto d-flex flex-row-reverse">
          <button type="submit" class="btn btn-success w-50">Ajouter</button>
        </div>
      </div>
    </form>
  </div>
</template>


<script setup>
import { ref, reactive, watchEffect, defineProps, onMounted } from "vue";
import axios from "axios";

const apiUrl = "http://localhost:8000/api/admin/pairs";

// Définir newPair comme une référence réactive avec les erreurs pour chaque champ
const newPair = reactive({
  source_currency_id: null,
  target_currency_id: null,
  errors: {
    source_currency_id: null,
    target_currency_id: null,
  },
});

// Récupérer les propriétés pairs et currencies depuis les props en utilisant defineProps()
const { pairs, currencies } = defineProps(["pairs", "currencies"]);

// Méthode pour ajouter une nouvelle paire
const addPair = async () => {
  // Valider les champs manuellement
  if (!newPair.source_currency_id || !newPair.target_currency_id) {
    console.error("Veuillez sélectionner une devise source et une devise cible.");
    return;
  }

  // Récupérer les devises sélectionnées pour la nouvelle paire
  const sourceCurrencyId = newPair.source_currency_id;
  const targetCurrencyId = newPair.target_currency_id;

  try {
    // Envoyer la requête POST avec les champs requis
    const response = await axios.post(apiUrl, {
      currency_from: sourceCurrencyId,
      currency_to: targetCurrencyId,
      rate: 1.0, // Remplacez cette valeur par le taux de conversion réel, si nécessaire
    });

    if (response.data.success) {
      // Ajouter la nouvelle paire à la liste des paires directement en modifiant la référence réactive
      pairs.push({
        id: response.data.pair.id,
        source_currency_id: sourceCurrencyId,
        target_currency_id: targetCurrencyId,
        editing: false,
        source_currency: currencies.find((currency) => currency.id === sourceCurrencyId),
        target_currency: currencies.find((currency) => currency.id === targetCurrencyId),
      });

      // Réinitialiser les valeurs pour le formulaire d'ajout de nouvelle paire
      newPair.source_currency_id = null;
      newPair.target_currency_id = null;
      newPair.errors.source_currency_id = null;
      newPair.errors.target_currency_id = null;
    }
  } catch (error) {
    handleApiErrors(error);
  }
};

// Méthode pour mettre à jour une paire
const updatePair = async (pair) => {
  try {
    const response = await axios.put(`${apiUrl}/${pair.id}`, {
      currency_from: pair.source_currency_id,
      currency_to: pair.target_currency_id,
    });

    if (response.data.success) {
      // Mettre à jour les valeurs dans la liste des paires
      pair.source_currency = currencies.find((currency) => currency.id === pair.source_currency_id);
      pair.target_currency = currencies.find((currency) => currency.id === pair.target_currency_id);
      pair.editing = false;
    }
  } catch (error) {
    handleApiErrors(error);
  }
};

// Méthode pour supprimer une paire
const deletePair = async (pair) => {
  try {
    const response = await axios.delete(`${apiUrl}/${pair.id}`);
    if (response.data.success) {
      // Supprimer la paire de la liste des paires directement en modifiant la référence réactive
      const index = pairs.value.indexOf(pair);
      if (index !== -1) {
        pairs.value.splice(index, 1);
      }
    }
  } catch (error) {
    console.error("Erreur lors de la suppression de la paire :", error);
  }
};

// Méthode pour gérer les erreurs de l'API
const handleApiErrors = (error) => {
  if (error.response && error.response.data && error.response.data.errors) {
    const validationErrors = error.response.data.errors;
    if (validationErrors.source_currency_id) {
      newPair.errors.source_currency_id = validationErrors.source_currency_id;
    }
    if (validationErrors.target_currency_id) {
      newPair.errors.target_currency_id = validationErrors.target_currency_id;
    }
  } else {
    console.error("Erreur lors de l'interaction avec l'API :", error);
  }
};

// Propriété calculée pour obtenir le nombre de requêtes effectuées pour une paire
const getRequestsCount = (pairId) => {
  // ... votre implémentation pour obtenir le nombre de requêtes ...
  // Remarque : vous devez implémenter cette fonction selon votre logique métier.
  // À ce stade, cette fonction est laissée vide car elle n'était pas présente dans le code initial.
};

// Méthode pour mettre une paire en mode édition
const editPair = (pair) => {
  pair.editing = true;
};

// Méthode pour annuler l'édition d'une paire
const cancelEdit = (pair) => {
  pair.editing = false;
};

// Fonction pour recharger les paires depuis l'API et mettre à jour la liste
const reloadPairs = async () => {
  try {
    const response = await axios.get(apiUrl);
    if (response.data.success) {
      // Mettre à jour la liste des paires directement en modifiant la référence réactive
      pairs.value = response.data.pairs;
    }
  } catch (error) {
    console.error("Erreur lors du rechargement des paires :", error);
  }
};

// Utiliser watchEffect pour surveiller les changements dans la liste pairs et mettre à jour automatiquement
watchEffect(async () => {
  try {
    // Requête pour récupérer les paires mises à jour depuis l'API
    const response = await axios.get(apiUrl);
    if (response.data.success) {
      // Mettre à jour la liste des paires directement en modifiant la référence réactive
      pairs.value = response.data.pairs;
    }
  } catch (error) {
    console.error("Erreur lors du rechargement des paires :", error);
  }
});

// Mettre en place un rechargement initial des paires au moment du montage du composant
onMounted(() => {
  reloadPairs();
});
</script>

<style>
/* ... vos styles ... */
</style>
