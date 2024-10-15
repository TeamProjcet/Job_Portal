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
                <div class="owl-carousel testimonial-carousel">
                    <div class="row">
                        <div class="col-md-4 mb-4 testimonial-item">
                            <div class="card">
                                <img style="width: 200px; height: 120px; margin: auto" src="https://i.ibb.co/gZHFWB6/usaid.png" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 testimonial-item">
                            <div class="card">
                                <img style="width: 200px; height: 120px; margin: auto" src="https://i.ibb.co/rmF79HL/yamaha.png" class="card-img-top" alt="Image 2">
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 testimonial-item">
                            <div class="card">
                                <img style="width: 200px; height: 120px; margin: auto" src="https://i.ibb.co/XWptrcR/fonterra.png" class="card-img-top" alt="Image 3">
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
    export default {
        name: "Dashboard",
        components: {Search, JobCat, JobList},
        mounted() {
                $('.header-carousel').owlCarousel({
                    loop: true,
                    items: 1,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                });


            $('.testimonial-carousel').owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
            });

        },
    }
</script>

<style scoped>
    .testimonial-item {
        overflow: hidden; /* Ensures the image doesn't overflow the card */
        transition: transform 0.3s ease;
    }

    .card img {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .testimonial-item:hover .card img {
        transform: scale(1.1); /* Slightly enlarges the image */
        opacity: 0.8; /* Makes the image slightly transparent */
    }
</style>