<template>
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item"  v-for="(type, index) in requireData.job_type">
                        <router-link :to="`/job-list?job_type=${type.value}`" class="d-flex align-items-center text-start mx-3 pb-3" :class="(parseInt(type.value) === parseInt($route.query.job_type))? 'active' : ''">
                            <h6 class="mt-n1 mb-0">{{type.name}}</h6>
                        </router-link>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <template v-if="!isLoading && joblist.jobData !== undefined">
                            <div class="job-item p-4 mb-4" v-for="(job, index) in joblist.jobData.data" :key="job.id">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" :src="storageImage(job.image)" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{ job.position }}</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ job.address }}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i> {{job.job_type == 1 ? 'Featured' : job.job_type == 2 ? 'Full Time' : (job.job_type == 3 ? 'Part Time' : 'Unknown') }}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ job.salary || 'Negotiatable' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3"><i class="far fa-heart text-primary"></i></a>
                                            <router-link class="btn btn-primary" :to="{ name: 'Details', params: { id: job.id }}">Apply Now</router-link>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ job.date_time}}</small>
                                    </div>
                                </div>
                            </div>
                            <a v-if="joblist.jobData && joblist.jobData.current_page < joblist.jobData.last_page"
                               class="btn btn-primary py-3 px-5"
                               @click="loadMoreJobs">
                                Browse More Jobs
                            </a>
<!--                            <pagination previousText="PREV" nextText="NEXT" :data="joblist.jobData" @paginateTo="getJobList"></pagination>-->

                        </template>
                        <template v-else>
                            <span class="dataLoader"><i class="fa fa-spin fa-spinner"></i></span>
                        </template>
                    </div>
                </div>
            </div>

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
                joblist: [],
                error: null,
                isLoading : false,
                job_type : 1,
                favourites:[]
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
            // this.loadFavourites();
            this.getRequiredData(['job_type'])
        },
        methods: {
            getJobList( page = 1) {
                try {
                    this.isLoading = true;
                    this.joblist = {};
                    axios.get(`/api/frontend/joblist?job_type=${this.job_type}&page=${page}`).then((response)=>{
                        this.isLoading = false;
                        this.joblist = response.data.result;
                    });
                } catch (error) {
                    this.error = "Error fetching job data. Please try again later.";
                }
            },
            loadMoreJobs() {
                if (this.joblist.jobData.current_page < this.joblist.jobData.last_page) {
                    let nextPage = this.joblist.jobData.current_page + 1;
                    this.getJobList(nextPage);
                }
            },
            loadFavourites() {
                axios.get('/api/frontend/favourites')
                    .then(response => {
                        this.favourites = response.data;
                    });
            },
            addFavourite(jobId) {
                axios.post('/api/frontend/favourites', { job_id: jobId })
                    .then(() => {
                        this.loadFavourites();
                    });
            },

        }
    }
</script>

<style scoped>
    .dataLoader i{
        font-size: 50px;
    }
</style>
