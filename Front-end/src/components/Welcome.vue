<template>
  <div class="flex justify-between items-center">
    <h1 class="text-2xl sm:text-3xl lg:text-5xl text-black dark:text-white font-bold">Welcome to <span class="bg-gradient-to-r from-orange-400 to-red-600 bg-clip-text text-transparent">MillionDollar-Ideas</span></h1>
    <div class="flex justify-center m-5">
      <button id="defaultModalButton" data-modal-toggle="defaultModal" class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
        Create Post
      </button>
      <CreatePost />
    </div>
  </div>
</template>

<script setup>
import CreatePost from "./modal/CreatePost.vue";
</script>