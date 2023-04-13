<script setup>
import { defineProps, ref } from 'vue';
import { formatDistanceToNow } from 'date-fns';
import Like from './utilities/Like.vue';
import { useCommentsStore } from '../stores/comments';
import axios from 'axios';

const props = defineProps(["comment"]);
const commentsStore = useCommentsStore();
const likesCount = ref(props.comment.relationships.likes_count);

commentsStore.likeStatus = props.comment.relationships.like_id ?? null;

const toggleLike = async () => {
    console.log("start")
    if (commentsStore.liked) {
        console.log("delete")
        await axios.delete(`/api/like/${commentsStore.liked}`);
        commentsStore.likeStatus = null;
        likesCount.value--;
    } else {
        console.log("add")
        await axios.post(`/api/like`, { Comment_id: props.comment.id });
        commentsStore.likeStatus = true;
        likesCount.value++;
    }
    console.log("end")
};
// commentsStore.liked;

const date = new Date(props.comment.attributes.created_at);
const formattedDate = formatDistanceToNow(date);
</script>

<template>
  <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900 border-b border-gray-500">
    <div class="flex justify-between items-center mb-2">
      <div class="flex items-center">
        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
          {{ comment.relationships.creator }}
        </p>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          <time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ formattedDate }} ago</time>
        </p>
      </div>
    </div>
    <p class="text-gray-500 dark:text-gray-400">
      {{ comment.attributes.comment }}
    </p>
    <div class="mt-3 flex items-end gap-x-5">
        <Like @click="toggleLike" class="w-8" :checked="commentsStore.liked" />
        <span class="flex text-gray-800 text-sm font-medium px-2.5 py-0.5 dark:text-gray-400">{{ likesCount }} Likes</span>
    </div>
  </article>
</template>