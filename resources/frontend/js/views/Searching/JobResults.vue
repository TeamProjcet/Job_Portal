<template>
    <div class="container mt-4">
        <div class="row">
            <template v-if="jobs.length">
                <h3 class="d-flex justify-content-center my-4" >

                    <span class="badge bg-primary  py-3 px-3 container-fluid">
                  <i class="bi bi-search"></i> {{$t('search_results')}}
                   </span>
                </h3>
                <div class="col-sm-4 mb-4" v-for="job in jobs" :key="job.id">


                    <div class="card mb-3 shadow-sm">
                        <div class="card-body d-flex justify-content-between">
                            <div class="job-details">
                                <div class="job-title-text mb-3">
                                    <router-link :to="{ name: 'Details', params: { id: job.id }}"
                                                 class="job-link text-decoration-none">
                                        <h5 class="card-title text-primary">
                                            <i class="bi bi-briefcase"></i>
                                            {{truncateString(job.position, 20)}}
                                        </h5>
                                    </router-link>
                                </div>
                                <router-link :to="{ name: 'jobcompany', params: { company_id : job.company_id }}"
                                             class="comp-name-text mb-2">
                                    <i class="bi bi-building"></i>
                                    <strong>{{$t('company')}}:</strong>
                                    <span class="text-muted">{{ job.company.name }}</span>
                                </router-link>
                            </div>
                            <div class="logo-container">
                                <img style="height: 80px" :src="storageImage(job.image)" alt="Company Logo"
                                     class="company-logo"/>
                            </div>
                        </div>
                        <div class="m-lg-3">
                            <strong>{{$t('type')}}:</strong>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>
                                {{ job.job_type == 1 ? $t("remote") : (job.job_type == 2 ? $t("full_time") : (job.job_type == 3 ? $t("part_time") : $t("not_specified"))) }}
                            </span>

                        </div>
                        <div class="d-flex gap-2  p-3">
                            <router-link :to="{ name: 'Details', params: { id: job.id }}" class="btn btn-primary">Apply Now Or View</router-link>
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
            </template>
            <template v-else>
                <NotFoundComponent/>
            </template>

        </div>
    </div>
</template>

<script>
    import NotFoundComponent from "../NotFoundPage/NotFoundComponent";

    export default {
        name: "JobResults",
        components: {NotFoundComponent},
        data() {
            return {
                jobs: [],
                saveds:[],
                isAuthenticated:false

            };
        },
        mounted() {
            this.authData();
            this.loadSavedJobs();
            if (this.$route.query.jobs) {
                this.jobs = JSON.parse(this.$route.query.jobs);
            }
        },
        methods: {

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
