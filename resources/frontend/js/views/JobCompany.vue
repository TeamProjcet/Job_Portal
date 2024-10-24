<template>
    <div class="container mt-4 shadow p-4 rounded">
        <div class="row">
            <h3 class="d-flex justify-content-center my-4" >

                    <span class="badge bg-primary  py-3 px-3 container-fluid">
              {{ $t('job_listing') }}
                   </span>
            </h3>
            <div class="col-sm-4 mb-4" v-for="jobcom in jobcompany.companycate.data" :key="jobcom.id">
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
                                <p  class="comp-name-text mb-2">
                                    <i class="bi bi-building"></i>
                                    <strong>{{$t('company')}}:</strong>
                                    <span class="text-muted">
                                    {{ jobcom.company.name }}
                                    </span>
                                </p>
                        </div>
                        <div class="logo-container">
                            <img style="height: 80px" :src="storageImage(jobcom.image)" alt="Company Logo" class="company-logo" />
                        </div>
                    </div>
                    <div class="m-lg-3">
                        <strong>Type:</strong>
                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ jobcom.job_type == 1 ? 'Remote' : (jobcom.job_type == 2 ? 'Full Time' : (jobcom.job_type == 3 ? 'Part Time' : 'Not Specified')) }}</span>

                    </div>
                    <div class="d-flex gap-2  p-3">
                        <router-link :to="{ name: 'Details', params: { id: jobcom.id }}" class="btn btn-primary">  {{ $t('apply_now_or_view') }}</router-link>
                        <a
                                @click="saveJob(jobcom)"
                                :class="{'btn btn-info': saveds.includes(jobcom.id), 'btn btn-secondary': !saveds.includes(jobcom.id)}">
                                    <span v-if="saveds.includes(jobcom.id)">
                                        <i class="fa fa-check"></i>
                                    </span>
                            {{ saveds.includes(jobcom.id) ? ' ' : $t('save_job') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-lg-start">
                <pagination previousText="PREV" nextText="NEXT" :data="jobcompany.companycate" @paginateTo="companyList"></pagination>
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
                jobcompany: {companycate:{data: []}},
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

            async companyList(page = 1) {
                if (!this.company_id) {
                    this.error = "company ID is not defined.";
                    return;
                }
                try {
                    const response = await axios.get(`/api/frontend/jobcate/${this.company_id}?page=${page}`);
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