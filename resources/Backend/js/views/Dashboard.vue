<template>
    <div>
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Add Customer</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-md-3 mb-3"> <!-- Increased card size -->
                <div class="card card-stats card-round h-100"> <!-- Full height card -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Visitors</p>
                                    <h4 class="card-title">0{{ Visitors.length }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-3 mb-3">
                <div class="card card-stats card-round h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Subscribers</p>
                                    <h4 class="card-title">0{{Subscriber.length}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-3 mb-3">
                <div class="card card-stats card-round h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Employer</p>
                                    <h4 class="card-title">0{{Employer.length}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-3 mb-3">
                <div class="card card-stats card-round h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Seeker</p>
                                    <h4 class="card-title">0{{Seeker.length}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Dashboard",

        data(){
            return{
                Visitors: [],
                Subscriber: [],
                Employer: [],
                Seeker: [],
            }
        },

        mounted() {
            this.getCounting()
        },

        methods:{
            getCounting(){
                axios.get(`/api/Counting`)
                    .then((response) => {
                        this.Visitors = response.data.result.visitor;
                        this.Subscriber = response.data.result.subscriber;
                        this.Employer = response.data.result.employer;
                        this.Seeker = response.data.result.seeker;
                    })
                    .catch((error) => {
                        this.error = "Error fetching job data. Please try again later.";
                    });
            }
        }
    }
</script>

<style scoped>
    /* Add any custom styles here if needed */
</style>
