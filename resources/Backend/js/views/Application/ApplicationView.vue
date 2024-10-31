<template>
    <div class="container-fluid">
        <h1 class="mt-4">{{$route.meta.pagetitle}}</h1>
        <div class="row application-container">
            <div class="col-md-7 application-details card" v-if="application">
                <div class="card-header">
                    <h6 class="card-title">Applicant Information</h6>
                </div>
                <div class="card-body">
                    <h3><strong>Position:</strong> {{application.job.position}}</h3>

                    <p><strong>Name:</strong> {{application.seeker.name}}</p>
                    <p><strong>Email:</strong> {{application.seeker.email}}</p>
                    <p><strong>Experience:</strong> {{application.seeker.experience}}</p>
                    <p v-if="parsedSkills && parsedSkills.length">
                        <strong>Skills:</strong>
                        <label class="badge mx-1" v-for="(Skills, index) in parsedSkills" :key="index">{{ Skills }}</label>
                    </p>
                    <p v-if="parsedEducation && parsedEducation.length">
                        <strong>Education:</strong>
                        <label class="badge  mx-1" v-for="(educat, index) in parsedEducation" :key="index">{{ educat }}</label>
                    </p>

                    <p><strong>Address:</strong>{{application.job.address}}</p>
                    <p><strong>Phone:</strong> {{application.phone}}</p>

                    <h6 class="card-title mt-4">Cover Letter</h6>
                    <p v-html="application.coverLetter"></p>
                </div>
                <hr>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                    <p>
                        <label>Status:</label>
                        <select v-model="applicationStatus" @change="updateApplicationStatus">
                            <option disabled>Select application Status</option>
                            <template v-for="(status,index) in requireData.application_status"  >
                                <option :value="status.value">{{status.name}}</option>

                            </template>
                        </select>
                    </p>
                    <p>
                        <label>InterView:</label>
                        <select v-model="interviewStatus" @change="updateApplicationStatus">
                            <option disabled>Select Interview Status</option>
                            <template v-for="(status,index) in requireData.interview_status"  >
                                <option :value="status.value">{{status.name}}</option>
                            </template>
                        </select>
                    </p>
                    </div>
                    <div class="col-md-7">
                    <form @submit.prevent="updateApplicationStatus">

                        <h5>Note</h5>
                        <editor type="text" v-model="note" class="form-control" name="note" />

                        <button type="submit"  class="btn btn-success mt-2">submit</button>
                    </form>
                    </div>
                </div>
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
                interviewStatus: 0,
                note:'',
                components:{
                    Toast
                }
            };
        },


        mounted() {
            this.getApplicationDetails();
            this.getRequiredData(['application_status','interview_status']);
        },
        methods: {
            async getApplicationDetails() {
                const id = this.$route.params.id;
                try {
                    const response = await axios.get(`/api/application/${id}`);
                    this.application = response.data.result;
                    this.applicationStatus = this.application.application_status;
                    this.interviewStatus = this.application.interview_status;
                } catch (error) {
                    console.error('Error fetching application data:', error);
                } finally {
                    this.isLoading = false;
                }
            },
            async updateApplicationStatus() {
                try {
                    const id = this.$route.params.id;
                    const response = await axios.put(`/api/application/${id}`, {
                        application_status: this.applicationStatus,
                        interview_status: this.interviewStatus,
                        note: this.note, // Correct note field usage
                    });
                    this.application.application_status = this.applicationStatus;
                    this.application.interview_status = this.interviewStatus;
                    this.note = '';
                    this.$toast.success('Application status updated successfully!');

                } catch (error) {
                    console.error('Error updating application status:', error);
                }
            }

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