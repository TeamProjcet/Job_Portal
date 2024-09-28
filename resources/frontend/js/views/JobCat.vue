<template>


        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s"  v-for="jobcat in jobcategory" :key="jobcat.id">
                        <a class="cat-item rounded p-4">
                            <img class="flex-shrink-0 img-fluid border rounded" :src="storageImage(jobcat.image)" alt="" style="width: 80px; height: 80px;">
                            <h6 class="mb-3">{{jobcat.name}}</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End -->



</template>

<script>
    import axios from 'axios';
    export default {
        name: "JobCat",
        data() {
            return {
                jobcategory: [], // Initialize jobList
                error: null // Optional: to handle errors
            };
        },
        mounted() {
            this.getDataList();
        },
        methods: {
            async getDataList() {
                try {
                    const response = await axios.get('/api/categories');
                    this.jobcategory = response.data.result; // Assign the data to jobList
                } catch (error) {
                    console.error("Error fetching job data:", error);
                    this.error = "Error fetching job data. Please try again later."; // Set error message
                }
            }
        }
    }
</script>

<style scoped>

</style>