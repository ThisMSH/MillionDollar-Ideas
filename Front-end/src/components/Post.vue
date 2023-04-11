<script setup>
const props = defineProps(["title", "topic", "category", "creator"]);
</script>

<template>
  <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-2xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://flowbite.com/docs/images/blog/image-4.jpg" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
      <div>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ title }}</h5>
      </div>
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-3">{{ topic }}</p>
      <div class="flex flex-row-reverse justify-between">
        <div class="inline-block">
          <span class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ category }}</span>
        </div>
        <div class="inline-block text-xs text-gray-700 dark:text-gray-400">
          <p>Created by: {{ creator }}</p>
        </div>
      </div>
    </div>
  </div>
</template>