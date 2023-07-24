<template>
  <div class="container">
    <h1 class="my-4 mx-auto w-50">Déconnexion</h1>
    <button @click="logout" class="btn btn-primary">Se déconnecter</button>
  </div>
</template>

<script setup>
import axios from 'axios';
import { router, isAdminLoggedIn} from '../router';

const logout = async () => {
  try {
    const response = await axios.post('http://localhost:8000/api/admin/logout');

    if (response.data.success) {
      isAdminLoggedIn.value = false;
      router.push('/login');
    } else {
      console.log('Erreur lors de la déconnexion : ' + response.data.message);
    }
  } catch (error) {
    console.error('Erreur lors de la déconnexion :', error);
  }
};
</script>

<style>

/* Pour les petits écrans */
@media screen and (max-width: 600px) {
  .form-container {
    max-width: 100%;
    width: 100%;
    padding: 10px;
  }
}
</style>
