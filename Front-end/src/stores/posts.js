import { defineStore } from "pinia";
import { useAuthStore } from "./auth";
import axios from "axios";

export const usePostsStore = defineStore('posts', {
    state: () => ({
        error: [],
        singlePost: null,
        allPosts: null,
        postsOfCategory: null,
        loading: null,
    }),
    getters: {
        posts: (state) => state.allPosts,
        loadingState: (state) =>state.loading,
    },
    actions: {
        async getAllPosts() {
            this.loading = false;
            const postsData = await axios.get("/api/posts");
            this.allPosts = postsData.data.data;
            this.loading = true;
        },
        async createPost(data) {
            this.error = [];

            try {
                const postCreated = await axios.post("/api/posts", data);
                const closeButton = document.querySelector('#defaultModal [data-modal-toggle]');
                closeButton.click();
                this.router.push("/post/${postCreated.id}");
            } catch (e) {
                if (e.response.status === 422) {
                    this.error = e.response.data.errors;
                }
            }
        },
    }
})
