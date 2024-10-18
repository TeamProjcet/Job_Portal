<template>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5" >
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Company</h5>
                    <a class="btn btn-link text-white-50" href="">About Us</a>
                    <a class="btn btn-link text-white-50" href="">Contact Us</a>
                    <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                    <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Important Links</h5>
                    <a class="btn btn-link text-white-50" href="https://tmss-bd.org/">tmss</a>
                    <a class="btn btn-link text-white-50" href="https://tmss-ict.com/">tmss ict</a>
                    <a class="btn btn-link text-white-50" href="https://tisibogra.com/frontend">tisi bogra</a>
                    <a class="btn btn-link text-white-50" href="https://bdgovtjob.net/">bd govt job</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Contact</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>West Kazipara, Mirpur-10, Dhaka</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+880-2-55075620</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@jobportal.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <form @submit.prevent="subscribeNewsletter">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Feel free to get in touch with us. We always open to discussing new projects, creative ideas,
                            or opportunities to be part of your visions.</p>
                        <div class="position-relative mx-auto d-flex" style="max-width: 400px;">
                            <input v-model="fromData.email" name="email" class="form-control me-2" type="email" placeholder="Your email" required>
                            <button type="submit" class="btn btn-primary">
                                SignUp
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Job Portal</a>, All Right Reserved.
                        Designed By <a class="border-bottom" href="#">Tmss Ict Ltd</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Footer",
        data() {
            return {
            };
        },
        methods: {
            async subscribeNewsletter() {
                try {
                    const response = await axios.post('/api/frontend/newsletter', this.fromData);
                    if (response.data.success) {
                        this.$toast.success(response.data.message);
                    }
                } catch (error) {
                    if (error.response && error.response.status === 422) {
                        this.$toast.error(error.response.data.message);
                    } else {
                        console.error('Failed to subscribe:', error);
                        this.$toast.error('There was an error. Please try again later.');
                    }
                }
            }
        }
    }
</script>


<style scoped>

</style>