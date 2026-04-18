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
      <div class="md:w-2/3 p-15">
        <form @submit.prevent="boutonConnexion" class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Full Name -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
              <input type="email" v-model="Email" placeholder="Ex: example@gmail.com" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" requiblue />
            </div>

            <!-- Email -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
              <input type="password" v-model="MotDePasse" placeholder="Password" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"  requiblue/>
            </div>
          </div>

          <!-- Submit -->
          <div class="flex flex-col items-center">
            <button type="submit" class="w-100 py-3 px-6 bg-blue-600 text-white font-medium rounded-lg shadow-sm hover:bg-blue-700 transition duration-300">
              Connexion
            </button>
            <div class="bas-de-page">
              <p>Vous n'avez pas de compte ? <a href="/register" class="text-blue-500 hover:underline">S'inscrire</a></p>
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

      <form @submit.prevent="boutonConnexion">
        <div class="champ">
          <label>Email</label>
          <input type="email" v-model="Email" placeholder="entrez votre mail">
        </div>

        <div class="champ">
          <label>Mot de passe</label>
          <input type="password" v-model="MotDePasse">
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

<script setup>
import { ref } from 'vue'

const Email = ref('')
const MotDePasse = ref('')

function boutonConnexion() {
  if (Email.value === "" || MotDePasse.value === "") {
    alert("Attention : Merci de remplir tous les champs !")
  } else {
    alert("Tentative de connexion pour : " + Email.value)
  }
}
</script>

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
} */
</style>
