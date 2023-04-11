import { defineStore } from "pinia";
import { useAuthStore } from "./auth";
import axios from "axios";

export const usePostsStore = defineStore('posts', {
    state: () => ({
        singlePost: null,
        allPosts: null,
        postsOfCategory: null,
    }),
    getters: {
        posts: (state) => state.allPosts,
    },
    actions: {
        async getAllPosts() {
            const postsData = await axios.get("/api/posts");
            this.allPosts = postsData.data.data;
        },
    }
})
