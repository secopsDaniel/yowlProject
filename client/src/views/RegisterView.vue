<template>
  <div class="page-auth">
    <div class="ma-carte">
      <h1 class="titre-violet">INSCRIPTION</h1>

      <form @submit.prevent="validerInscription">
        <div class="champ">
          <label>Pseudo</label>
          <input type="text" v-model="pseudo">
        </div>

        <div class="champ">
          <label>Email</label>
          <input type="email" v-model="email">
        </div>

        <div class="champ">
          <label>Date de naissance</label>
          <input type="date" v-model="dateNaissance">
        </div>

        <div class="champ">
          <label>Mot de passe</label>
          <input type="password" v-model="pass1">
        </div>

        <div class="champ">
          <label>Confirmer mot de passe</label>
          <input type="password" v-model="pass2">
        </div>

        <button type="submit" class="mon-bouton">S'INSCRIRE</button>
      </form>

      <div class="bas-de-page">
        <p>Déjà un compte ? <a href="/login">Se connecter</a></p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
const pseudo = ref('')
const email = ref('')
const dateNaissance = ref('')
const pass1 = ref('')
const pass2 = ref('')

function validerInscription() {
  if (pass1.value !== pass2.value) {
    alert("Erreur : Les deux mots de passe ne sont pas pareils !");
  } else {
    alert("C'est bon ! Inscription de " + pseudo.value);
  }
}
</script>

<style scoped>
.page-auth {
  background-color: #F0F2F9;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

.ma-carte {
  background: white;
  padding: 25px;
  border-radius: 20px;
  width: 100%;
  max-width: 380px;
  text-align: center;
}

.titre-violet {
  color: #8A70F5;
  margin-bottom: 20px;
}

.champ {
  text-align: left;
  margin-bottom: 12px;
}

.champ label {
  display: block;
  font-size: 13px;
  color: #666;
  margin-bottom: 4px;
}

.champ input {
  width: 100%;
  padding: 8px 12px;
  border-radius: 8px;
  border: none;
  background-color: #E8EBF7;
  box-sizing: border-box;
}

.mon-bouton {
  background-color: #8A70F5;
  color: white;
  border: none;
  padding: 12px;
  border-radius: 20px;
  width: 100%;
  font-weight: bold;
  margin-top: 15px;
  cursor: pointer;
}

.bas-de-page a {
  color: #8A70F5;
  text-decoration: none;
}
</style>
