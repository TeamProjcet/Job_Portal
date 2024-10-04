<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6 mb-4" v-for="jobcom in jobcompany.jobPosts" :key="jobcom.id">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div class="job-details">
                            <div class="job-title-text mb-3">
                                <router-link :to="{ name: 'Details', params: { id: jobcom.id }}" class="job-link text-decoration-none">
                                    <h5 class="card-title text-primary">{{ jobcom.position }}</h5>
                                </router-link>
                            </div>
                            <div class="comp-name-text mb-2">
                                <strong>Company:</strong> <span class="text-muted">{{jobcom.company.name}}</span>
                            </div>
                            <div class="locon-text mb-2">
                                <i class="bi bi-geo-alt"></i>
                                {{jobcom.address}}
                            </div>
                            <div class="dead-text">
                                <i class="bi bi-calendar"></i>
                                <strong>Deadline:</strong> <span class="text-danger">{{jobcom.date_time}}</span>
                            </div>
                        </div>
                        <div class="logo-container">
                            <img :src="storageImage(jobcom.image)" alt="Company Logo" class="company-logo" />
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
        name: "JobCompany",
        props: ['company_id'],
        data() {
            return {
                jobcompany: [],
                error: null
            };
        },
        mounted() {
            this.getDataList();
        },
        methods: {
            async getDataList() {
                if (!this.company_id) {
                    this.error = "company ID is not defined.";
                    return;
                }
                try {
                    const response = await axios.get(`/api/frontend/jobcate/${this.company_id}`);
                    this.jobcompany = response.data.result;
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