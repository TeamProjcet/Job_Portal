<template>
    <!-- Jobs Start -->
    <div class="container mt-4 shadow p-4 rounded">
        <h3 class="d-flex justify-content-center my-4">
        <span class="badge bg-primary py-3 px-3 container-fluid">
            {{$t("job_listing")}} <!-- Translated text here -->
        </span>
        </h3>
        <div class="row">
            <template v-if="!isLoading && joblist.jobData !== undefined">
                <div class="col-sm-4 mb-4" v-for="(job, index) in joblist.jobData.data" :key="job.id">
                    <div class="card mb-3 shadow hover-card">
                        <div class="card-body d-flex justify-content-between">
                            <div class="job-details">
                                <div class="job-title-text mb-3">
                                    <router-link :to="{ name: 'Details', params: { id: job.id }}" class="job-link text-decoration-none">
                                        <h5 class="card-title text-primary">
                                            <i class="bi bi-briefcase"></i>
                                            {{ truncateString(job.position, 20) }}
                                        </h5>
                                    </router-link>
                                </div>
                                <router-link :to="{ name: 'jobcompany', params: { company_id: job.company_id }}" class="comp-name-text mb-2">
                                    <i class="bi bi-building"></i>
                                    <strong>{{$t("company")}}:</strong>
                                    <span class="text-muted">{{ job.company.name }}</span>
                                </router-link>
                            </div>
                            <div class="logo-container">
                                <img style="height: 80px" :src="storageImage(job.image)" alt="Company Logo" class="company-logo" />
                            </div>
                        </div>
                        <div class="m-lg-3">
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>
                                {{ job.job_type == 1 ? $t("remote") : (job.job_type == 2 ? $t("full_time") : (job.job_type == 3 ? $t("part_time") : $t("not_specified"))) }} <!-- Translated text here -->
                            </span>
                        </div>
                        <div class="d-flex gap-2 p-3">
                            <router-link :to="{ name: 'Details', params: { id: job.id }}" class="btn btn-primary">{{$t("apply_now_or_view")}}</router-link> <!-- Translated text here -->
                            <a
                                    @click="saveJob(job)"
                                    :class="{'btn btn-info': saveds.includes(job.id), 'btn btn-secondary': !saveds.includes(job.id)}">
                                <span v-if="saveds.includes(job.id)">
                                    <i class="fa fa-check"></i>
                                </span>
                                {{ saveds.includes(job.id) ? ' ' : $t("save_job") }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <pagination previousText="prev" nextText="next" :data="joblist.jobData" @paginateTo="getJobList"></pagination>
                </div>
            </template>

            <template v-else>
                <span class="dataLoader"><i class="fa fa-spin fa-spinner"></i></span>
            </template>
        </div>
    </div>
    <!-- Jobs End -->
</template>


<script>
    import axios from 'axios';
    import Pagination from "../plugins/pagination/pagination";

    export default {
        name: "JobList",
        components: {Pagination},
        data() {
            return {
                savedJobs: new Set(),
                saveds: [],
                joblist: {jobData: { data: [] }},
                error: null,
                isLoading : false,
                isAuthenticated:false
            };
        },
        watch: {
            '$route.query': {
                handler: function(newValue) {
                    this.job_type = this.$route.query.job_type;
                    this.getJobList();
                },
                deep: true
            }
        },
        mounted() {
            this.getJobList();
            this.authData();
            this.loadSavedJobs();
            this.getRequiredData(['job_type']);
        },
        methods: {
            getJobList(page = 1) {
                this.isLoading = true;
                this.joblist = {};
                axios.get(`/api/frontend/joblist?page=${page}`)
                    .then((response) => {
                        this.isLoading = false;
                        this.joblist = response.data.result;
                    })
                    .catch((error) => {
                        this.isLoading = false;
                        this.error = "Error fetching job data. Please try again later.";
                    });
            },

        },
    }
</script>

<style scoped>
    .dataLoader i{
        font-size: 50px;
    }

    .logo-container {
        display: flex;
        align-items: center;
    }

    .company-logo {
        max-width: 80px;
        height: auto;
    }
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }
</style>