<template>
    <div>
        <!-- Carousel Start -->
        <div class="">
            <Swiper v-if="Slider.length > 0"
                    :slides-per-view="1"
                    :space-between="0"
                    :loop="true"
                    :autoplay="true"
                    :pagination="false"
                    :navigation="false"
                    :breakpoints="{
                        0: { slidesPerView: 1, spaceBetween: 10 },
                        576: { slidesPerView: 1, spaceBetween: 20 },
                        768: { slidesPerView: 1, spaceBetween: 30 }
                    }"
                    @swiper="onSwiper"
                    @slideChange="onSlideChange"
                    class="full-width-swiper"
            >
                <swiper-slide class="test" v-for="slide in Slider" :key="slide.id">
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" :src="storageImage(slide.slide_image)" alt="">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                            <div class="container">
                                <div class="row justify-content-start">
                                    <div class="col-10 col-lg-8">
                                        <h1 class="display-3 text-white slideInDown mb-4">{{slide.title}}</h1>
                                        <p class="fs-5 fw-medium text-white mb-4 pb-2">{{truncateString(slide.description)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
            </Swiper>
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
                            :autoplay="true"
                            :pagination="false"
                            :navigation="false"
                            :breakpoints="{
                                0: {
                                    slidesPerView: 1,
                                    spaceBetween: 10
                                },
                                576: {
                                    slidesPerView: 2,
                                    spaceBetween: 20
                                },
                                768: {
                                    slidesPerView: 3,
                                    spaceBetween: 30
                                }
                            }"
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
                            :autoplay="true"
                            :pagination="false"
                            :navigation="false"
                            :breakpoints="{
                                0: {
                                    slidesPerView: 1,
                                    spaceBetween: 10
                                },
                                576: {
                                    slidesPerView: 2,
                                    spaceBetween: 20
                                },
                                768: {
                                    slidesPerView: 3,
                                    spaceBetween: 30
                                }
                            }"
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

    import { Navigation, Pagination, Autoplay } from 'swiper';
    import { SwiperCore, Swiper, SwiperSlide } from 'swiper-vue2';
    import 'swiper/swiper-bundle.css';
    SwiperCore.use([Navigation, Pagination, Autoplay, ]);

    export default {
        name: "Home",
        components: { Search, JobCat, JobList, Swiper, SwiperSlide },
        data() {
            return {
                partnership: [],
                blogpost_slide: [],
                Slider: [],
            };
        },
        mounted() {
            this.getPartnership();
            this.getDataList();
        },
        methods: {

            async getPartnership() {
                try {
                    const response = await axios.get('/api/frontend/joblist');
                    this.partnership = response.data.result.partner_logo || [];
                    this.Slider = response.data.result.slider || [];
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

    .owl-carousel-item {
        height: 600px;
        overflow: hidden;
    }

    .owl-carousel-item img {
        height: 100%;
        object-fit: contain;
    }

    .full-width-swiper {
        width: 100%;
        margin: 0;
    }

    .owl-carousel-item img {
        width: 100%;
        height: auto;
    }
</style>
