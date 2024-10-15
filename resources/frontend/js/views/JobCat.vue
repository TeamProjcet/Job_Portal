<template>
    <!-- Category Start -->
    <div class="container mt-4">
        <div class="container mt-4">
            <h1 class="text-center mb-5 " >Explore By Category</h1>
            <div class="row g-4 " style="max-height: 400px;"> <!-- Adjust max-height as needed -->
                <div class="col-lg-4 col-md-4 col-sm-4"  v-for="jobcat in jobcateg" :key="jobcat.id">
                    <a class="cat-item rounded p-4">
                        <img class="flex-shrink-0 img-fluid border rounded" :src="storageImage(jobcat.image)" alt="" style="width: 80px; height: 80px;">
                        <router-link :to="{ name: 'jobcategory', params: { category_id: jobcat.id } }">
                            {{ jobcat.name }} ( {{jobcat.jobCount}} )
                        </router-link>
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
                jobcateg: [],
                error: null,


            };
        },
        mounted() {
            this.getDataList();
        },
        methods: {
            async getDataList() {
                try {
                    const { data } = await axios.get('/api/frontend/joblist');
                    const jobs = data.result.jobData.data;
                    const categories = data.result.category;
                    const jobCountMap = jobs.reduce((map, { category_id }) => {
                        map[category_id] = (map[category_id] || 0) + 1;
                        return map;
                    }, {});

                    this.jobcateg = categories.map(cat => ({
                        ...cat,
                        jobCount: jobCountMap[cat.id] || 0
                    }));

                } catch (error) {
                    this.error = "Error fetching job data. Please try again later.";
                }
            }

        }
    }
</script>

<style scoped>

</style>

