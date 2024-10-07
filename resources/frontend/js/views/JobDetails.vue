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
                            <div v-if="isAuthenticated">
                                <h4 class="mb-4">Apply For The Job</h4>
                                <form @submit.prevent="submitApplication">
                                    <div class="row g-3">
                                        <div class="col-12 col-sm-6">
                                            <input type="text" class="form-control" placeholder="Your Name" v-model="fromData.name" readonly>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <input type="email" class="form-control" placeholder="Your Email" v-model="fromData.email" readonly>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label"> Portfolio/Linkdin/Github</label>

                                            <input type="url" class="form-control" placeholder="Portfolio Website" v-model="fromData.portfolio">
                                        </div>


                                        <div class="col-12">
                                            <textarea class="form-control" rows="5" placeholder="Cover Letter" v-model="fromData.coverLetter"></textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Upload your resume</label>
                                                <div @click="clickFileField('imageField')" class="image_upload" :style="{ 'background-image': 'url(' + publicImage('images/uploading.avif') + ')' }">
                                                    <template v-if="fromData.image !== undefined">
                                                        <img class="photo" :src="storageImage(fromData.image)">
                                                    </template>
                                                </div>
                                                <input @change="uploadImage($event, fromData, 'image')" type="file" name="image" id="imageField" class="file_field">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div v-else>
                                <router-link to="/seekerlogin" class="nav-link">
                                    <button class="btn btn-primary w-100">Login</button>
                                </router-link>
                            </div>
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
    import Toast from "vue-toastification";

    export default {
        name: "JobDetails",
        props: ['id'],

        data() {
            return {
                job: {
                    category: {},
                },
                isAuthenticated:false,

                components:{
                    Toast
                }

            };
        },
        mounted() {
            this.getJobDetails();
            this.checkAuthentication();
        },
        methods: {
            async getJobDetails() {
                const _this=this;
                try {
                    const response = await axios.get(`/api/joblist/${this.id}`);
                    if (response.data && response.data.result) {
                        _this.job = response.data.result;
                    } else {
                        _this.error = "No Job details found.";
                    }
                } catch (error) {

                    _this.error = "Failed to load Job details.";
                }
            },


                async submitApplication() {

                    this.fromData.job_id = this.job.id;
                    this.fromData.seeker_id = this.seeker.id;
                    axios.post('/api/frontend/application', this.fromData)
                        .then(function (res) {
                            if (parseInt(res.data.status) === 2000) {
                                this.$toast.success(" Application submitted successfully");

                            } else {
                                this.$toast.error("Application failed!");
                            }
                        })
                        .catch(function (error) {
                            if (error.response) {
                                _this.error = "No Job details found.";

                            }
                        });
                },

        }
    };
</script>

<style scoped>
    .image_upload img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 4px;
    }
    .image_upload {
        height: 120px;
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        cursor: pointer;
        border: 2px dashed #007bff;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .photo {
        height: 100%;
        width: 100%;
        border-radius: 4px;
    }
    #imageField {
        display: none;
    }

</style>


