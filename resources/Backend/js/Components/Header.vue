<template>
    <div class="main-header">
        <div class="main-header-logo">
            <div class="logo-header" data-background-color="dark">
                <a href="" class="logo">
                    <img
                            src="https://i.ibb.co.com/3WPvxLF/user.png"
                            alt="navbar brand"
                            class="navbar-brand"
                            height="20"
                    />
                </a>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
        </div>
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
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


                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="d-flex align-items-center bg-success text-white p-2 rounded">
                            <h5 class="mb-0 me-2">{{ username? username.name : 'Guest' }}</h5>
                            <i class="fa fa-angle-down ms-2"></i>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <div class="dropdown-divider"></div>
                            <li>
                                <a href="#" @click.prevent="logout" class="dropdown-item">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>




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
                isAuthenticated: false,
                username: '', // Corrected variable name
            };
        },
        mounted() {
            this.checkAuthentication();
        },
        methods: {
            async checkAuthentication() {
                try {
                    const response = await axios.get('/userdata');
                    if (response.data && response.data.result) {
                        this.username = response.data.result; // Assuming response.data.result has the user info
                        this.isAuthenticated = true;
                    } else {
                        this.username = null; // Reset username if not found
                        this.isAuthenticated = false;
                    }
                } catch (error) {
                    this.isAuthenticated = false;
                    console.error('Authentication check failed:', error.response ? error.response.data : error.message);
                }
            },
            async logout() {
                try {
                    await axios.get('/logout');
                    window.location.href = '/login';
                } catch (error) {
                    console.error('Logout Failed:', error);
                }
            }
        }
    }
</script>

<style scoped>
    /* Add any necessary styles here */
</style>
