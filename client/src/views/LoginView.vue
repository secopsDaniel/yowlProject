<script setup>
import { ref } from 'vue'
import { useAuthStore } from '@/stores/AuthStore'
import { useRouter } from 'vue-router'
const errorServer = ref()
const credential = ref({
  email : '',
  password : ''
})
const router = useRouter()
const error = ref({
  email : '',
  password : ''
})

 const auth  = useAuthStore();

function validatedata (){
  error.value = {
  email : '',
  password : ''
}
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/;
     if (credential.value.email.trim() == '' || emailRegex.test(credential.value.email) == false) {
      error.value.email = 'Adresse email invalide'
     }

     if(credential.value.password.trim().length ==0){
      error.value.password = "password requis !"
     }

     // check si erreurs
    return !Object.values(error.value).some(el => el !== '');

}

async function Login() {
  if (!validatedata()) return
  try {

    await auth.login(credential.value)
    if(!auth.errors){
      credential.value = {
        email : '',
        password : ''
}
    router.push('/')
    }
  } catch  {
    errorServer.value = auth.errors;
    console.log(errorServer)
  }

}
</script>



<template>
  <div class="page-auth">
    <div class="macarte">
      <h1 class="titre-violet">CONNEXION</h1>

      <form @submit.prevent="Login">
            <div v-if="auth.isAuthenticated">
            email :{{ auth.user.email }}
            </div>
        <div class="champ">
          <label>Email</label>
          <label class="error">{{ error.email }}</label>
          <input type="email" v-model="credential.email" placeholder="entrez votre mail">
        </div>

        <div class="champ">
          <label>Mot de passe</label>
          <label class="error">{{ error.password }}</label>
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

.champ label:first-child  {
  display: block;
  margin-bottom: 5px;
  font-size: 14px;
  font-weight: bold;
  color: grey;
}

.error{
   display: block;
  margin-bottom: 8px;
    margin-top: 5px;
  font-size: 14px;
  color: red;
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
