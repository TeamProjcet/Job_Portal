<template>
    <div class="container-xxl bg-white p-0">
        <!-- Header Start -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
            </div>
        </div>
        <!-- Header End -->

        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4" >
                    <div class="col-lg-8" >
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" :src="storageImage(job.image)" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3">{{ job.position }}</h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ job.address }}</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ job.job_type == 1 ? 'Full Time' : (job.job_type == 2 ? 'Part Time' : 'Not Specified') }}</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ job.salary || 'Negotiable'}}</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <p v-html="job.details"></p>
                        </div>

                        <div>
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form>
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Your Name"  >
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" class="form-control" placeholder="Your Email"  >
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Portfolio Website" >
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="file" class="form-control bg-white" >
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" placeholder="Cover Letter"  ></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div v-if="job" class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summary</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ job.date_time }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Category: {{job.category.name}} </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: 01</p>
                            <p>
                                <i class="fa fa-angle-right text-primary me-2"></i>
                                Job Nature: {{ job.job_type == 1 ? 'Full Time' : (job.job_type == 2 ? 'Part Time' : 'Not Specified') }}
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{ job.salary || 'Negotiable' }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ job.address }}</p>
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: 2024-10-05</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "JobDetails",
        props: ['id'],
        data() {
            return {
                job: {category: { name: '' }}, // null to indicate loading state

            };
        },
        mounted() {
            this.getJobDetails();
        },
        methods: {
            async getJobDetails() {
                try {
                    const response = await axios.get(`/api/joblist/${this.id}`);
                    // console.log("Full API Response:", response);

                    if (response.data && response.data.result) {
                        this.job = response.data.result; // Assign result post
                    } else {
                        this.error = "No blog details found.";
                    }
                } catch (error) {
                    // console.error("Error fetching blog details:", error.response ? error.response.data : error.message);
                    this.error = "Failed to load blog details.";
                }
            },

        }
    };
</script>

<style scoped>
    /* Add your styles here */
</style>

