<script setup>
import { ref, onMounted } from 'vue';
import { useCategoriesStore } from '../stores/categories';
// const catagories = ref([
//   { id: 1, name: "Food", img: "food.png" },
//   { id: 2, name: "Traveling", img: "traveling.png" },
//   { id: 3, name: "Health", img: "health.png" },
//   { id: 4, name: "Sport", img: "sport.png" },
// ])

const categories = useCategoriesStore();
// console.log(categories.category[0].id);

onMounted(async () => {
    await categories.getAllCategories();
})
</script>

<template>
  <aside id="default-sidebar" class="fixed md:sticky top-0 left-0 z-40 pt-20 w-64 h-screen transition-transform -translate-x-full md:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <ul class="space-y-2">
        <li v-for="category in categories.category" :key="category.id">
          <RouterLink :to="{ name: 'category', params: { id: category.id } }" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <img class="w-12" :src="'/' + category.Icon" alt="">
            <span class="ml-3">{{ category.Category }}</span>
          </RouterLink>
        </li>
      </ul>
    </div>
  </aside>
</template>
