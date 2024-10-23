<template>
    <!-- Category Start -->
    <div class="container mt-4 shadow p-4 rounded">
        <h3 class="d-flex justify-content-center my-4">
            <span class="badge bg-primary py-3 px-3 container-fluid">
                {{ $t('explore_by_category') }}
            </span>
        </h3>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 col-sm-12" v-for="jobcat in displayedCategories" :key="jobcat.id">
                <a class="cat-item rounded p-4 text-center">
                    <img class="img-fluid border rounded mb-2" :src="storageImage(jobcat.image)" alt="" style="width: 80px; height: 80px;"/>
                    <router-link :to="{ name: 'jobcategory', params: { category_id: jobcat.id } }" class="text-decoration-none">
                        {{ jobcat.name }} ({{ jobcat.jobCount }})
                    </router-link>
                </a>
            </div>
        </div>
        <div class="mt-4">
            <button v-if="showMoreButton" @click="showMoreCategories" class="btn btn-primary">
                {{ $t('more') }} +
            </button>
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
                displayedCategories: [],
                visibleCount: 9,
                error: null,
            };
        },
        computed: {
            showMoreButton() {
                return this.displayedCategories.length < this.jobcateg.length;
            }
        },
        mounted() {
            this.getCatList();
        },
        methods: {
            async getCatList() {
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
                    this.displayedCategories = this.jobcateg.slice(0, this.visibleCount);
                } catch (error) {
                    this.error = "Error fetching job data. Please try again later.";
                }
            },
            showMoreCategories() {
                const newCount = Math.min(this.displayedCategories.length + this.visibleCount, this.jobcateg.length);
                this.displayedCategories = this.jobcateg.slice(0, newCount);
            }
        }
    }
</script>

<style scoped>
    .cat-item {
        border: 1px solid #dee2e6;
    }
</style>

