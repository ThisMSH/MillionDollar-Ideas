<script setup>
import { onMounted } from 'vue';
import { usePostsStore } from '../stores/posts';
import Post from "./Post.vue";
import Skeleton from './Skeleton.vue';

// const posts = ref([
//   { ID: 1, userID: 1, Category: [{CategoryID: 4}, {CategoryID: 1}], username: "El Mahdi", Title: "Something about sport", Topic: "Sport Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat obcaecati incidunt laboriosam deserunt pariatur labore a aliquam minus illo quis, sapiente dolore, molestiae, neque unde! Cum magnam" },
//   { ID: 2, userID: 1, Category: [{CategoryID: 1}, {CategoryID: 2}], username: "El Mahdi", Title: "Food and only food", Topic: "Food Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid assumenda enim, odio accusantium quis corrupti explicabo expedita impedit, modi, repudiandae quibusdam commodi voluptate pariatur non quam natus dolore facilis quo?" },
//   { ID: 3, userID: 1, Category: [{CategoryID: 2}, {CategoryID: 3}], username: "El Mahdi", Title: "Radi l Jdida", Topic: "Traveling Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid assumenda enim, odio accusantium quis corrupti explicabo expedita impedit, modi, repudiandae quibusdam commodi voluptate pariatur non quam natus dolore facilis quo? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid assumenda enim, odio accusantium quis corrupti explicabo expedita impedit, modi, repudiandae quibusdam commodi voluptate pariatur non quam natus dolore facilis quo?" },
//   { ID: 4, userID: 1, Category: [{CategoryID: 3}, {CategoryID: 4}], username: "El Mahdi", Title: "Bruh I don't smoke", Topic: "Health Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat obcaecati incidunt laboriosam deserunt pariatur labore a aliquam minus illo quis, sapiente dolore" },
//   { ID: 5, userID: 2, Category: [{CategoryID: 4}, {CategoryID: 3}], username: "Mohammed", Title: "Another thing about sport", Topic: "Sport Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat obcaecati incidunt laboriosam deserunt pariatur labore a aliquam minus illo quis, saLorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid assumenda enim, odio accusantium quis corrupti explicabo expedita impedit, modi, repudiandae quibusdam commodi voluptate pariatur non quam natus dolore facilis quo?" },
//   { ID: 6, userID: 1, Category: [{CategoryID: 4}, {CategoryID: 1}], username: "El Mahdi", Title: "FCB vs RMA", Topic: "Sport Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid assumenda enim, odio accusantium quis corrupti explicabo expedita impedit, modi, repudiandae quibusdam commodi voluptate pariatur non quam natus dolore facilis quo?iatur non quam natus dolore facilis quo?" },
// ]);

const getPosts = usePostsStore();

onMounted(async () => {
    await getPosts.getAllPosts();
});
</script>

<template>
    <RouterLink v-if="getPosts.loadingState" v-for="post in getPosts.posts" :key="post.id" :to="{ name: 'post', params: { id: post.id } }" class="mx-auto">
        <Post :title="post.attributes.title" :topic="post.attributes.topic" :category="post.relationships.category" :creator="post.relationships.creator" />
    </RouterLink>
    <Skeleton v-else class="mx-auto" />
</template>
