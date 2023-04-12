import { defineStore } from "pinia";
import { usePostsStore } from "./posts";
import axios from "axios";

export const useCommentsStore = defineStore("comment", {
    state: () => ({
        error: [],
    }),
    actions: {
        async createComment(data) {
            this.error= [];
            
            const post = usePostsStore();
            const form = new FormData();
            form.append("Comment", data.Comment);
            form.append("Post_id", data.Post_id);
            
            try {
                await axios.post("/api/comment", form);
                await post.getPost(data.Post_id);
            } catch (e) {
                if (e.response.status === 422) {
                    this.error = e.response.data.errors;
                }
            }
        }
    }
})
