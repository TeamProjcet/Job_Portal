<template>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container-fluid py-5">
            <div class="row g-5">

                <div class="col-lg-3 col-md-3">
                    <h5 class="text-white mb-4">{{ $t('company') }}</h5>
                    <a class="btn btn-link text-white-50" href="">{{ $t('about_us') }}</a>
                    <a class="btn btn-link text-white-50" href="">{{ $t('contact_us') }}</a>
                    <a class="btn btn-link text-white-50" href="">{{ $t('privacy_policy') }}</a>
                    <a class="btn btn-link text-white-50" href="">{{ $t('terms_condition') }}</a>
                </div>

                <div class="col-lg-3 col-md-3">
                    <h5 class="text-white mb-4">{{ $t('important_links') }}</h5>
                    <template v-for="data in partnership">
                        <a class="btn btn-link text-white-50" :href="data.weblink" target="_blank" rel="noopener noreferrer">{{data.name}}</a>
                    </template>
                </div>

                <div class="col-lg-3 col-md-3" v-if="frontdata">
                    <h5 class="text-white mb-4">{{$t('contact')}}</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{staticText.contlocation}}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+880{{staticText.contphone}}</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{staticText.contemail}}</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" target="_blank" :href="frontdata.facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" target="_blank" :href="frontdata.linkdin"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social" target="_blank" :href="frontdata.youtube"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" target="_blank" :href="frontdata.twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 ">
                    <form @submit.prevent="subscribeNewsletter">
                        <h5 class="text-white mb-4">{{ $t('newsletter_intro') }}</h5>

                        <div class="position-relative mx-auto d-flex" style="max-width: 400px;">
                            <input v-model="fromData.email" name="email" class="form-control me-2" type="email" placeholder="Your email" required>
                            <button type="submit" class="btn btn-primary">
                                {{$t('subscribe')}}
                            </button>
                        </div>
                    </form>
                    <div class="mb-4">
                        <p @dblclick="openTextModal('newsletter')" >{{staticText.newsletter}}</p>
                    </div>
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
                            <a href="">{{$t('home')}}</a>
                            <a href="">{{$t('cookies')}}</a>
                            <a href="">{{$t('help')}}</a>
                            <a href="">{{$t('faqs')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Modal -->
        <TextModal @submit="submitText()"     :isModalOpen="isModalOpen"
                   @close="isModalOpen = false" >

            <textarea v-model="editableText" class="form-control" rows="4"></textarea>
        </TextModal>
    </div>
    <!-- Footer End -->
</template>

<script>
    import axios from 'axios';
    import TextModal from "./TextModal";

    export default {
        name: "Footer",
        components: {TextModal},
        data() {
            return {
                partnership: [],
                frontdata: null,
                staticText: {},
                isModalOpen: false,
                canOpenModal:false,


        }
        },
        created() {
            this.fetchStaticTexts();
        },
        mounted() {
            this.getPartnership();
            this.checkUserRole();

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
            },


        }
    }
</script>

<style scoped>



</style>
