<template>
    <div class="container-fluid">
        <h1 class="mt-4">{{$route.meta.pagetitle}}</h1>
        <div class="row application-container">
            <div class="col-md-7 application-details card" v-if="application">
                <div class="card-header">
                    <h6 class="card-title">Applicant Information</h6>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{application.seeker.name}}</p>
                    <p><strong>Email:</strong> {{application.seeker.email}}</p>
                    <p><strong>Address:</strong>{{application.job.address}}</p>
                    <p><strong>Birth/NID No:</strong> 5684 5684 675</p>
                    <p><strong>Phone:</strong> 01700000000</p>


                    <h6 class="card-title mt-4">Cover Letter</h6>
                    <p>{{application.coverLetter}}</p>
                </div>
                <p>
                    <strong>Status:</strong>
                    <select v-model="applicationStatus" @change="updateApplicationStatus">
                        <option value="0">Pending</option>
                        <option value="1">Accepted</option>
                        <option value="2">Rejected</option>
                    </select>
                </p>
            </div>
            <div class="col-md-5" v-if="application">
                <iframe
                        class="resume-iframe card"
                        :src="storageImage(application.image)"
                        title="Resume PDF"
                        style="width: 100%; height: 100vh;">
                </iframe>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Toast from "vue-toastification";

    export default {
        name: "ApplicationView",
        data() {
            return {
                application: null,
                isLoading: true,
                applicationStatus: 0,
                components:{
                    Toast
                }
            };
        },

        mounted() {
            this.getApplicationDetails();
        },
        methods: {
            async getApplicationDetails() {
                const id = this.$route.params.id;
                try {
                    const response = await axios.get(`/api/frontend/application/${id}`);
                    this.application = response.data.result;
                    this.applicationStatus = this.application.application_status;
                } catch (error) {
                    console.error('Error fetching application data:', error);
                } finally {
                    this.isLoading = false;
                }
            },
            async updateApplicationStatus() {
                try {
                    const id = this.$route.params.id;
                    const response = await axios.put(`/api/frontend/application/${id}`, {
                        status: this.applicationStatus,
                    });
                    this.application.application_status = this.applicationStatus;
                    // console.log('Application status updated:', response.data);
                    this.$toast.success('Application status updated successfully!');
                } catch (error) {
                    console.error('Error updating application status:', error);
                }
            },
        }
    }
</script>

<style scoped>
    .application-container {
        margin-top: 20px;
    }
    .resume-iframe {
        width: 100%;
        height: 600px;
        border: none;
    }
    .application-details {
        padding: 1.5rem;
    }
    .card {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    select {
        margin-left: 10px;
        padding: 5px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }
</style>

