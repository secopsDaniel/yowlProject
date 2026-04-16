<template>
  <div class="page">
    <div class="card">
      <h2>Vérification de votre compte</h2>

      <p class="subtitle">
        Connecté en tant que :
        <strong>{{ authStore.user?.email }}</strong>
      </p>

      <p class="info">
        Cliquez sur le bouton pour recevoir votre email d’authentification.
      </p>

      <button class="btn" @click="sendAuthEmail" :disabled="loading">
        <span v-if="loading">Envoi en cours...</span>
        <span v-else>Recevoir l’email</span>
      </button>

      <p v-if="message" class="message">{{ message }}</p>
      <p v-if="authStore.errors" class="error">
        {{ authStore.errors?.general || "Erreur serveur" }}
      </p>

      <!-- bouton retour -->
      <button class="back" @click="goBack">
        ← Retour à la connexion
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import { useAuthStore } from "@/stores/AuthStore";

const authStore = useAuthStore();
const router = useRouter();

const loading = ref(false);
const message = ref("");

const sendAuthEmail = async () => {
  loading.value = true;
  message.value = "";

  try {
  const reponse = await authStore.AuthMail();
    message.value = reponse.message ||"Email envoyé avec succès ✔";
  } catch (e) {
    message.value = "Erreur lors de l’envoi.";
  } finally {
    loading.value = false;
  }
};

const goBack = () => {
  router.push("/login");
};
</script>

<style scoped>
.page {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(135deg, #f5f3ff, #ede9fe);
}

.card {
  width: 420px;
  padding: 30px;
  border-radius: 16px;
  background: white;
  box-shadow: 0 12px 35px rgba(88, 28, 135, 0.15);
  text-align: center;
}

h2 {
  color: #6d28d9;
  margin-bottom: 10px;
}

.subtitle {
  font-size: 14px;
  color: #555;
}

.info {
  font-size: 13px;
  color: #777;
  margin: 15px 0;
}

.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 10px;
  background: #7c3aed;
  color: white;
  font-weight: bold;
  cursor: pointer;
  transition: 0.2s;
}

.btn:hover {
  background: #6d28d9;
}

.btn:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

.message {
  margin-top: 12px;
  color: #16a34a;
  font-size: 13px;
}

.error {
  margin-top: 12px;
  color: #dc2626;
  font-size: 13px;
}

.back {
  margin-top: 18px;
  background: transparent;
  border: none;
  color: #6d28d9;
  cursor: pointer;
  font-size: 13px;
  text-decoration: underline;
}

.back:hover {
  color: #4c1d95;
}
</style>
