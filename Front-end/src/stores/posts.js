import { defineStore } from "pinia";
import axios from "axios";

export const usePostsStore = defineStore('posts', {
    state: () => ({
        error: [],
        singlePost: null,
        allPosts: null,
        postsOfCategory: null,
        loading: null,
        updated: 0,
    }),
    getters: {
        posts: (state) => state.allPosts,
        post: (state) => state.singlePost,
        loadingState: (state) => state.loading,
        update: (state) => state.updated,
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

            const form1 = new FormData();
            form1.append("Title", data.Title);
            form1.append("Category_id", data.Category_id);
            form1.append("Image", data.Image);
            form1.append("Topic", data.Topic);

            try {
                const postCreated = await axios.post("/api/posts", form1);
                // await axios.post("/api/posts", form);
                const closeButton = document.querySelector('#defaultModal [data-modal-toggle]');
                closeButton.click();
                this.router.push(`/post/${postCreated.data.data.id}`);
                await this.getAllPosts();
            } catch (e) {
                if (e.response.status === 422) {
                    this.error = e.response.data.errors;
                }
            }
        },
        async getPost(id) {
            const postData = await axios.get(`/api/posts/${id}`);
            this.singlePost = postData.data.data;
        },
        async updatePost(data) {
            this.error = [];
            
            // const form2 = new FormData();
            // form2.append("Title", data.Title);
            // form2.append("Topic", data.Topic);
            // form2.append("Category_id", data.Category_id);
            // form2.append("Image", data.Image);


            const form2 = {
                Title: data.Title,
                Topic: data.Topic,
                Category_id: data.Category_id,
                Image: data.Image
            };
            console.log(data.Image);
            // const form2 = new FormData()
            // form2.append("Title", data.Title)
            // form2.append("Topic", data.Topic)
            // form2.append("Category_id", data.Category_id)
            // form2.append("Image", data.Image)

            try {
                await axios.patch(`/api/posts/${data.id}`, form2);
                const closeButton = document.querySelector('#defaultModalUpdate [data-modal-toggle]');
                closeButton.click();
                this.updated++;
            } catch (e) {
                if (e.response.status === 422) {
                    this.error = e.response.data.errors;
                }
            }
        },
        async deletePost(id) {
            this.error = [];

            try {
                await axios.delete(`/api/posts/${id}`);
                const closeButton = document.querySelector('#popup-modal [data-modal-hide]');
                closeButton.click();
                this.router.push("/");
            } catch (e) {
                if (e.response.status === 422) {
                    this.error = e.response.data.errors;
                }
            }
        }
    }
})
