import { defineStore } from "pinia";
import axios from "axios";

export const useCategoriesStore = defineStore('categories', {
    state: () => ({
        allCategories: null
    }),
    getters: {
        category: (state) => state.allCategories,
    },
    actions: {
        async getAllCategories() {
            const categoriesData = await axios.get("/api/categories");
            this.allCategories = categoriesData.data.data;
        },
    }
})