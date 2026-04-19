<script setup>
import { onMounted, ref } from 'vue';
import { useRoute,} from 'vue-router';
import NavBar from '@/components/NavBar.vue';
import SideBar from '@/components/SideBar.vue';
import { usePostStore } from '@/stores/PostStore';
import { formatDateFriendly } from '@/utils/dateFormatter';
import 'primeicons/primeicons.css'
const route = useRoute();
const postStore = usePostStore();
const post = ref(null);
const newComment = ref('');

const submitComment = async () => {
  if (!newComment.value.trim()) return;
  try {
    await postStore.createComment({
      contenu: newComment.value,
      id_post: post.value.id,
    });
    newComment.value = '';
    // Recharger le post pour voir le nouveau commentaire
    const res = await postStore.getPostById(post.value.id);
    post.value = res.data;
  } catch (err) {
    console.error('Erreur lors de l\'ajout du commentaire', err);
  }
};



onMounted(async () => {
  const postId = route.params.id;
  try {
    const res = await postStore.getPostById(postId);
    post.value = res.data;
  } catch (err) {
    console.error('Erreur lors du chargement du post', err);
  }
});
</script>
<template>
    <NavBar/>
    <SideBar/>
    <main class="flex-1 ml-20 pt-24 min-h-screen bg-gray-50 flex justify-center">
      <div class="max-w-4xl w-full px-4">
        <div v-if="post" class="produits-card mx-auto mb-8">
          <div class="post-header">
         <button class="w-12 h-12 rounded-full border-2 border-2xl border-blue-500 hover:border-blue-900 transition-all overflow-hidden">
        <svg class="text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
      </button>
            <div class="user-info">
              <span class="nom_user">{{ post.creator?.firstName }} {{ post.creator?.lastName }}</span>
              <span class="Date">{{ formatDateFriendly(post.created_at) }}</span>
            </div>
          </div>
          <div class="produits-info">
            <p class="description">
              {{ post.commentaires?.[0]?.contenu || 'Aucun commentaire initial' }}
            </p>
          </div>
          <div class="produits-img">
            <img :src="post.photo_video" :alt="post.titre">
          </div>
          <div class="produits-info">
            <h3>{{ post.titre }}</h3>
            <p class="description">
              {{ post.description }}
            </p>

            <div class="post-actions">
              <div class="left-actions">
                <button class="like-btn">
                  <i class="pi pi-comments" style="font-size: 1.5rem"></i>  
                  <span>{{ post.commentaires?.length || 0 }}</span>
                </button>
                <span class="source">{{ post.source }}</span>
              </div>
              <a :href="post.links" target="_blank" rel="noopener noreferrer">
                <button class="voir">Consuler la source </button>
              </a>
            </div>
          </div>
        </div>

        <div v-if="post" class="max-w-3xl mx-auto">
          <div class="flex items-center justify-between mb-10">
            <h2 class="text-2xl font-extrabold tracking-tight">Commentaires <span class="text-gray-400 font-medium text-lg">{{ post.commentaires?.length || 0 }}</span></h2>
          </div>

          <div class="flex gap-4 mb-12">
            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-purple-500 to-blue-500 flex-shrink-0"></div>
            <div class="flex-1">
              <input v-model="newComment" type="text" placeholder="Ajouter un commentaire..."
                     class="w-full bg-transparent border-b border-gray-700 pb-2 focus:border-white focus:outline-none transition-all placeholder-gray-500 text-sm">
              <div class="flex justify-end gap-3 mt-3">
                <button class="px-4 py-2 text-sm font-bold hover:bg-white/10 rounded-full transition">Annuler</button>
                <button @click="submitComment" class="px-4 py-2 text-sm font-bold bg-blue-600 rounded-full hover:bg-blue-500 transition">Publier</button>
              </div>
            </div>
          </div>

          <div class="space-y-6">
            <div v-for="comment in post.commentaires" :key="comment.id" class="yt-glass rounded-3xl p-5 group">
              <div class="flex gap-4">
                <button class="w-12 h-12 rounded-full border-2 border-2xl border-blue-500 hover:border-blue-900 transition-all overflow-hidden">
        <svg class="text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
      </button>
                <div class="flex-1">
                  <div class="flex items-center gap-2 mb-1">
                    <span class="text-sm font-bold">{{ comment.user?.firstName }} {{ comment.user?.lastName }}</span>
                    <span class="text-xs text-gray-500">{{ formatDateFriendly(comment.created_at) }}</span>
                  </div>
                  <p class="text-sm text-gray-700 leading-relaxed mb-4">
                    {{ comment.contenu }}
                  </p>
                  <div class="flex items-center gap-6">
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div v-else class="flex justify-center items-center min-h-screen">
          <p>Chargement du post...</p>
        </div>
      </div>
    </main>
</template>

<style scoped>
.produits-card {
    background-color: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    max-width: 800px;
    width: 100%;
}

.post-header {
    display: flex;
    align-items: center;
    padding: 10px 12px;
    gap: 10px;
}

.avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
}

.user-info {
    display: flex;
    flex-direction: column;
}

.nom_user {
    font-size: 14px;
    font-weight: 700;
    color: #111827;
    line-height: 1.2;
}

.Date {
    font-size: 11px;
    color: #6b7280;
}

.produits-img {
    height: 160px;
    width: 100%;
}

.produits-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.produits-info {
    padding: 12px;
}

.produits-info h3 {
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 6px;
    color: #111827;
}

.description {
    color: #4b5563;
    font-size: 13px;
    line-height: 1.4;
    margin-bottom: 12px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.post-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 10px;
    border-top: 1px solid #f3f4f6;
}

.left-actions {
    display: flex;
    align-items: center;
    gap: 12px;
}

.like-btn {
    display: flex;
    align-items: center;
    gap: 4px;
    color: #6b7280;
    font-size: 13px;
    transition: 0.2s;
}

.like-btn:hover {
    color: #3b82f6;
}

.source {
    font-size: 11px;
    color: #3b82f6;
    font-weight: 500;
}

.voir {
    background-color: #3b82f6;
    color: white;
    padding: 6px 14px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
}

.voir:hover {
    background-color: #2563eb;
}

    /* Verre sombre épuré */
    .yt-glass {
        border-radius: 0 50px 50px 50px;
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(105, 105, 105, 0.416);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }
    /* Animation de rebond au survol */
    .yt-glass:hover {
        transform: scale(1.03);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }
    /* Bouton like animé */
    .btn-interact {
        transition: all 0.2s ease;
    }
    .btn-interact:active {
        transform: scale(0.8);
    }
    /* Barre de scroll personnalisée */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #0f0f0f; }
    ::-webkit-scrollbar-thumb { background: #3f3f3f; border-radius: 10px; }
</style>
