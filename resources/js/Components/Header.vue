<template>
    <div class="main-header">
        <div class="main-header-logo">
            <!-- Logo Header -->
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
            <!-- End Logo Header -->
        </div>
        <!-- Navbar Header -->
        <nav
                class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
        >
            <div class="container-fluid">
                <nav
                        class="navbar navbar-header-left navbar-expand-lg  navbar-form nav-search p-0 d-none d-lg-flex"
                >
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search pe-1">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </div>
                        <input
                                type="text"
                                placeholder="Search ..."
                                class="form-control"
                        />
                    </div>
                </nav>

                <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                    <li
                            class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                    >
                        <a
                                class="nav-link dropdown-toggle"
                                data-bs-toggle="dropdown"
                                href="#"
                                role="button"
                                aria-expanded="false"
                                aria-haspopup="true"
                        >
                            <i class="fa fa-search"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-search animated fadeIn">
                            <form class="navbar-left navbar-form nav-search">
                                <div class="input-group">
                                    <input
                                            type="text"
                                            placeholder="Search ..."
                                            class="form-control"
                                    />
                                </div>
                            </form>
                        </ul>
                    </li>

                    <!-- -------------- -->
                    <!-- notify icon section -->
                    <!-- -------------- -->

                    <li class="nav-item topbar-user dropdown hidden-caret">
                        <a
                                class="dropdown-toggle profile-pic"
                                data-bs-toggle="dropdown"
                                href="#"
                                aria-expanded="false"
                        >
                            <div class="avatar-sm">
                                <img
                                        src="https://i.ibb.co.com/3WPvxLF/user.png"
                                        alt="..."
                                        class="avatar-img rounded-circle"
                                />
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">

                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg">
                                            <img
                                                    src="https://i.ibb.co.com/3WPvxLF/user.png"
                                                    alt="image profile"
                                                    class="avatar-img rounded"
                                            />
                                        </div>
                                        <div class="u-text">
                                            <router-link to="/admin/user/employer" href="" class="btn btn-xs btn-secondary btn-sm">View Profile</router-link
                                            >
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">My Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Account Setting</a>
                                    <div class="dropdown-divider"></div>


                                    <a href="/logout" class="dropdown-item">Logout</a>
                                </li>

                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "Header",

        methods:{
            async logout(){
                try {
                    await axios.post('/api/logout');
                    window.location.href = '/login';

                } catch (error) {
                    console.error('Logout Failed:', error);
                }
            }
        }
    }
</script>

<style scoped>

</style>