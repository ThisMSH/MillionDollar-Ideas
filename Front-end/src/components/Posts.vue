<script setup>
import { onMounted } from 'vue';
import { usePostsStore } from '../stores/posts';
import Post from "./Post.vue";
import Skeleton from './Skeleton.vue';

const getPosts = usePostsStore();

onMounted(async () => {
    await getPosts.getAllPosts();
});
</script>

<template>
    <RouterLink v-if="getPosts.loadingState" v-for="post in getPosts.posts" :key="post.id" :to="{ name: 'post', params: { id: post.id } }" class="mx-auto">
        <Post :title="post.attributes.title" :topic="post.attributes.topic" :category="post.relationships.category" :creator="post.relationships.creator" :image="post.attributes.image" :comments_count="post.relationships.comments_count" />
    </RouterLink>
    <Skeleton v-else class="mx-auto" />
</template>
