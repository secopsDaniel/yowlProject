<script setup>
import AllPost from '@/components/AllPost.vue';
import NavBar from '@/components/NavBar.vue';
import SideBar from '@/components/SideBar.vue';
</script>
<template>
    <NavBar/>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <SideBar/>
        <!-- Main Content -->
        <main class="">
        <!-- tête Section -->
        <section class="categories">
        <div class="container">
        <div class="container-categories">
            <h2 class="categories-title">Hello, Toi!</h2>
            <div class="categories-scroll">
                <a class="categorie">catégorie_nom</a>
                <a class="categorie">catégorie_nom</a>
                <a class="categorie">catégorie_nom</a>
                <a class="categorie">catégorie_nom</a>
                <a class="categorie">catégorie_nom</a>
                <a class="categorie">catégorie_nom</a>
                <a class="categorie">catégorie_nom</a>
                <a class="categorie">catégorie_nom</a>
                <a class="categorie">catégorie_nom</a>
            </div>
        </div>
        </div>
    </section>
    <AllPost/>
        </main>
    </div>
</template>
<style scoped>
/* * {

            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
        }
         */

html{
    scroll-behavior: smooth;
}        .copyright {
    text-align: center;
    padding-top: 20px;
    border-top: 1px solid white;
    color: white;
    font-size: 14px;
}        

.categories {

    padding: 40px 0
}

.categories-title{
    padding: 20px;
    font-size: 28px;
    margin-bottom: 20px;
}

.categories-scroll{
    display:flex;
    gap: 15px;
    overflow-x: auto;
    padding-bottom: 10px;
}

.categories-scroll::webkit-scrollbar{
    display: none;
}

.categorie{
    min-width: 160px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 20px;
    color: #1a0934be;
    font-weight: bold;
    box-shadow: 0 2px 5px rgba(5, 27, 103, 0.19);
    cursor: pointer;
    background-color: #ffffffc1;
}

.categorie:hover{
    background-color: rgba(4, 47, 115, 0.156);
    color: black;
    box-shadow: 0 2px 5px #090d34;
    transform: translateY(1.1)
}
@media (max-width: 768px) {
            .categories h1 {
                font-size: 36px;
            }
            
            .categories p {
                font-size: 18px;
            }
        }
</style>