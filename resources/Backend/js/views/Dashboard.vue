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
            <div class="col-sm-5 col-md-3 mb-3">
                <div class="card card-stats card-round h-100">
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
                                    <h4 class="card-title">{{ Visitors.length }}</h4>
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
                                    <h4 class="card-title">{{Subscriber.length}}</h4>
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
                                    <h4 class="card-title">{{Employer.length}}</h4>
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
                                    <h4 class="card-title">{{Seeker.length}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-md-3 mb-3">
                <div class="card card-stats card-round h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-briefcase"></i> <!-- Job Post icon -->
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Job Post</p>
                                    <h4 class="card-title">{{ Job_Post.length }}</h4>
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
                                    <i class="fas fa-check-square"></i> <!-- Applied Jobs icon -->
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Applied Job</p>
                                    <h4 class="card-title">{{ Applied.length }}</h4>
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
                                    <i class="fas fa-handshake"></i> <!-- Partnership icon -->
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Partnership</p>
                                    <h4 class="card-title">{{ Partnership.length }}</h4>
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
                                    <i class="fas fa-pencil-alt"></i> <!-- Blog Post icon -->
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Blog Post</p>
                                    <h4 class="card-title">{{ Blog_Post.length }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Bar
                v-if="loaded"
                :data="chartData"
                :chart-options="chartOptions"
                :chart-id="chartId"
                :dataset-id-key="datasetIdKey"
                :plugins="plugins"
                :css-classes="cssClasses"
                :styles="styles"
                :width="width"
                :height="height"
        />
    </div>
</template>

<script>
    import axios from 'axios';
    import { Bar } from 'vue-chartjs';

    import {
        Chart as ChartJS,
        Title,
        Tooltip,
        Legend,
        BarElement,
        CategoryScale,
        LinearScale
    } from 'chart.js';
    ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

    export default {
        name: "Dashboard",
        components: { Bar},
        props: {
            chartId: {
                type: String,
                default: 'bar-chart'
            },
            datasetIdKey: {
                type: String,
                default: 'label'
            },
            width: {
                type: Number,
                default: 400
            },
            height: {
                type: Number,
                default: 100
            },
            cssClasses: {
                default: '',
                type: String
            },
            styles: {
                type: Object,
                default: () => {}
            },
            plugins: {
                type: Array,
                default: () => []
            }
        },

        data(){
            return{
                Visitors: [],
                Subscriber: [],
                Employer: [],
                Seeker: [],
                Job_Post: [],
                Applied : [],
                Partnership: [],
                Blog_Post : [],

                loaded: false,
                chartData: {
                    labels: ['Visitor', 'Subscriber', 'Employer',
                        'Seeker', 'Job Post', 'Applied Job',
                        'Partnerships', 'Blog Post'],
                    datasets: [{
                        label: 'Counts',
                        backgroundColor: '#f87979',
                        data: [0, 0, 0, 0, 0, 0, 0, 0]
                    }]
                },
                chartOptions: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            }
        },

        mounted() {
            this.getCounting();
        },

        methods:{

            getCounting(){
                this.loaded = false;
                axios.get(`/api/Counting`)
                    .then((response) => {
                        this.Visitors = response.data.result.visitor;
                        this.Subscriber = response.data.result.subscriber;
                        this.Employer = response.data.result.employer;
                        this.Seeker = response.data.result.seeker;
                        this.Job_Post = response.data.result.job_post;
                        this.Applied = response.data.result.applied;
                        this.Partnership = response.data.result.partnership;
                        this.Blog_Post = response.data.result.blog_post;

                        this.chartData.datasets[0].data = [
                            response.data.result.visitor.length,
                            response.data.result.subscriber.length,
                            response.data.result.employer.length,
                            response.data.result.seeker.length,
                            response.data.result.job_post.length,
                            response.data.result.applied.length,
                            response.data.result.partnership.length,
                            response.data.result.blog_post.length,
                        ];
                        this.loaded = true;
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


