<script setup>
import { useAuthStore } from "../stores/auth";
import { onMounted } from 'vue';
import CreatePost from "./modal/CreatePost.vue";

const authUser = useAuthStore();

// onMounted(async () => {
//     await authUser.getUser();
// });
</script>

<template>
    <div class="flex justify-between items-center">
        <h1 class="text-2xl sm:text-3xl lg:text-5xl text-black dark:text-white font-bold">Welcome to <span class="bg-gradient-to-r from-orange-400 to-red-600 bg-clip-text text-transparent">MillionDollar-Ideas</span></h1>
        <div v-show="authUser.user" class="flex justify-center m-5">
            <CreatePost />
        </div>
    </div>
</template>
