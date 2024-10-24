<template>
    <div class="container mt-4 shadow p-4 rounded">
        <div class="row">
            <h3 class="d-flex justify-content-center my-4" >

                    <span class="badge bg-primary  py-3 px-3 container-fluid">
                    {{ $t('job_listing') }}
                   </span>
            </h3>
            <div class="col-sm-4 mb-4" v-for="jobcat in jobcategory.jobPosts" :key="jobcat.id">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div class="job-details">
                            <div class="job-title-text mb-3">
                                <router-link :to="{ name: 'Details', params: { id: jobcat.id }}" class="job-link text-decoration-none">
                                    <h5 class="card-title text-primary">
                                        <i class="bi bi-briefcase"></i>
                                        {{truncateString(jobcat.position, 20)}}
                                    </h5>
                                </router-link>
                            </div>
                            <router-link :to="{ name: 'jobcompany', params: { company_id : jobcat.company_id }}" class="comp-name-text mb-2">
                                <i class="bi bi-building"></i>
                                <strong>{{$t('company')}}:</strong>
                                <span class="text-muted">
                                {{ jobcat.company.name }}
                                </span>
                            </router-link>
                        </div>
                        <div class="logo-container">
                            <img style="height: 80px" :src="storageImage(jobcat.image)" alt="Company Logo" class="company-logo" />
                        </div>
                    </div>
                    <div class="m-lg-3">
                        <strong>{{$t('type')}}:</strong>
                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>
                                {{ jobcat.job_type == 1 ? $t("remote") : (jobcat.job_type == 2 ? $t("full_time") : (jobcat.job_type == 3 ? $t("part_time") : $t("not_specified"))) }}
                        </span>

                    </div>
                    <div class="d-flex gap-2  p-3">
                        <router-link :to="{ name: 'Details', params: { id: jobcat.id }}" class="btn btn-primary">{{ $t('apply_now_or_view') }}</router-link>
                        <a
                                @click="saveJob(jobcat)"
                                :class="{'btn btn-info': saveds.includes(jobcat.id), 'btn btn-secondary': !saveds.includes(jobcat.id)}">
                                    <span v-if="saveds.includes(jobcat.id)">
                                        <i class="fa fa-check"></i>
                                    </span>
                            {{ saveds.includes(jobcat.id) ? ' ' : $t('save_job') }}
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
        name: "JobCategory",
        props: ['category_id'],
        data() {
            return {
                jobcategory: [],
                saveds:[],
                isAuthenticated:false,
                error: null,
            };
        },
        mounted() {
            this.getDataList();
            this.authData();
            this.loadSavedJobs();
            if (this.$route.query.jobs) {
                this.jobs = JSON.parse(this.$route.query.jobs);
            }
        },
        methods: {

            async getDataList() {
                if (!this.category_id) {
                    this.error = "Category ID is not defined.";
                    return;
                }
                try {
                    const response = await axios.get(`/api/frontend/jobcate/${this.category_id}`);
                    this.jobcategory = response.data.result;
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
