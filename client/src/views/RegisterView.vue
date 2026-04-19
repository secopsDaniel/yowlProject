<script setup>
import { useAuthStore } from '@/stores/AuthStore'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

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
      <div class="md:w-2/3 p-8">
        <form @submit.prevent="Register" class="space-y-6">
          <!-- Erreurs serveur -->
          <div v-if="auth.errors" class="p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
            {{ auth.errors.message || 'Une erreur est survenue lors de l\'inscription.' }}
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nom -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
              <input
                type="text"
                v-model="credentials.firstName"
                placeholder="votre Nom"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              />
              <p v-if="errorCred.firstName" class="text-red-600 text-xs mt-1">{{ errorCred.firstName }}</p>
            </div>

            <!-- Prenom -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Prenom</label>
              <input
                type="text"
                v-model="credentials.lastName"
                placeholder="Votre Prenom"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              />
              <p v-if="errorCred.lastName" class="text-red-600 text-xs mt-1">{{ errorCred.lastName }}</p>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Login -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Pseudo</label>
              <input
                type="text"
                v-model="credentials.login"
                placeholder="Ex: Lea_Kouakou"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              />
              <p v-if="errorCred.login" class="text-red-600 text-xs mt-1">{{ errorCred.login }}</p>
            </div>

            <!-- Email -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
              <input
                type="email"
                v-model="credentials.email"
                placeholder="Ex: example@gmail.com"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              />
              <p v-if="errorCred.email" class="text-red-600 text-xs mt-1">{{ errorCred.email }}</p>
            </div>
          </div>

          <!-- Genre -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Genre</label>
              <select
                v-model="credentials.gender"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              >
                <option value="">Sélectionner un genre</option>
                <option value="Femme">Femme</option>
                <option value="Homme">Homme</option>
              </select>
            </div>

            <!-- Date de naissance -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Date de naissance</label>
              <input
                type="date"
                v-model="credentials.birthday"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              />
              <p v-if="errorCred.birthday" class="text-red-600 text-xs mt-1">{{ errorCred.birthday }}</p>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Mot de passe -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
              <input
                type="password"
                v-model="credentials.password"
                placeholder="Mot de passe"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              />
              <p v-if="errorCred.password" class="text-red-600 text-xs mt-1">{{ errorCred.password }}</p>
            </div>

            <!-- Confirmation Mot de passe -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Confirmation Mot de passe</label>
              <input
                type="password"
                v-model="credentials.password_confirmation"
                placeholder="Confirmez votre Mot de passe"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              />
              <p v-if="errorCred.password_confirmation" class="text-red-600 text-xs mt-1">{{ errorCred.password_confirmation }}</p>
            </div>
          </div>

          <!-- Submit -->
          <div class="flex flex-col items-center gap-4 pt-4">
            <button
              type="submit"
              class="w-full py-3 px-6 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 transition duration-300"
            >
              S'inscrire
            </button>
            <p class="text-sm text-gray-600">
              Déjà un compte ? <RouterLink to ="login">
                <a class="text-blue-600 hover:underline font-medium">Se connecter</a>
                </RouterLink>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
  </div>
</template>
