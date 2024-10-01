<template>
    <div class="container-xxl bg-white p-0">

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
            </div>
        </div>
        <!-- Header End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Contact For Any Query</h1>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <span>West Kazipara, Mirpur-10, Dhaka</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-envelope-open text-primary"></i>
                                    </div>
                                    <span>info@jobportal.com</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-phone-alt text-primary"></i>
                                    </div>
                                    <span>+880-2-55075620</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d467269.85203977005!2d90.371239!3d23.799186!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d20d6ab031%3A0x9b156afb312d6fba!2sTMSS%20Head%20Office!5e0!3m2!1sen!2sus!4v1726932213993!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">

                            <form @submit.prevent="subscribeNewsletter">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input v-model="name" type="text" class="form-control" id="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input v-model="email" type="email" class="form-control" id="email"
                                                    placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input v-model="subject" type="text" class="form-control" id="subject" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea v-model="message" class="form-control" placeholder="Leave a message here"
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
        data(){
            return {
                name: '',
                email: '',
                subject: '',
                message: ''
            };
        },
        methods: {
            async subscribeNewsletter() {
                try {
                    const response = await axios.post('/api/frontend/contact', {
                        name: this.name,
                        email: this.email,
                        subject: this.subject,
                        message: this.message
                    });

                    if (response.status === 200) {
                        alert('Thank you for contacting us!');
                        // Clear the form fields
                        this.name = '';
                        this.email = '';
                        this.subject = '';
                        this.message = '';
                    }
                } catch (error) {
                    console.error('Failed to contact:', error);
                    alert('There was an error. Please try again later.');
                }
            }
        }

    }
</script>

<style scoped>

</style>