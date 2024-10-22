<template>
    <div class="container mt-4 shadow p-4 rounded">
        <div class="row">
            <h3 class="d-flex justify-content-center my-4" >

                    <span class="badge bg-primary  py-3 px-3 container-fluid">
                        Job Listing
                   </span>
            </h3>
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
                        <router-link :to="{ name: 'Details', params: { id: jobcom.id }}" class="btn btn-primary">Apply Now Or View</router-link>
                        <a
                                @click="saveJob(jobcom)"
                                :class="{'btn btn-info': saveds.includes(jobcom.id), 'btn btn-secondary': !saveds.includes(jobcom.id)}">
                                    <span v-if="saveds.includes(jobcom.id)">
                                        <i class="fa fa-check"></i>
                                    </span>
                            {{ saveds.includes(jobcom.id) ? ' ' : ' Save Job' }}
                        </a>
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
                saveds:[],
                isAuthenticated:false,
                error: null
            };
        },
        mounted() {
            this.companyList();
            this.authData();
            this.loadSavedJobs();
            if (this.$route.query.jobs) {
                this.jobs = JSON.parse(this.$route.query.jobs);
            }
        },
        methods: {

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