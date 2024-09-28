<template>
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                            <h6 class="mt-n1 mb-0">Featured</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                            <h6 class="mt-n1 mb-0">Full Time</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                            <h6 class="mt-n1 mb-0">Part Time</h6>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="job-item p-4 mb-4" v-for="(job, index) in joblist" :key="job.id">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" :src="storageImage(job.image)" alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{ job.category.name }}</h5>
                                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ job.address }}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ job.job_type }}</span>
                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ job.salary }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                        <router-link class="btn btn-primary" :to="{ name: 'Details', params: { id: job.id }}">Apply Now</router-link>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ job.date_time}}</small>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="job-item p-4 mb-4" v-for="(fulljob, index) in fullTimelist" :key="fulljob.id">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" :src="storageImage(fulljob.image)" alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{ fulljob.category.name }}</h5>
                                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ fulljob.address }}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ fulljob.job_type }}</span>
                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ fulljob.salary }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                        <router-link class="btn btn-primary" :to="{ name: 'Details', params: { id: fulljob.id }}">Apply Now</router-link>

                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ fulljob.date_time}}</small>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="job-item p-4 mb-4" v-for="(partjob, index) in partTimelist" :key="partjob.id">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" :src="storageImage(partjob.image)" alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{ partjob.category.name }}</h5>
                                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ partjob.address }}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ partjob.job_type }}</span>
                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ partjob.salary }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                        <router-link class="btn btn-primary" :to="{ name: 'Details', params: { id: partjob.id }}">Apply Now</router-link>

                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ partjob.date_time}}</small>
                                </div>
                            </div>

                        </div>

                        <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
                    </div>
<!--                    <div id="tab-2" class="tab-pane fade show p-0">-->
<!--                        &lt;!&ndash; Similar structure for Full Time jobs &ndash;&gt;-->
<!--                        <div class="job-item p-4 mb-4" v-for="(job, index) in joblist.filter(job => job.job_type === 'full-time')" :key="job.id">-->
<!--                            &lt;!&ndash; Content here similar to Featured &ndash;&gt;-->
<!--                        </div>-->
<!--                        <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>-->
<!--                    </div>-->

<!--                    <div id="tab-3" class="tab-pane fade show p-0">-->
<!--                        &lt;!&ndash; Similar structure for Part Time jobs &ndash;&gt;-->
<!--                        <div class="job-item p-4 mb-4" v-for="(job, index) in joblist.filter(job => job.job_type === 'part-time')" :key="job.id">-->
<!--                            &lt;!&ndash; Content here similar to Featured &ndash;&gt;-->
<!--                        </div>-->
<!--                        <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->
</template>

<script>
    import axios from 'axios';

    export default {
        name: "JobList",
        data() {
            return {
                joblist: [], // Initialize jobList
                partTimelist: [], // Initialize jobList
                fullTimelist: [], // Initialize jobList
                error: null // Optional: to handle errors
            };
        },
        mounted() {
            this.getJobList();
            this.getpartList();
            this.getfulltimeList();
        },
        methods: {
            async getJobList() {
                try {
                    const response = await axios.get('/api/joblist');
                    this.joblist = response.data.result; // Assign the data to jobList
                } catch (error) {
                    console.error("Error fetching job data:", error);
                    this.error = "Error fetching job data. Please try again later."; // Set error message
                }
            },
            async getpartList() {
                try {
                    const response = await axios.get('/api/partTime');
                    this.partTimelist = response.data.result; // Assign the data to jobList
                } catch (error) {
                    console.error("Error fetching job data:", error);
                    this.error = "Error fetching job data. Please try again later."; // Set error message
                }
            },
            async getfulltimeList() {
                try {
                    const response = await axios.get('/api/fulTimelist');
                    this.fullTimelist = response.data.result; // Assign the data to jobList
                } catch (error) {
                    console.error("Error fetching job data:", error);
                    this.error = "Error fetching job data. Please try again later."; // Set error message
                }
            }
        }
    }
</script>

<style scoped>
    /* Add your styles here */
</style>
