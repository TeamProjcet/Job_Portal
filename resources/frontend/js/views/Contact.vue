<template>
    <div class="">

        <!-- Header End -->
        <div class=" py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3  slideInDown">{{$t('contact')}}</h1>
            </div>
        </div>
        <!-- Header End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5 shadow p-4 rounded">
            <div class="container">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4 ">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                         style="width: 45px; height: 45px;">
                                        <i class="fa fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <span v-if="frontdata">{{frontdata.location}}</span>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                         style="width: 45px; height: 45px;">
                                        <i class="fa fa-envelope-open text-primary"></i>
                                    </div>
                                    <span v-if="frontdata">{{frontdata.email}}</span>

                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                         style="width: 45px; height: 45px;">
                                        <i class="fa fa-phone-alt text-primary"></i>
                                    </div>
                                    <span v-if="frontdata">+88{{frontdata.phone}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <iframe v-if="frontdata" :src="frontdata.map"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="">

                            <form @submit.prevent="submitFromData(fromData)">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input v-model="fromData.name" type="text" class="form-control" id="name"
                                                   placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input v-model="fromData.email" type="email" class="form-control" id="email"
                                                   placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input v-model="fromData.subject" type="text" class="form-control" id="subject"
                                                   placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea v-model="fromData.message" class="form-control"
                                                      placeholder="Leave a message here"
                                                      id="message" style="height: 150px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Contact",
        data() {
            return {
                frontdata: null
            };
        },
        mounted(){
            this.getFrontdata();
        },
        methods: {
            async getFrontdata() {
                axios.get('api/frontend/frontData')
                    .then((response) => {
                        this.frontdata = response.data.result[0];
                    })
                    .catch((error) => {
                        this.error = "Error fetching data. Please try again later.";
                    });
            }
        }

    }
</script>

<style scoped>

</style>