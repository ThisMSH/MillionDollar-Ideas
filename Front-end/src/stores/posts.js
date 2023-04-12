import { defineStore } from "pinia";
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
        post: (state) => state.singlePost,
        loadingState: (state) => state.loading,
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

            console.log(form1);
            console.log(data);

            try {
                const postCreated = await axios.post("/api/posts", form1);
                // await axios.post("/api/posts", form);
                const closeButton = document.querySelector('#defaultModal [data-modal-toggle]');
                closeButton.click();
                this.router.push("/post/" + postCreated.data.data.id);
                await this.getAllPosts();
            } catch (e) {
                if (e.response.status === 422) {
                    this.error = e.response.data.errors;
                }
            }
        },
        async getPost(id) {
            const postData = await axios.get("/api/posts/" + id);
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

            // console.log(form2);
            // console.log(data);

            try {
                await axios.patch("/api/posts/"  + data.id, form2);
                const closeButton = document.querySelector('#defaultModalUpdate [data-modal-toggle]');
                closeButton.click();
                // return true;
            } catch (e) {
                if (e.response.status === 422) {
                    this.error = e.response.data.errors;
                }
            }
        },
    }
})
