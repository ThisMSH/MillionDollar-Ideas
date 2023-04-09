import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Category from '../views/Category.vue'
import PostPage from '../views/PostPage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/category/:id',
      name: 'category',
      component: Category,
      props: true
    },
    {
      path: '/post/:id',
      name: 'post',
      component: PostPage,
      props: true
    }
  ]
})
// vue guards (routing)

export default router
