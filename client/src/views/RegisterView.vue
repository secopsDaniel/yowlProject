<script setup>
import { useAuthStore } from '@/stores/AuthStore'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const errorServer = ref()
const router = useRouter()
const auth = useAuthStore()

let credentials = ref({
       firstName : '',
       lastName : '',
        login : '',
        email : '',
        password : '',
        password_confirmation : '',
        gender : '',
        birthday : ''
})

const errorCred = ref({
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

    errorCred.value = {
        firstName: '',
        lastName: '',
        login: '',
        email: '',
        password: '',
        password_confirmation: '',
        gender: '',
        birthday: ''
    };

    const birthDate = new Date(credentials.value.birthday);
    const today = new Date();
    let age = today.getFullYear() - birthDate.getFullYear();

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/;

    // FIRST NAME
    if (credentials.value.firstName.trim().length < 3) {
        errorCred.value.firstName = 'Nom invalide (min 3 caractères)';
    }

    // LAST NAME
    if (credentials.value.lastName.trim().length < 3) {
        errorCred.value.lastName = 'Prénom invalide (min 3 caractères)';
    }

    // LOGIN
    if (credentials.value.login.trim().length < 3) {
        errorCred.value.login = 'Pseudo invalide (min 3 caractères)';
    }

    // EMAIL
    if (!emailRegex.test(credentials.value.email)) {
        errorCred.value.email = 'Email invalide';
    }

    // PASSWORD
    if (credentials.value.password.length < 8 || credentials.value.password.length > 25) {
        errorCred.value.password = 'Mot de passe entre 8 et 25 caractères';
    }

    // CONFIRM PASSWORD
    if (credentials.value.password_confirmation !== credentials.value.password) {
        errorCred.value.password_confirmation = 'Les mots de passe ne correspondent pas';
    }

    // AGE
    if (age < 13 || age > 35) {
        errorCred.value.birthday = "Âge non autorisé (13–35 ans)";
    }
    return !Object.values(errorCred.value).some(el => el !== '');
}


async function Register() {
  if(!validerInscription()) return
      try {
        await auth.register(credentials.value);
        if (!auth.errors ) {
          credentials.value = {
          firstName : '',
          lastName : '',
           login : '',
           email : '',
           password : '',
           password_confirmation : '',
           gender : '',
           birthday : ''
}

          router.push('/login')
        }

       } catch {
          console.log(auth.errors)
        }


}

</script>



<template>
  <div class="page-auth">
    <div class="ma-carte">
      <h1 class="titre-violet">INSCRIPTION</h1>

      <form @submit.prevent="Register" method="post" >
        <div class="champ">

          <div v-if="auth.errors" class="error">
              {{ errorServer}}
            </div>

          <label>Nom : </label>
          <label class="error">{{ errorCred.firstName }}</label>
          <input type="text" v-model="credentials.firstName" >
        </div>

        <div class="champ">
          <label>prenom:</label>
          <label class="error">{{ errorCred.lastName }}</label>
          <input type="text" v-model="credentials.lastName">
        </div>

        <div class="champ">
          <label>Pseudo:</label>
          <label class="error">{{ errorCred.login }}</label>
          <input type="text" v-model="credentials.login" >
        </div>
        <div class="champ">
          <label>Email:</label>
          <label class="error">{{ errorCred.email }}</label>
          <input type="email" v-model="credentials.email" >
        </div>

         <div class="champ">
          <label>Genre:</label>

          <select  v-model="credentials.gender" required="">
              <option value="Femme">Femme</option>
              <option value="Homme">Homme</option>
          </select>
        </div>


        <div class="champ">
          <label>Date de naissance</label>
          <label class="error">{{ errorCred.birthday }}</label>
          <input type="date" v-model="credentials.birthday" >
        </div>

        <div class="champ">
          <label>Mot de passe</label>
          <label class="error">{{ errorCred.password }}</label>
          <input type="password" v-model="credentials.password" >
        </div>

        <div class="champ">
          <label>Confirmer mot de passe</label>
          <label class="error">{{ errorCred.password_confirmation }}</label>
          <input type="password" v-model="credentials.password_confirmation" >
        </div>

        <!-- <button type="submit" :class="validerInscription() ? 'mon-bouton' : 'mon-disable' " :disabled="validerInscription()" >S'INSCRIRE</button> -->
       <button type="submit" class="mon-bouton" >S'INSCRIRE</button>

      </form>

      <div class="bas-de-page">
        <p>Déjà un compte ? <a href="/login">Se connecter</a></p>
      </div>
    </div>
  </div>
</template>



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

.champ label:first-child {
  display: block;
  font-size: 15px;
  color: #666;
  margin-bottom: 4px;
  font-weight: bold;
}

.error{
  display: block;
  font-size: 15px;
  color:red;
  margin-bottom: 4px;
  margin-top: 5px;
}

.champ input,select {
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
