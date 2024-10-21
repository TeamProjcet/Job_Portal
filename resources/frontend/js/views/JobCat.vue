<template>
    <!-- Category Start -->
    <div class="container mt-4 shadow p-4 rounded">
        <h3 class="d-flex justify-content-center my-4" >
                    <span class="badge bg-primary  py-3 px-3 container-fluid">
                    Explore By Category
                   </span>
        </h3>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 col-sm-12" v-for="jobcat in jobcateg" :key="jobcat.id">
                <a class="cat-item rounded p-4 text-center">
                    <img class="img-fluid border rounded mb-2"
                         :src="storageImage(jobcat.image)"
                         alt=""
                         style="width: 80px; height: 80px;">
                    <router-link :to="{ name: 'jobcategory', params: { category_id: jobcat.id } }" class="text-decoration-none">
                        {{ jobcat.name }} ({{ jobcat.jobCount }})
                    </router-link>
                </a>
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
    .cat-item {
        border: 1px solid #dee2e6;
    }
</style>
