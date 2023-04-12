<script setup>
import { defineProps } from 'vue';
import { formatDistanceToNow } from 'date-fns';

const props = defineProps(["comment"]);

const date = new Date(props.comment.attributes.created_at);
const formattedDate = formatDistanceToNow(date);
</script>

<template>
  <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
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
  </article>
</template>