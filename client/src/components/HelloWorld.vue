<script setup>
import { kyInstance } from '@/api/kyInstance';
import { onMounted, ref } from 'vue';

const content = ref({})
onMounted((async () => {
try {
  if (localStorage.length >0) {
 return
  }
  const data = await kyInstance
    .post('/post', {
      json: { link: 'https://www.meta.com/about/company-info/?srsltid=AfmBOorNG6eU9Fg-38jPtVrCodVnWP8jMXnTQuNXDGo6MM8nL1klxJj5' }
    })
    .json();
    localStorage.setItem("data",JSON.stringify(data))

} catch (error) {
  console.error(error);
}
})())

const test = JSON.parse(localStorage.getItem('data'));

</script>

<template>
  <div>
  <h1>{{ test?.title ?? 'blue' }}</h1>
  <p>{{ test?.description }}</p>
  <img :src=test.image alt="">

  <p>le lien : {{ test?.url }}</p>
  </div>

</template>
