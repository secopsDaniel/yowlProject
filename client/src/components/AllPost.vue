<template>
<!-- Menu Section -->
    <section class="menu" id="menu">
        <div class="container">
            
            <div class="produits-grid">
                <!-- produits 1 -->
                <div class="produits-card">
                    <div class="post-header">
                      <div class="mt-auto pb-4">
                        <button class="w-12 h-12 rounded-full overflow-hidden">
                            <img src="data:image/jpeg;base64,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" alt="User" class="w-full h-full object-cover">
                        </button>
                        </div>
                    <div class="user_have">
                          <span class="nom_user">LOuLOu</span>
                          <p class="com_user">
                            je suis loulou la grande et je m'exprime sur ce post euh...
                          </p>
                        </div>
                    </div>
                    <div class="produits-img">
                      <img src="data:image/jpeg;base64,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" alt="_post image_">
                    </div>
                    <div class="produits-info">
                        <h3>TITLE</h3>
                        <p class="description"> 
                          content Content Content Content Content Content
                        </p>
                        <div class="post-meta">
                          <span class="source">Source</span>
                          <span class="Date">Il y a 2h</span>
                        </div>
                        <div class="produits-prix">
                          <button class="like-btn">
                             <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                             <span>312</span>
                          </button>
                            <button class="voir">Voir/Répondre</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

/* Menu Section */
.menu {
    padding: 60px 0;
}

.produits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 30px;
}

.produits-card {
    background-color: white;
    
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: transform 0.2s;
    border: 1px solid black;
}

.post-header{
  display: flex;
  align-items: center;
  padding: 15px;
  gap: 12px;
}

.profil-img{
  width: 30px;
  height: 45px;
  border: 50%;
  object-fit: cover;
  border: 2px solid rbg(0, 98, 255);
}

.nom_user{
  color: rgba(3, 11, 45, 0.786);
  font-weight: bold;
  display: block;
}

.com_user{
  color: #090d34;
  font-size: 14px;
  margin: 0;
}

.produits-img {
    height: 220px;
    overflow: hidden;
}

/* .produits-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
} */

.produits-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.produits-info {
    padding: 15px;
}

.produits-info h3 {
    font-size: 22px;
    margin-bottom: 10px;
    color: white;
}

.description{
  color: #090d34;
  line-height: 1.4px;
  margin-bottom: 12px;
  font-size: 14px;
}

.produits-info p {
    color: #4d3838;
    margin-bottom: 15px;
    line-height: 1.5;
}

.produits-prix {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #090d34;
    padding-top: 15px;
}

.like-btn{
  transition: 0.2s;
}

.like-btn:hover{
  color: rgb(0, 98, 255);
}

.prix {
    font-size: 20px;
    font-weight: bold;
    color: #090d34;
}

.post-meta{
  display: flex;
  justify-content: space-between;
  font-size: 12px;
  color: #6b7280;
  margin-bottom: 15px;
}
.source{
  /*font-style: italic;*/
  color: rgb(0, 98, 255);
}

.voir{
  background-color: rgb(0, 98, 255);
  color: white;
  padding: 10px;
  border-radius: 7px;
  font-weight: 500;
}
@media (max-width: 768px) {
                .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            nav ul {
                margin-top: 20px;
                justify-content: center;
            }
            
            nav ul li {
                margin: 0 10px;
            }

            nav ul li a{
                font-size: 15px;
            }

            .categories h1 {
                font-size: 36px;
            }
            
            .categories p {
                font-size: 18px;
            }
        }
</style>