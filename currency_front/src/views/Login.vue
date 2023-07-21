<template>
  <div class="container">
    <h1 class="my-4 mx-auto w-50">Connexion</h1>
    <form @submit.prevent="login" class="form-container w-50 mx-auto">
      <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail</label>
        <input v-model="email" type="email" class="form-control" id="email" required />
        <!-- Afficher un message d'erreur si l'e-mail est invalide -->
        <div class="invalid-feedback" v-if="!isEmailValid">Veuillez saisir une adresse e-mail valide.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input v-model="password" type="password" class="form-control" id="password" required />
        <!-- Afficher un message d'erreur si le mot de passe est vide -->
        <div class="invalid-feedback" v-if="!isPasswordValid">Veuillez saisir un mot de passe.</div>
      </div>
      <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
  </div>
</template>

<script>
import { ref } from "vue";
import axios from "axios";
import { router, isAdminLoggedIn } from "../router";

export default {
  setup() {
    const email = ref("");
    const password = ref("");

    const isEmailValid = ref(true);
    const isPasswordValid = ref(true);

    // ... (autres imports)

    const login = async () => {
      // ... (validation de l'email et du mot de passe)

      // Si tout est valide, vous pouvez continuer avec la logique de connexion
      if (isEmailValid.value && isPasswordValid.value) {
        try {
          const response = await axios.post("http://localhost:8000/api/admin/login", {
            // Utilisez une URL relative ici
            email: email.value,
            password: password.value,
          });

          // Vérifier la réponse de l'API pour savoir si la connexion a réussi
          if (response.data.success) {
            // La connexion a réussi, vous pouvez rediriger l'utilisateur vers la page d'accueil
            console.log("Connexion réussie !");
            isAdminLoggedIn.value = true;
            router.push('/')
          } else {
            // La connexion a échoué, affichez un message d'erreur à l'utilisateur
            console.log("Échec de la connexion : " + response.data.message);
          }
        } catch (error) {
          // Une erreur s'est produite lors de la requête HTTP
          console.error("Erreur lors de la connexion :", error);
        }
      }
    };

    return {
      email,
      password,
      isEmailValid,
      isPasswordValid,
      login,
    };
  },
};
</script>

<style>
/* Styles pour gérer le responsive */

/* Pour les petits écrans */
@media screen and (max-width: 600px) {
  .form-container {
    max-width: 100%;
    width: 100%;
    padding: 10px;
  }
}
</style>
