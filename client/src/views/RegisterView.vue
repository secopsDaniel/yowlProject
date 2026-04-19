<template>
  <div class="bg-[#101A26] min-h-screen">
  <!-- Enquiry Section -->
<section class="relative max-w-7xl mx-auto px-4 py-16">
  <!-- Header Section -->
  <div class="text-center mb-12">
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
      INSCRIP<span class="text-blue-600">TION</span>
    </h1>
  </div>
  <!-- Form Container -->
  <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
    <div class="md:flex">
      <!-- Left Side -->
      <div class="md:w-1/3 bg-gradient-to-br from-blue-600 to-blue-800 p-10 text-white flex flex-col justify-between">
        <div>
          <h2 class="text-2xl font-bold mb-4">Bon arrivé parmi nous !</h2>
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
        <form @submit.prevent="validerInscription" class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nom -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
              <input type="email" v-model="firstName" placeholder="votre Nom" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" requiblue />
            </div>

            <!-- Prenoms -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Prenom</label>
              <input type="password" v-model="lastName" placeholder="Votre Prenom" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"  requiblue/>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Login -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Pseudo</label>
              <input type="email" v-model="Login" placeholder="Ex: Lea_Kouakou" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" requiblue />
            </div>

            <!-- Email -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
              <input type="password" v-model="Email" placeholder="Ex: example@gmail.com" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"  requiblue/>
            </div>
          </div>

          <!-- Date de naissance -->
          <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Date de naissance</label>
              <input type="date" v-model="dateNaissance" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"  requiblue/>
            </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Mot de passe -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
              <input type="email" v-model="password" placeholder="Mot de passe" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" requiblue />
            </div>

            <!-- Confirmation Mot de passe -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Confirmation Mot de passe</label>
              <input type="password" v-model="confirmation_password" placeholder="Confirmez votre Mot de passe" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"  requiblue/>
            </div>
          </div>
          

          <!-- Submit -->
          <div class="flex flex-col items-center">
            <button type="submit" class="w-100 py-3 px-6 bg-blue-600 text-white font-medium rounded-lg shadow-sm hover:bg-blue-700 transition duration-300">
              S'inscrire
            </button>
            <div class="bas-de-page">
              <p>Déjà un compte ? <a href="/login" class="text-blue-500 hover:underline">Se connecter</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- 
  </div>
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
    </div>-->
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

</style>
