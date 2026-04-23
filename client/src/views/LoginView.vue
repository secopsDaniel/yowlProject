<script setup>
import { onMounted, ref } from 'vue'
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

        if (auth.user.is_verified  == null|| auth.user.verified_at == null) {
            router.push('/authMail')
         }else{
              router.push('/home')
          }

    }

  } catch  {
     if (auth.errors.status == 401) {
          errorServer.value = "L'email ou le mot de passe est incorrect"
     }
  }

}
onMounted( ()=>{
   if (auth.isAuthenticated && (auth.user.is_verified || auth.user.verified_at )) {
     router.push("/home")
   }
})
</script>



<template>
  <div class="bg-[#101A26] min-h-screen">
  <!-- Enquiry Section -->
<section class="relative max-w-7xl mx-auto px-4 py-16">
  <!-- Header Section -->
  <div class="text-center mb-12">
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
      CONNE<span class="text-blue-600">XION</span>
    </h1>
  </div>
  <!-- Form Container -->
  <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
    <div class="md:flex">
      <!-- Left Side -->
      <div class="md:w-1/3 bg-gradient-to-br from-blue-600 to-blue-800 p-10 text-white flex flex-col justify-between">
        <div>
          <h2 class="text-2xl font-bold mb-4">Bon retour parmi nous !</h2>
          <ul class="space-y-4">
            <li class="flex items-start">
              <svg class="h-6 w-6 text-blue-200 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              <span>Commentez tout sur internet</span>
            </li>
            <li class="flex items-start">
              <svg class="h-6 w-6 text-blue-200 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              <span>Partagez vos commentaires avec la communauté</span>
            </li>
            <li class="flex items-start">
              <svg class="h-6 w-6 text-blue-200 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              <span>Respectez nos politiques de confidentialités</span>
            </li>
          </ul>
        </div>
        <div class="mt-8">
          <h3 class="text-lg font-semibold mb-2">Besoin d'assistance?</h3>
          <p class="text-blue-100 mb-2">
            Contactez-nous :
            <a href="mailto:yowl@gmail.com" class="underline hover:text-purple-900">yowl@gmail.com</a>
          </p>
        </div>
      </div>

      <!-- Right Side - Form -->
      <div class="md:w-2/3 p-10">
        <form @submit.prevent="Login" class="space-y-8">
           <div v-if="auth.errors" class="error">
              {{ errorServer}}
            </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-5">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>

              <input
                type="email"
                v-model="credential.email"
                placeholder="Ex: example@gmail.com"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
              />
              <p v-if="error.email" class="text-red-600 text-xs mt-1">{{ error.email }}</p>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
              <input
                type="password"
                v-model="credential.password"
                placeholder="Password"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
              />
              <p v-if="error.password" class="text-red-600 text-xs mt-1">{{ error.password }}</p>
            </div>
          </div>

          <!-- Submit -->
          <div class="flex flex-col items-center gap-4">
            <button
              type="submit"
              class="w-full md:w-auto px-8 py-3 bg-blue-600 text-white font-medium rounded-xl shadow-sm hover:bg-blue-700 transition duration-300"
            >
              Connexion
            </button>
            <div class="text-sm text-gray-500">
              <RouterLink to="register">
              <p>Vous n'avez pas de compte ?
                <a  class="text-blue-500 hover:underline">S'inscrire</a></p>
                </RouterLink>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
  <!-- <div class="page-auth">
    <div class="macarte">
      <h1 class="titre-violet">CONNEXION</h1>

      <form @submit.prevent="Login">
            <div v-if="auth.errors" class="error">
              {{ errorServer}}
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
  </div> -->
  </div>
</template>

<style scoped>
/*
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
*/
.error{
   display: block;
  margin-bottom: 8px;
    margin-top: 5px;
  font-size: 14px;
  color: red;
  text-align: center;
}
/*
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
} */
</style>
