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
                    <template v-for="data in partnership" >
                    <a class="btn btn-link text-white-50" :href="data.weblink" target="_blank" rel="noopener noreferrer">{{data.name}}</a>
                    </template>
                </div>
                <div class="col-lg-3 col-md-6" v-if="frontdata">
                    <h5 class="text-white mb-4">Contact</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> {{frontdata.location}}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+88 {{frontdata.phone}}</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i> {{frontdata.email}}</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" target="_blank" :href="frontdata.facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" target="_blank" :href="frontdata.linkdin"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social" target="_blank" :href="frontdata.youtube"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" target="_blank" :href="frontdata.twitter"><i class="fab fa-twitter"></i></a>

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
                        &copy; <router-link class="border-bottom" to="/">Job Portal</router-link>, All Right Reserved.
                        Develop By <a class="border-bottom" target="_blank" href="https://tmss-ict.com/">Tmss Ict Ltd</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <router-link to="/" >Home</router-link>
                            <router-link to="">Cookies</router-link>
                            <router-link to="">Help</router-link>
                            <router-link to="">FQAs</router-link>
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
                partnership:[],
                frontdata:null

            };
        },
        mounted(){
            this.getPartnership();

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
            },
            async getPartnership() {
                try {
                    const response = await axios.get('/api/frontend/joblist');
                    this.partnership = response.data.result.partner;
                    this.frontdata = response.data.result.frontdata[0];
                } catch (error) {
                    this.error = "Error fetching blog data. Please try again later.";
                }
        }
        }
    }
</script>


<style scoped>

</style>