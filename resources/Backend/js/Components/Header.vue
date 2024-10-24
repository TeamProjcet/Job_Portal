<template>
    <div class="main-header">
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid ">
                <!-- Search bar for larger screens -->
                <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search pe-1">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </div>
                        <input type="text" placeholder="Search ..." class="form-control" />
                    </div>
                </nav>

                <!-- Responsive Search Dropdown for smaller screens -->
                <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                    <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <i class="fa fa-search"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-search animated fadeIn">
                            <form class="navbar-left navbar-form nav-search">
                                <div class="input-group">
                                    <input type="text" placeholder="Search ..." class="form-control" />
                                </div>
                            </form>
                        </ul>
                    </li>

                    <!-- User Profile Dropdown -->
                    <li class="nav-item topbar-user dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="d-flex align-items-center bg-success text-white p-2 rounded">
                                <h5 class="mb-0 me-2">{{ user ? user.name : 'Guest' }}</h5>
                                <i class="fa fa-angle-down ms-2"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <router-link to="/admin/employer/profile" class="dropdown-item">My Profile</router-link>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" @click.prevent="logout" class="dropdown-item">Logout</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "Header",
        data() {
            return {
                user: {},
                employer: [],
            };
        },
        mounted() {
            this.userAuthData();
        },
        methods: {
            async logout() {
                try {
                    await axios.get('/logout');
                    window.location.href = '/login';
                } catch (error) {
                    console.error('Logout Failed:', error);
                }
            },
            async userAuthData() {
                try {
                    const response = await axios.get('/userAuth');
                    this.user = response.data.result || {};
                } catch (error) {
                    this.user = {};
                    console.error('Error fetching authentication data:', error);
                }
            },
        }
    }
</script>

<style scoped>
    /* Add any necessary styles here */
</style>
