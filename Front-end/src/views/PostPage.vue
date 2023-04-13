<script setup>
import { defineProps, onMounted, ref } from "vue";
import { usePostsStore } from "../stores/posts";
import Comment from "../components/Comment.vue";
import AddComment from "../components/AddComment.vue";
import Article from "../components/Article.vue";

const props = defineProps(["id"]);
const postsStore = usePostsStore();
const refresh = ref(0);

if (postsStore.update) {
    refresh.value++;
}

onMounted(async () => {
    await postsStore.getPost(props.id);
});
</script>

<template>
    <div v-if="postsStore.post">
        <Article :post="postsStore.post.post" :key="refresh" />
        <AddComment :post_id="id" />
        <Comment v-for="comment in postsStore.post.comments" :key="comment.id" :comment="comment" />
    </div>
</template>
