<script setup>
import NavBar from '@/components/NavBar.vue';
import SideBar from '@/components/SideBar.vue';


</script>
<template>
    <NavBar/>
    <SideBar/>
    <main class="flex-1 ml-20 pt-24 min-h-screen bg-gray-50">
      <div class="produits-card">
    <div class="post-header">
      <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=48&h=48&q=80" alt="User" class="avatar">
      <div class="user-info">
        <span class="nom_user">LOuLOu</span>
        <span class="Date">Il y a 2h</span>
      </div>
    </div>
     <div class="produits-info">
      <p class="description">
        commentaire nous fatigue beaucoup je test juste parce que j'ai vu un truc... donc je dois écrire beaucoup
      </p>
    </div>
    <div class="produits-img">
      <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=500&q=80" alt="post">
    </div>
    <div class="produits-info">
      <h3>Title</h3>
      <p class="description">
        description nous fatigue beaucoup je test juste parce que j'ai vu un truc... donc je dois écrire beaucoup
      </p>
      
      <div class="post-actions">
        <div class="left-actions">
          <button class="like-btn">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            <span>312</span>
          </button>
          <span class="source">Source</span>
        </div>
        <RouterLink to="#">
        <button class="voir">Modifier</button>
        </RouterLink>
      </div>
    </div>
  </div>
  
  <div class="max-w-3xl mx-10">
        <div class="flex items-center justify-between mb-10">
            <h2 class="text-2xl font-extrabold tracking-tight">Commentaires <span class="text-gray-400 font-medium text-lg">42</span></h2>
        </div>

        <div class="flex gap-4 mb-12">
            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-purple-500 to-blue-500 flex-shrink-0"></div>
            <div class="flex-1">
                <input type="text" placeholder="Ajouter un commentaire..." 
                       class="w-full bg-transparent border-b border-gray-700 pb-2 focus:border-white focus:outline-none transition-all placeholder-gray-500 text-sm">
                <div class="flex justify-end gap-3 mt-3 opacity-0 hover:opacity-100 transition-opacity">
                    <button class="px-4 py-2 text-sm font-bold hover:bg-white/10 rounded-full transition">Annuler</button>
                    <button class="px-4 py-2 text-sm font-bold bg-blue-600 rounded-full hover:bg-blue-500 transition">Publier</button>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            
            <div class="yt-glass rounded-3xl p-5 group">
                <div class="flex gap-4">
                    <img src="https://i.pravatar.cc/150?u=1" class="w-10 h-10 rounded-full" alt="">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-sm font-bold">@OmerDesign</span>
                            <span class="text-xs text-gray-500">il y a 4 min</span>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed mb-4">
                            Cet effet de morphisme au scroll est absolument incroyable. Le code est propre et l'interface est ultra fluide ! 🔥
                        </p>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-1.5 group/like">
                                <button class="btn-interact p-2 rounded-full hover:bg-white/10 group-hover/like:text-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.708c.95 0 1.708.758 1.708 1.708 0 .151-.02.302-.059.447l-2.316 8.52c-.156.575-.68.973-1.275.973H7M14 10a2 2 0 00-2-2h-3m4 2l-3 3M7 10H4a2 2 0 00-2 2v7a2 2 0 002 2h3" />
                                    </svg>
                                </button>
                                <span class="text-xs font-medium text-gray-400">1.2k</span>
                            </div>
                            <button class="btn-interact p-2 rounded-full hover:bg-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round"  stroke-linejoin="round" stroke-width="2" d="M10 14h4m-4-4h4m1 11H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </button>
                            <span class="text-xs font-bold text-gray-400 cursor-pointer hover:text-white transition">RÉPONDRE</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="yt-glass rounded-3xl p-5">
                <div class="flex gap-4">
                    <img src="https://i.pravatar.cc/150?u=2" class="w-10 h-10 rounded-full" alt="">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-sm font-bold">@TechLover</span>
                            <span class="text-xs text-gray-500">il y a 1 heure</span>
                        </div>
                        <p class="text-sm text-gray-200 mb-3">Minimaliste. J'adore.</p>
                        <div class="flex items-center gap-4">
                             <button class="btn-interact text-xs font-bold text-gray-500 hover:text-white transition">2 RÉPONSES</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

  </main>
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