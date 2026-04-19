<script setup>
import { onMounted, onUnmounted } from 'vue';
import AllPost from '@/components/AllPost.vue';
import NavBar from '@/components/NavBar.vue';
import SideBar from '@/components/SideBar.vue';
import { usePostStore } from '@/stores/PostStore';

const postStore = usePostStore();

let scrollListener = null;

const handleScroll = () => {
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  const windowHeight = window.innerHeight;
  const documentHeight = document.documentElement.scrollHeight;

  if (scrollTop + windowHeight >= documentHeight - 100) {
    postStore.loadMorePosts();
  }
};

function getPostByCategory(categoryId) {
  postStore.fetchAllPosts({ categ_id: categoryId });
}

onMounted(async () => {
  await postStore.fetchCategories();
  await postStore.fetchAllPosts();
  scrollListener = handleScroll;
  window.addEventListener('scroll', scrollListener);
});

onUnmounted(() => {
  if (scrollListener) {
    window.removeEventListener('scroll', scrollListener);
  }
});
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
                            <a class="categorie" v-for="category in postStore.categories" :key="category.id" @click="getPostByCategory(category.id)">
                                {{ category.title }}
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <div class="posts-container">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                    <AllPost v-for="post in postStore.posts" :key="post.id" :post="post" />
                </div>
                <div v-if="postStore.loading" class="text-center py-4">
                    Chargement...
                </div>
                <div v-if="!postStore.hasMore && postStore.posts.length > 0" class="text-center py-4">
                    Fin des posts
                </div>
            </div>
            
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