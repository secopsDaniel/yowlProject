<script setup>
import { useAuthStore } from '@/stores/AuthStore';
const auth = useAuthStore();
</script>

<template>
    <header class="user-nav-fixed">
        <div class="container-nav">
            <div class="header-content">
                <div class="logo">Yo<span>wl</span></div>
                <nav>
                    <ul>
                        <RouterLink to="create">
                        <li><a href="#">+ <span class="cacher">Commenter un lien</span></a></li>
                        </RouterLink>

                        <RouterLink to="register">
                        <li v-if="!auth.isAuthenticated"><a href="#">S'inscrire</a></li>
                        </RouterLink>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</template>

<style scoped>
.user-nav-fixed {
    position: fixed;
    top: 0;
    right: 0;
    left: 80px;
    height: 70px;
    background-color: #101A26;
    z-index: 40;
    display: flex;
    align-items: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.container-nav {
    width: 100%;
    max-width: 1500px;
    margin: 0 auto;
    padding: 0 40px;
}



.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 35px;
    font-weight: bold;
    color: rgb(0, 98, 255);
}

.logo span {
    color: #ffff;
}

nav ul {
    display: flex;
    list-style: none;
    gap: 20px;
    align-items: center;
}

nav ul li a {
    text-decoration: none;
    color: white;
    font-weight: 500;
    transition: 0.2s;
    font-size: 16px;
    background-color: rgba(0, 76, 255, 0.622);
    padding: 10px 20px;
    border-radius: 8px;
}

nav ul li a:hover {
    background-color: rgb(0, 98, 255);
    box-shadow: 0 3px 10px rgba(0, 98, 255, 0.875);
}

@media (max-width: 768px) {
.cacher {
    display: none;
}
}
</style>
