<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-4 mb-4" v-for="jobcom in jobcompany" :key="jobcom.id">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div class="job-details">
                            <div class="job-title-text mb-3">
                                <router-link :to="{ name: 'Details', params: { id: jobcom.id }}" class="job-link text-decoration-none">
                                    <h5 class="card-title text-primary">
                                        <i class="bi bi-briefcase"></i>
                                        {{truncateString(jobcom.position, 20)}}
                                    </h5>
                                </router-link>
                            </div>
                            <router-link :to="{ name: 'jobcompany', params: { company_id : jobcom.company_id }}" class="comp-name-text mb-2">
                                <i class="bi bi-building"></i>
                                <strong>Company:</strong>
                                <span class="text-muted">
                                {{ jobcom.company.name }}
                                </span>
                            </router-link>
                        </div>
                        <div class="logo-container">
                            <img style="height: 80px" :src="storageImage(jobcom.image)" alt="Company Logo" class="company-logo" />
                        </div>
                    </div>
                    <div class="d-flex gap-2  p-3">
                        <router-link :to="{ name: 'Details', params: { id: jobcom.id }}" class="btn btn-primary">Apply Now</router-link>
                        <button class="btn btn-danger">Save Job</button>
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
            this.companyList();
        },
        methods: {

            truncateString(str, length) {
                if (str.length > length) {
                    return str.substring(0, length) + '...';
                }
                return str;
            },

            async companyList() {
                if (!this.company_id) {
                    this.error = "company ID is not defined.";
                    return;
                }
                try {
                    const response = await axios.get(`/api/frontend/jobcate/${this.company_id}`);
                    this.jobcompany = response.data.result.companycate;
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