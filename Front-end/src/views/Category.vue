<script setup>
import { computed, onMounted } from "vue";
import { usePostsStore } from '../stores/posts';
import Post from "../components/Post.vue";
import Welcome from "../components/Welcome.vue";
import Skeleton from "../components/Skeleton.vue";

const props = defineProps(["id"]);
const getPosts = usePostsStore();
const filteredPosts = computed(() => {
    return getPosts.posts.filter((post) => {
        return post.relationships.category_id == props.id;
    })
})

onMounted(async () => {
    await getPosts.getAllPosts();
});
</script>

<template>
  <Welcome />
    <RouterLink v-if="getPosts.posts" v-for="post in filteredPosts" :key="post.id" :to="{ name: 'post', params: { id: post.id } }" class="mx-auto">
        <Post :title="post.attributes.title" :topic="post.attributes.topic" :category="post.relationships.category" :creator="post.relationships.creator" :image="post.attributes.image" :comments_count="post.relationships.comments_count" />
    </RouterLink>
    <Skeleton v-else class="mx-auto" />
</template>
