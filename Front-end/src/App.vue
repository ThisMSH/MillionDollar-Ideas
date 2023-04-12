<script setup>
import { RouterLink, RouterView } from 'vue-router';
import { onMounted } from 'vue';
import { initFlowbite } from 'flowbite';
import { useAuthStore } from './stores/auth';

import Header from "./components/Header.vue";
import Sidebar from "./components/Sidebar.vue";
import Footer from "./components/Footer.vue";
const authStore = useAuthStore();

onMounted(async () => {
  initFlowbite();
  await authStore.getUser();
});
</script>

<template>
  <Header />
  <div class="flex">
    <Sidebar />
    <main class="w-full md:w-main transition">
      <div class="mt-20 p-4 flex flex-col gap-y-10">
        <RouterView />
      </div>
    </main>
  </div>
  <Footer />
</template>
