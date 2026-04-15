<template>
  <div class="page-auth">
    <div class="macarte">
      <h1 class="titre-violet">CONNEXION</h1>

      <form @submit.prevent="Login">
        <div class="champ">
          <label>Email</label>
          <input type="email" v-model="credential.email" placeholder="entrez votre mail">
        </div>

        <div class="champ">
          <label>Mot de passe</label>
          <input type="password" v-model="credential.password">
        </div>

        <button type="submit" class="mon-bouton">
          CONNEXION
        </button>
      </form>

      <div class="bas-de-page">
        <p>Vous n'avez pas de compte ? <a href="/register">S'inscrire</a></p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { authService } from '@/services/authService';

const credential = ref({
  email : '',
  password : ''
})


// function validate() {
//   if (credential.value.email=== "" || credential.value.password === "") return
    
// }

async function Login() {
  try {
    await authService.login(credential.value)
  } catch (error) {
    console.error(error)
  }
  
}
</script>

<style scoped>

.page-auth {
  background-color: #F0F2F9;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
}

.macarte {
  background: white;
  padding: 30px;
  border-radius: 20px;
  width: 100%;
  max-width: 350px;
  text-align: center;
  box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
}

.titre-violet {
  color: #8A70F5;
  margin-bottom: 25px;
}

.champ {
  text-align: left;
  margin-bottom: 15px;
}

.champ label {
  display: block;
  margin-bottom: 5px;
  font-size: 14px;
  color: grey;
}

.champ input {
  width: 100%;
  padding: 10px;
  border-radius: 10px;
  border: none;
  background-color: #E8EBF7;
  box-sizing: border-box;
}

.mon-bouton {
  background-color: #8A70F5;
  color: white;
  border: none;
  padding: 12px 30px;
  border-radius: 20px;
  width: 100%;
  cursor: pointer;
  font-weight: bold;
  margin-top: 10px;
}

.bas-de-page {
  margin-top: 20px;
  font-size: 13px;
}

.bas-de-page a {
  color: #8A70F5;
  text-decoration: none;
}

@media (max-width: 400px) {
  .ma-carte {
    padding: 20px;
  }
}
</style>
