<script setup>
import { RouterLink } from 'vue-router';
import { formatDateFriendly } from '@/utils/dateFormatter';
import 'primeicons/primeicons.css'
defineProps({
  post: {
    type: Object,
    required: true
  }
});
</script>

<template>
  <div class="produits-card">
    <div class="post-header">
      <button class="w-12 h-12 rounded-full border-2 border-2xl border-blue-500 hover:border-blue-900 transition-all overflow-hidden">
        <svg class="text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
      </button>
      <div class="user-info">
        <span class="nom_user">{{ post.creator?.login }}</span>
        <span class="Date">{{ formatDateFriendly(post.created_at) }}</span>
      </div>
    </div>
     <div class="produits-info">
      <p class="description">
        {{ post.commentaires?.[0]?.contenu || 'Aucun commentaire' }}
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
        <RouterLink :to="`/detailpost/${post.id}`">
        <button class="voir">Commenter</button>
        </RouterLink>
      </div>
    </div>
  </div>
</template>

<style scoped>
.produits-card {
    background-color: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    transition: all 0.2s ease;
    border: 1px solid #e5e7eb;
    max-width: 350px;
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
</style>
