<template>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <router-link to="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <h1 class="m-0 text-primary">Job Portal</h1>
        </router-link>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <router-link to="/" class="nav-item nav-link active">Home</router-link>
                <router-link to="/about" class="nav-item nav-link">About</router-link>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <router-link to="/job-cat" class="dropdown-item">Job Category</router-link>
                        <router-link to="/job-list" class="dropdown-item">Job List</router-link>
                    </div>
                </div>
                <router-link to="/blog-post" class="nav-item nav-link">Blog</router-link>

                <router-link to="/contact" class="nav-item nav-link">Contact</router-link>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown" v-if="isAuthenticated">
                        <a
                                class="nav-link dropdown-toggle bg-success text-white py-2 px-lg-4 rounded-pill"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                style="font-size: 16px;"
                        >
                            {{ seeker?.name || 'Guest' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2 shadow-sm border-0">
                            <li>
                                <router-link to="/seekerprofile" class="dropdown-item d-flex align-items-center">
                                    <i class="fas fa-user me-2"></i> User Profile
                                </router-link>
                            </li>
                            <li>
                                <button  @click.prevent="seekerlogout" class="dropdown-item d-flex align-items-center">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" v-else>
                        <router-link to="/seekerlogin" class="nav-link">
                            <button class="btn btn-success rounded-pill px-4 py-2">Login</button>
                        </router-link>
                    </li>
                </ul>




            </div>

            <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>

</template>

<script>
    import axios from 'axios';
    import {Toast} from "vue-toastification";

    export default {
        name: "Header",
        data() {
            return {
                isAuthenticated: false,
                seeker: '',
            };
        },
        mounted() {
            this.checkAuthentication();
        },
        methods: {
            async seekerlogout() {
                try {
                    const _this=this;
                    const response = await axios.post('/api/frontend/seekerlogout');
                    if (response.data.status === 2000) {
                        _this.$toast.success("Logout  successfully!");

                    }
                } catch (error) {
                    console.error('Logout Failed:', error);
                }
            }
    }
    }
</script>

<style scoped>

</style>