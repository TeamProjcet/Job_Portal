<template>
    <div class="container mt-4">
        <h3>Search Result</h3>
        <div class="row">
            <div class="col-sm-6 mb-4" v-for="job in jobs" :key="job.id">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div class="job-details">
                            <div class="job-title-text mb-3">
                                <router-link :to="{ name: 'Details', params: { id: job.id }}" class="job-link text-decoration-none">
                                    <h5 class="card-title text-primary">{{ job.position }}</h5>
                                </router-link>
                            </div>
                            <router-link :to="{ name: 'jobcompany', params: { company_id : job.company_id }}" class="comp-name-text mb-2">
                                <strong>Company:</strong> <span class="text-muted">{{job.company.name}}</span>
                            </router-link>
                            <div class="locon-text mb-2">
                                <i class="bi bi-geo-alt"></i>
                                {{job.address}}
                            </div>
                            <div class="dead-text">
                                <i class="bi bi-calendar"></i>
                                <strong>Deadline:</strong> <span class="text-danger">{{job.date_time}}</span>
                            </div>
                        </div>
                        <div class="logo-container">
                            <img :src="storageImage(job.image)" alt="Company Logo" class="company-logo" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "JobResults",
        props: {
            jobs: {
                type: Array,
                required: true
            }
        },
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