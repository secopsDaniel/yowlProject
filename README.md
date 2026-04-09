 Yowl

Yowl est une plateforme qui permet aux utilisateurs de commenter n’importe quel contenu sur Internet simplement à partir de son lien.

Que ce soit un article, une vidéo, une page produit ou un post, Yowl récupère automatiquement les métadonnées du contenu (via Open Graph ou des API publiques officielles) pour créer un espace de discussion dédié.

🚀 Fonctionnalités
🔗 Ajouter un lien vers n’importe quel contenu web
📥 Extraction automatique des données (titre, image, description)
💬 Système de commentaires associé à chaque lien
👥 Interaction entre utilisateurs
⚡ Chargement rapide et interface fluide
🛠️ Stack technique
Backend
   Laravel (API REST)
   Gestion des utilisateurs et authentification
   Récupération des métadonnées via :
   Open Graph
   APIs publiques (si disponibles)

Frontend
    Vue.js

Interface utilisateur dynamique
Consommation de l’API Laravel

📦 Installation
  Prérequis
   PHP >= 8.x
   Composer
   Node.js & npm
   Base de données (MySQL)


1. Cloner le projet
    git clone git@github.com:EpitechCodingAcademyPromo2026/C-DEV-160-ABJ-1-2-yowl-4.git
    cd C-DEV-160-ABJ-1-2-yowl-4
    

2. Setup Backend (Laravel)
    cd server
    composer install
    cp .env.example .env
    php artisan key:generate

Configurer la base de données dans .env, puis :

php artisan migrate
php artisan serve


3. Setup Frontend (Vue.js)
    cd client
    npm install
    npm run dev

⚙️ Fonctionnement
   L’utilisateur soumet un lien
   Le backend :
   Analyse l’URL
   Récupère les métadonnées via Open Graph ou API
   Une page dédiée est créée pour ce contenu
   Les utilisateurs peuvent commenter et interagir


📡 API (exemple)
Ajouter un lien
POST /api/links

Body :

     {
       "url": "https://example.com/article"
     }
     Récupérer un contenu
     GET /api/links/{id}
     Ajouter un commentaire
     POST /api/comments

📌 Cas d’usage
    Discuter d’un article sans dépendre du site original
    Centraliser des discussions autour de contenus externes
    Créer une couche sociale sur le web

🔮 Améliorations futures
     🔔 Notifications
     👍 Système de likes / votes
     🔎 Recherche de contenus
     🌐 Extension navigateur
     🤖 Résumé automatique du contenu



✨ Vision

Yowl ambitionne de devenir une couche universelle de discussion pour le web, indépendante des plateformes.