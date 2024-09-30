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
            </div>
            <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
</template>

<script>
    export default {
        name: "Header"
    }
</script>

<style scoped>

</style>