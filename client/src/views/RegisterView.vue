<template>
  <div class="page-auth">
    <div class="ma-carte">
      <h1 class="titre-violet">INSCRIPTION</h1>

      <form @submit.prevent="submitData">
        <div class="champ">
          <label>Nom : </label>
          <input type="text" v-model="credentials.firstName" required="">
        </div>

        <div class="champ">
          <label>prenom:</label>
          <input type="text" v-model="credentials.lastName" required="">
        </div>

        <div class="champ">
          <label>login:</label>
          <input type="text" v-model="credentials.login" required="">
        </div>
        <div class="champ">
          <label>Email:</label>
          <input type="email" v-model="credentials.email" required="">
        </div>
        <div class="champ">
          <label>Date de naissance</label>
          <input type="date" v-model="credentials.birthday" required>
        </div>

        <div class="champ">
          <label>Mot de passe</label>
          <input type="password" v-model="credentials.password" >
        </div>

        <div class="champ">
          <label>Confirmer mot de passe</label>
          <input type="password" v-model="credentials.password_confirmation" required="">
        </div>

        <button type="submit" :class="validerInscription ? 'mon-bouton' : 'mon-disable' "  :disabled="!validerInscription">S'INSCRIRE</button>
      </form>

      <div class="bas-de-page">
        <p>Déjà un compte ? <a href="/login">Se connecter</a></p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { authService } from '@/api/authService';
import { ref } from 'vue'
const error = ref({
       firstName : '',
       lastName : '',
        login : '',
        email : '',
        password : '',
        password_confirmation : '',
        gender : '',
        birthday : ''
})

const credentials = ref({
       firstName : '',
       lastName : '',
        login : '',
        email : '',
        password : '',
        password_confirmation : '',
        gender : '',
        birthday : ''
})

function validerInscription() {
  if (credentials.value.find(el =>el.length == 0)) {
     return false
}

function submitData() {

  try {
    const 

  } catch (error) {

  }



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

.mon-disable {
  background-color: gray;
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
