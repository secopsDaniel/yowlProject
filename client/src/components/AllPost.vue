<template>
  <div class="produits-card">
    <div class="post-header">
      <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=48&h=48&q=80" alt="User" class="avatar">
      <div class="user-info">
        <span class="nom_user">LOuLOu</span>
        <span class="Date">Il y a 2h</span>
      </div>
    </div>

    <div class="produits-img">
      <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=500&q=80" alt="post">
    </div>

    <div class="produits-info">
      <h3>Title</h3>
      <p class="description">
        parler ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo pppppppppppppppppppppppppppp
      </p>
      
      <div class="post-actions">
        <div class="left-actions">
          <button class="like-btn">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            <span>312</span>
          </button>
          <span class="source">Source</span>
        </div>
        <button class="voir">Voir/répondre</button>
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