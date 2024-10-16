<template>
    <!-- Jobs Start -->
    <div class="container mt-4">
        <h1 class="text-center mb-5 ">Job Listing</h1>
        <div class="row">
            <template v-if="!isLoading && joblist.jobData !== undefined">
                <div class="col-sm-4 mb-4" v-for="(job, index) in joblist.jobData.data" :key="job.id">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body d-flex justify-content-between">
                            <div class="job-details">
                                <div class="job-title-text mb-3">
                                    <router-link :to="{ name: 'Details', params: { id: job.id }}" class="job-link text-decoration-none">
                                        <h5 class="card-title text-primary">
                                            <i class="bi bi-briefcase"></i>
                                            {{truncateString(job.position, 20)}}
                                        </h5>
                                    </router-link>
                                </div>
                                <router-link :to="{ name: 'jobcompany', params: { company_id : job.company_id }}" class="comp-name-text mb-2">
                                    <i class="bi bi-building"></i>
                                    <strong>Company:</strong>
                                    <span class="text-muted">
                                {{ job.company.name }}
                                </span>
                                    </router-link>
                                </div>
                                <div class="logo-container">
                                    <img style="height: 80px" :src="storageImage(job.image)" alt="Company Logo" class="company-logo" />
                                </div>
                            </div>
                            <div class="d-flex gap-2 p-3">
                                <router-link :to="{ name: 'Details', params: { id: job.id }}" class="btn btn-primary">Apply Now</router-link>
                                <button @click="saveJob(job)" class="btn btn-danger">Save Job</button>
                            </div>
                        </div>
                    </div>
                    <a v-if="joblist.jobData && joblist.jobData.current_page < joblist.jobData.last_page"
                       class="btn btn-primary py-3 px-5 mt-3"
                       @click="loadMoreJobs">
                        Browse More Jobs
                    </a>
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
    import  format  from 'date-fns/format';

    export default {
        name: "JobList",
        components: {Pagination, format},
        data() {
            return {
                savedJobs: new Set(),
                joblist: [],
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

            this.checkAuthentication();

            this.getRequiredData(['job_type'])
        },
        methods: {
            formatDate(dateString) {
                return format(new Date(dateString), 'MMMM d, yyyy');
            },
            truncateString(str, length) {
                if (str.length > length) {
                    return str.substring(0, length) + '...';
                }
                return str;
            },

            getJobList( page = 1) {
                try {
                    this.isLoading = true;
                    this.joblist = {};
                    axios.get(`/api/frontend/joblist`).then((response)=>{
                        this.isLoading = false;
                        this.joblist = response.data.result;
                    });
                } catch (error) {
                    this.error = "Error fetching job data. Please try again later.";
                }
            },


            async saveJob(job) {
                if (!this.isAuthenticated) {
                    this.$router.push('/seekerlogin');
                    return;
                }

                if (this.savedJobs.has(job.id)) {
                    this.$toast.info('Job is already saved!');
                    return;
                }

                try {
                    const response = await axios.post('/api/saved', {
                        job_id: job.id
                    });

                    this.savedJobs.add(job.id);
                    this.$toast.success('Job saved successfully!');
                } catch (error) {
                    console.error('Error saving job:', error);
                    this.$toast.error('Error saving job. Please try again.');
                }
            },

        }
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
</style>