<template>
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" v-for="jobcat in jobcategory.jobPosts" :key="jobcat.id">
                    <a class="cat-item rounded p-4">
                        <img class="flex-shrink-0 img-fluid border rounded" :src="storageImage(jobcat.image)" alt="" style="width: 80px; height: 80px;">
                        <router-link class="mb-3" :to="{ name: 'Details', params: { id: jobcat.id }}">{{ jobcat.category.name }}</router-link>
                        <p class="mb-0">123 Vacancy</p>
                    </a>
                </div>
            </div>
        </div>

        <div v-if="error" class="alert alert-danger">{{ error }}</div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "JobCategory",
        props: ['category_id'],
        data() {
            return {
                jobcategory: [],
                error: null
            };
        },
        mounted() {
            this.getDataList();
        },
        methods: {
            async getDataList() {
                if (!this.category_id) {
                    console.error("Category ID is not defined.");
                    this.error = "Category ID is not defined.";
                    return;
                }
                try {
                    const response = await axios.get(`/api/frontend/jobcate/${this.category_id}`);
                    this.jobcategory = response.data.result;
                    console.log(this.jobcategory);
                } catch (error) {
                    console.error("Error fetching job data:", error);
                    this.error = "Error fetching job data. Please try again later.";
                }
            },
        }
    }
</script>

<style scoped>
    /* Add your styles here */
</style>
