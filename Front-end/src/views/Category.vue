<script setup>
import { computed, onMounted } from "vue";
import { usePostsStore } from '../stores/posts';
import { useCategoriesStore } from '../stores/categories';
import Post from "../components/Post.vue";
import Welcome from "../components/Welcome.vue";
import Skeleton from "../components/Skeleton.vue";

// const posts = ref([
//   { ID: 1, userID: 1, Category: [{CategoryID: 4}, {CategoryID: 1}], username: "El Mahdi", Title: "Something about sport", Topic: "Sport Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat obcaecati incidunt laboriosam deserunt pariatur labore a aliquam minus illo quis, sapiente dolore, molestiae, neque unde! Cum magnam" },
//   { ID: 2, userID: 1, Category: [{CategoryID: 1}, {CategoryID: 2}], username: "El Mahdi", Title: "Food and only food", Topic: "Food Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid assumenda enim, odio accusantium quis corrupti explicabo expedita impedit, modi, repudiandae quibusdam commodi voluptate pariatur non quam natus dolore facilis quo?" },
//   { ID: 3, userID: 1, Category: [{CategoryID: 2}, {CategoryID: 3}], username: "El Mahdi", Title: "Radi l Jdida", Topic: "Traveling Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid assumenda enim, odio accusantium quis corrupti explicabo expedita impedit, modi, repudiandae quibusdam commodi voluptate pariatur non quam natus dolore facilis quo? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid assumenda enim, odio accusantium quis corrupti explicabo expedita impedit, modi, repudiandae quibusdam commodi voluptate pariatur non quam natus dolore facilis quo?" },
//   { ID: 4, userID: 1, Category: [{CategoryID: 3}, {CategoryID: 4}], username: "El Mahdi", Title: "Bruh I don't smoke", Topic: "Health Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat obcaecati incidunt laboriosam deserunt pariatur labore a aliquam minus illo quis, sapiente dolore" },
//   { ID: 5, userID: 2, Category: [{CategoryID: 4}, {CategoryID: 3}], username: "Mohammed", Title: "Another thing about sport", Topic: "Sport Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat obcaecati incidunt laboriosam deserunt pariatur labore a aliquam minus illo quis, saLorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid assumenda enim, odio accusantium quis corrupti explicabo expedita impedit, modi, repudiandae quibusdam commodi voluptate pariatur non quam natus dolore facilis quo?" },
//   { ID: 6, userID: 1, Category: [{CategoryID: 4}, {CategoryID: 1}], username: "El Mahdi", Title: "FCB vs RMA", Topic: "Sport Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid assumenda enim, odio accusantium quis corrupti explicabo expedita impedit, modi, repudiandae quibusdam commodi voluptate pariatur non quam natus dolore facilis quo?iatur non quam natus dolore facilis quo?" },
// ]);

const props = defineProps(["id"]);
const getPosts = usePostsStore();
const categories = useCategoriesStore();

// const filteredPosts = computed(() => {
//     return getPosts.posts.filter((post) => {
//         return post.Category.some((category) => category.CategoryID == props.id);
//     });
// });
console.log(getPosts.posts)

onMounted(async () => {
    await getPosts.getAllPosts();
});
</script>

<template>
  <!-- <Welcome />
  <RouterLink v-for="post in filteredPosts" :key="post.ID" :to="{ name: 'post', params: { id: post.ID } }" class="mx-auto">
    <Post :title="post.Title" :topic="post.Topic" :categories="post.Category" />
  </RouterLink> -->
  <Welcome />
    <!-- <RouterLink v-if="getPosts.posts" v-for="post in filteredPosts" :key="post.id" :to="{ name: 'post', params: { id: post.id } }" class="mx-auto">
        <Post :title="post.attributes.title" :topic="post.attributes.topic" :category="post.relationships.category" :creator="post.relationships.creator" />
    </RouterLink>
    <Skeleton v-else class="mx-auto" /> -->
</template>


<!-- 
Yes, you can filter objects from an array according to their category in Vue.js by using the `Array.prototype.filter()` method. This method creates a new array with all elements that pass the test implemented by the provided function.

Here's an example of how you can filter the objects in your array to only include those with a specific category:

```js
const data = [
  {
    id: "1",
    attributes: {
      title: "eum harum nesciunt molestiae sint adipisci.",
      topic: "erat corrupti. Voluptatem enim sint ducimus.",
      image: "",
      created_at: "2023-04-10T10:13:41.000000Z",
    },
    relationships: {
      creator: "Orlo McGlynn",
      category: "Movies",
    },
  },
  {
    id: "2",
    attributes: {
      title: "qui aut tenetur.",
      topic: "d at enim accusamus excepturi sunt qui laborum ex.",
      image: "",
      created_at: "2023-04-10T10:13:41.000000Z",
    },
    relationships: {
      creator: "Audreanne Abernathy II",
      category: "Music",
    },
  },
  // ...
];

const filteredData = data.filter(
  (item) => item.relationships.category === "Movies"
);

console.log(filteredData);
```

This will create a new array `filteredData` that only contains objects from the original `data` array where the `category` is `"Movies"`.

You can use this approach in a Vue.js component by defining a computed property that returns the filtered array. Here's an example:

```html
<template>
  <div>
    <ul>
      <li v-for="item in filteredData" :key="item.id">
        {{ item.attributes.title }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: [
        {
          id: "1",
          attributes: {
            title: "eum harum nesciunt molestiae sint adipisci.",
            topic: "erat corrupti. Voluptatem enim sint ducimus.",
            image: "",
            created_at: "2023-04-10T10:13:41.000000Z",
          },
          relationships: {
            creator: "Orlo McGlynn",
            category: "Movies",
          },
        },
        {
          id: "2",
          attributes: {
            title: "qui aut tenetur.",
            topic:
              "d at enim accusamus excepturi sunt qui laborum ex.",
            image: "",
            created_at: "2023-04-10T10:13:41.000000Z",
          },
          relationships: {
            creator: "Audreanne Abernathy II",
            category: "Music",
          },
        },
        // ...
      ],
    };
  },
  computed: {
    filteredData() {
      return this.data.filter(
        (item) => item.relationships.category === "Movies"
      );
    },
  },
};
</script>
```

This will display a list of items where only those with the `category` `"Movies"` are shown.

Is this what you were looking for?
 -->
