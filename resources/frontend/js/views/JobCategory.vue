<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6 mb-4" v-for="jobcat in jobcategory.jobPosts" :key="jobcat.id">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div class="job-details">
                            <div class="job-title-text mb-3">
                                <router-link :to="{ name: 'Details', params: { id: jobcat.id }}" class="job-link text-decoration-none">
                                    <h5 class="card-title text-primary">{{ jobcat.position }}</h5>
                                </router-link>
                            </div>
                            <router-link :to="{ name: 'jobcompany', params: { company_id : jobcat.company_id }}" class="comp-name-text mb-2">
                                <strong>Company:</strong> <span class="text-muted">{{ jobcat.company.name }}</span>
                            </router-link>
                            <div class="locon-text mb-2">
                                <i class="bi bi-geo-alt"></i>
                                {{ jobcat.address }}
                            </div>
                            <div class="dead-text">
                                <i class="bi bi-calendar"></i>
                                <strong>Deadline:</strong> <span class="text-danger">{{ jobcat.date_time }}</span>
                            </div>
                        </div>
                        <div class="logo-container">
                            <img :src="storageImage(jobcat.image)" alt="Company Logo" class="company-logo" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    this.error = "Category ID is not defined.";
                    return;
                }
                try {
                    const response = await axios.get(`/api/frontend/jobcate/${this.category_id}`);
                    this.jobcategory = response.data.result;;
                } catch (error) {
                    this.error = "Error fetching job data. Please try again later.";
                }
            },
        }
    }
</script>

<style scoped>
    .logo-container {
        display: flex;
        align-items: center;
    }

    .company-logo {
        max-width: 80px;
        height: auto;
    }
</style>
