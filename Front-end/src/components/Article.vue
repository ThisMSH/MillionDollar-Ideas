<script setup>
import { defineProps } from 'vue';
import { useAuthStore } from '../stores/auth';
import UpdatePost from './modal/UpdatePost.vue';

const props = defineProps(["post"]);
const authUser = useAuthStore();
</script>

<template>
    <div class="pt-10 px-2 mb-10">
        <div class="flex justify-between">
            <h1 class="text-3xl font-extrabold leading-tight text-gray-900 lg:text-4xl dark:text-white">{{ post.attributes.title }}</h1>
            <div v-show="authUser.user && authUser.user.id == post.relationships.user_id">
                <UpdatePost :postData="post" />
            </div>
        </div>
        <p class="mt-2 mb-5 lg:mb-8 text-sm font-light text-gray-600 dark:text-gray-400">Created by: <span class="font-medium">{{ post.relationships.creator }}</span></p>
        <img class="object-cover rounded-md mx-auto mb-5 lg:mb-8" :src="post.attributes.image" alt="">
        <p class="text-gray-700 dark:text-gray-300">{{ post.attributes.topic }}</p>
    </div>
</template>
