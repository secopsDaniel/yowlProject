<script setup>
import AllPost from '@/components/AllPost.vue';
import NavBar from '@/components/NavBar.vue';
import SideBar from '@/components/SideBar.vue';
</script>

<template>
    <NavBar/>

    <div class="flex">
        <SideBar/>

        <main class="flex-1 ml-20 pt-24 min-h-screen bg-gray-50">
            
            <section class="categories">
                <div class="container mx-auto px-4">
                    <div class="container-categories">
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
html {
    scroll-behavior: smooth;
}

.categories {
    padding: 10px 0;
}

.categories-scroll {
    display: flex;
    gap: 15px;
    overflow-x: auto;
    padding: 10px 0;
    scrollbar-width: none; 
}

.categories-scroll::-webkit-scrollbar {
    display: none;
}

.categorie {
    padding: 10px 0;
    min-width: 160px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-weight: bold;
    box-shadow: 0 2px 5px rgba(5, 27, 103, 0.1);
    cursor: pointer;
    background-color: #ffffff;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.categorie:hover {
    background-color: #0145b2;
    color: white;
    box-shadow: 0 4px 12px rgba(0, 98, 255, 0.3);
    transform: translateY(-2px);
}
</style>