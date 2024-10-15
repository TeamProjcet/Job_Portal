<template>
    <div>
        <!-- Carousel Start -->
        <div class=" ">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="/frontend/assets/img/carousel1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white  slideInDown mb-4">Find The Perfect Job That You Deserved</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Discover your perfect role in the dynamic world of startups! We help you identify opportunities that align with your skills, passions, and career goals. With personalized support, tailored job matches, and insights into the startup culture, we make it easier for you to find a position where you can thrive and make an impact. Let’s take your career to the next level!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="/frontend/assets/img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white  slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Discover your perfect role in the dynamic world of startups! We help you identify opportunities that align with your skills, passions, and career goals. With personalized support, tailored job matches, and insights into the startup culture, we make it easier for you to find a position where you can thrive and make an impact. Let’s take your career to the next level!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel End -->

        <!-- Search Start -->
        <Search></Search>
        <!-- Search End -->

        <!-- Category Start -->
        <JobCat><</JobCat>
        <!-- Category End -->



        <!-- Jobs Start -->
        <JobList></JobList>


        <!-- Testimonial Start -->
        <div class="container-fluid mt-4" >
            <div class="container mt-4">
                <h1 class="text-center mb-5">Our Trusted Clients!!!</h1>
                <div class="">
                    <div class="row">
                        <div class="col-md-4 mb-4 " v-for="(partner, index) in partnership" :key="index">
                            <div class="card">
                                <img style="width: 200px; height: 120px; margin: auto " :src="storageImage(partner.logo)" class="card-img-top p-2" alt="Image 1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

    </div>
</template>

<script>
    import JobList from "./JobList";
    import JobCat from "./JobCat";
    import Search from "./Search";
    import axios from 'axios';

    export default {
        name: "Dashboard",
        components: {Search, JobCat, JobList},
        data() {
            return {
                partnership: [],
            };
        },
        mounted() {
                $('.header-carousel').owlCarousel({
                    loop: true,
                    items: 1,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                });

            this.getPartnership();

        },

        methods:{
            async getPartnership() {
                try {
                    const response = await axios.get('/api/partnership');
                    if (response.data && response.data.result) {
                        this.partnership = response.data.result;
                    } else {
                        throw new Error("Unexpected response format");
                    }
                } catch (error) {
                    // console.error("Error fetching blog data:", error);
                    this.error = "Error fetching blog data. Please try again later.";
                }
            },
        }
    }
</script>

<style scoped>
    .testimonial-item {
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .card img {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .testimonial-item:hover .card img {
        transform: scale(1.1);
        opacity: 0.8;
    }
</style>