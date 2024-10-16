<template>
    <div class="container-fluid page-background"> <!-- Background class added -->
        <h1 class="mt-4 text-center">{{$route.meta.pagetitle}}</h1> <!-- Center the page title -->
        <div class="row justify-content-center application-container">
            <div class="col-md-7 application-details card" v-if="application">
                <div class="card-header">
                    <h6 class="card-title">Interview Information</h6>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td class="bg-light p-2 text-dark">
                                <label >Interview Status:</label>

                                <span :class="{
                    'bg-primary p-1 ': application.interview_status == 1,
                    'bg-secondary p-1': application.interview_status == 2,
                    'bg-info p-1 ': application.interview_status == 0,
                    'bg-danger p-1 ': application.interview_status == 3,
                }">
                    <label class="badge mx-1 text-white"> {{ application.interview_status == 0 ? 'Scheduled' : application.interview_status == 1 ? 'Completed' : application.interview_status == 2 ? 'Selected' : 'Rejected' }}</label>
                </span>
                            </td>
                        </tr>
                    </table>

                    <h6 class="card-title mt-4">Notice:</h6>
                    <p v-html="application.note ? application.note : 'Your Document will be Veryfied, Soon...'"></p>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Toast from "vue-toastification";

    export default {
        name: "InterviewNoticeComponent",
        data() {
            return {
                application: null,
                isLoading: true,

            };
        },

        mounted() {
            this.getApplicationDetails();
        },
        methods: {
            async getApplicationDetails() {
                const id = this.$route.params.id;
                try {
                    const response = await axios.get(`/api/application/${id}`);
                    this.application = response.data.result;
                } catch (error) {
                    console.error('Error fetching application data:', error);
                } finally {
                    this.isLoading = false;
                }
            },
        }
    }
</script>

<style scoped>
    .page-background {
        background-color: #f7f7f7;
        padding: 20px;
        min-height: 70vh;
    }

    .application-container {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 40vh;
    }

    h1 {
        text-align: center; /* Center the page title */
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
