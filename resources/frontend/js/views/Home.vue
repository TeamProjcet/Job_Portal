<template>
    <div>
        <!-- Carousel Start -->
        <div class="">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="/frontend/assets/img/carousel1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white slideInDown mb-4">Find The Perfect Job That You Deserved</h1>
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
                                    <h1 class="display-3 text-white slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
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
        <JobCat></JobCat>
        <!-- Category End -->

        <!-- Jobs Start -->
        <JobList></JobList>

        <div class="container mt-4 shadow p-4 rounded">
            <div class="container mt-4">
                <h3 class="d-flex justify-content-center my-4">
                    <span class="badge bg-primary py-3 px-3 container-fluid">
                        Our Blog News
                    </span>
                </h3>
                <div>
                    <Swiper v-if="dataList.blogpost_slide?.length > 0"
                            :slides-per-view="3"
                            :space-between="30"
                            :loop="true"
                            :pagination="false"
                            :navigation="true"
                            @swiper="onSwiper"
                            @slideChange="onSlideChange">

                        <swiper-slide v-for="post in dataList.blogpost_slide" :key="post.id" class="test col-md-4">
                            <div class="card mb-4">
                                <img
                                        style="height: 200px"
                                        :src="storageImage(post.image)"
                                        class="card-img-top"
                                        alt="Blog Post Image"
                                />
                                <div class="card-body">
                                    <h5 class="card-title">{{ truncateString(post.title, 50) }}</h5>
                                    <p class="card-text font">{{ truncateString(post.description, 180) }}</p>
                                    <div class="d-flex justify-content-between">
                                        <router-link
                                                :to="{ name: 'Blog-Details', params: { id: post.id } }"
                                                class="btn btn-primary"
                                        >
                                            Read More
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                    </Swiper>
                </div>
            </div>
        </div>

        <!-- Testimonial Start -->
        <div class="container mt-4 shadow p-4 rounded">
            <div class="container mt-4">
                <h3 class="d-flex justify-content-center my-4">
                    <span class="badge bg-primary py-3 px-3 container-fluid">
                        Our Trusted Clients
                    </span>
                </h3>
                <div>
                    <Swiper v-if="partnership.length > 0"
                            :slides-per-view="3"
                            :space-between="30"
                            :loop="true"
                            :pagination="false"
                            :navigation="true"
                            @swiper="onSwiper"
                            @slideChange="onSlideChange">

                        <swiper-slide v-for="(item, index) in partnership" :key="index" class="test col-md-4 mb-4">
                            <div class="card">
                                <img style="width: 200px; height: 120px; margin: auto" :src="storageImage(item.logo)" class="card-img-top p-2" alt="Image 1">
                            </div>
                        </swiper-slide>
                    </Swiper>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
    </div>
</template>

<script>
    import JobList from "./JobList";
    import JobCat from "./JobCat";
    import Search from "./Searching/Search";
    import axios from 'axios';

    import { Navigation, Pagination } from 'swiper';
    import { SwiperCore, Swiper, SwiperSlide } from 'swiper-vue2';
    import 'swiper/swiper-bundle.css';
    SwiperCore.use([Navigation, Pagination]);

    export default {
        name: "Home",
        components: { Search, JobCat, JobList, Swiper, SwiperSlide },
        data() {
            return {
                partnership: [],
                blogpost_slide: [],
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
            this.getDataList();
        },
        methods: {

            async getPartnership() {
                try {
                    const response = await axios.get('/api/frontend/joblist');
                    this.partnership = response.data.result.partner_logo;
                } catch (error) {
                    this.error = "Error fetching partnership data. Please try again later.";
                    console.error(error);
                }
            },
            onSwiper(swiper) {
                // console.log(swiper)
            },
            onSlideChange(swiper) {
                // console.log('slide change')
            },
        }
    }
</script>

<style scoped>
    .card img {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .testimonial-item:hover .card img {
        transform: scale(1.1);
        opacity: 0.8;
    }

    .header-carousel {
        height: 600px;
    }

    .owl-carousel-item {
        height: 600px;
        overflow: hidden;
    }

    .owl-carousel-item img {
        height: 100%;
        object-fit: cover;
    }
</style>
