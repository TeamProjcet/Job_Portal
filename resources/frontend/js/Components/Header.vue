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

                <div>
                    <div class="nav-item dropdown" v-if="isAuthenticated">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="https://i.ibb.co.com/3WPvxLF/user.png" alt="User Avatar" class="rounded-circle" width="30" height="30">
                            {{ seeker?seeker.name : 'Guest' }}
                        </a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <router-link to="/seekerprofile" class="dropdown-item d-flex align-items-center">
                                <i class="fas fa-user me-2"></i> My Profile
                            </router-link>
                            <button  @click.prevent="seekerlogout" class="dropdown-item d-flex align-items-center">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </div>
                    </div>

                    <div v-else>
                        <router-link to="/seekerlogin" class="nav-item nav-link " >
                            <i class="fas fa-sign-in-alt me-2"></i> Login
                        </router-link>
                    </div>

                </div>

            </div>
            <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>

</template>

<script>
    import axios from 'axios';
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
            },
    }
    }
</script>

<style scoped>

</style>
