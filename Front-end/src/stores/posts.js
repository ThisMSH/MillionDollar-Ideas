import { defineStore } from "pinia";
import axios from "axios";

export const usePostsStore = defineStore('posts', {
    state: () => ({
        post: null,
        posts: null,
        postsCategory: null,
    }),
})
