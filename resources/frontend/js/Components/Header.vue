<template>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <router-link to="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <h1 class="m-0 text-primary">{{ $t("job_portal") }}</h1>
        </router-link>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <router-link to="/" class="nav-item nav-link active">{{$t("home")}}</router-link>
                <router-link to="/about" class="nav-item nav-link">{{$t("about")}}</router-link>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{$t("jobs")}}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <router-link to="/job-cat" class="dropdown-item">{{$t("job_category")}}</router-link>
                        <router-link to="/job-list" class="dropdown-item">{{$t("job_list")}}</router-link>
                    </div>
                </div>

                <router-link to="/blog-post" class="nav-item nav-link">{{$t("blog")}}</router-link>
                <router-link to="/contact" class="nav-item nav-link">{{$t("contact")}}</router-link>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{$t("language")}}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a @click="changeLanguage('en')" href="#" class="dropdown-item d-flex align-items-center">
                            <img src="https://media.istockphoto.com/id/1420904901/vector/specification-perfect-correct-dimension-official-american-flag-red-white-blue-stripes.jpg?s=2048x2048&w=is&k=20&c=rKYOhsMqHXrRIRrWyrUxtdnZLSLjL3d66EKAR2aPdlE=" alt="English" style="width: 20px; height: 15px;" class="me-2"> {{$t("english")}}
                        </a>
                        <a @click="changeLanguage('bn')" href="#" class="dropdown-item d-flex align-items-center">
                            <img src="https://media.istockphoto.com/id/1366452855/vector/bangladesh-national-flag-vektor-illustration.jpg?s=2048x2048&w=is&k=20&c=gPdqIL-vDRuLQwTrAmPxjRObesLHlyjaYeJHhDFJi3Y=" alt="Bangla" style="width: 20px; height: 15px;" class="me-2"> {{$t("bangla")}}
                        </a>
                    </div>
                </div>

                <div>
                    <div class="nav-item dropdown" v-if="isAuthenticated">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img :src="storageImage(seeker ? seeker.image : '')" alt="User Avatar" class="rounded-circle" width="30" height="30">
                            {{ seeker ? seeker.name : 'Guest' }}
                        </a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <router-link to="/seekerprofile" class="dropdown-item d-flex align-items-center">
                                <i class="fas fa-user me-2"></i> {{$t("my_profile")}}
                            </router-link>
                            <button @click.prevent="seekerlogout" class="dropdown-item d-flex align-items-center">
                                <i class="fas fa-sign-out-alt me-2"></i> {{$t("logout")}}
                            </button>
                        </div>
                    </div>

                    <div v-else>
                        <router-link to="/seekerlogin" class="nav-item nav-link">
                            <i class="fas fa-sign-in-alt me-2"></i> {{$t("login")}}
                        </router-link>
                    </div>
                </div>

            </div>
            <router-link to="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">{{$t("post_a_job")}} <i class="fa fa-arrow-right ms-3"></i></router-link>
        </div>
    </nav>
    <!-- Navbar End -->
</template>

<script>
    import axios from 'axios';
    import TimeWeatherComponent from "../views/TimeComponent";
    export default {
        name: "Header",
        components: {TimeWeatherComponent},
        data() {
            return {
                isAuthenticated: false,
                seeker: '',
                currentTime: "",
                timer: null,
            };
        },
        mounted() {
            this.authData();
            this.timer = setInterval(this.updateTime, 1000);
        },
        methods: {
            async seekerlogout() {
                try {
                    const _this=this;
                    const response = await axios.post('/api/frontend/seekerlogout');
                    if (response.data.status === 2000) {
                        this.isAuthenticated = false;
                        this.seeker = {};
                        _this.$toast.success("Logout  successfully!");

                    }
                } catch (error) {
                    console.error('Logout Failed:', error);
                }
            },
            changeLanguage(language) {
                this.$i18n.locale = language;
                localStorage.setItem('selectedLanguage', language);
            },


        }
    }
</script>

<style scoped>

</style>
