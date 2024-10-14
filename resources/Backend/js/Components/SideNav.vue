<template>
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="" class="logo">
                    <img
                            src="https://i.ibb.co.com/6w26Pc2/logo.jpg"
                            alt="navbar brand"
                            class="navbar-brand"
                            height="40"
                            width="50"
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
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <li class="nav-item active">
                        <a
                                data-bs-toggle="collapse"
                                href="#dashboard"
                                class="collapsed"
                                aria-expanded="false"
                        >
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                        <h4 class="text-section">Menu Items</h4>
                    </li>

<!--                    -->

                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Job</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <router-link to="/admin/jobcategory/category">
                                        <span class="sub-item">Job Category</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/admin/jobcategory/company">
                                        <span class="sub-item">Company List</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/admin/jobcategory/joblist">
                                        <span class="sub-item">Job Post</span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- --------------------- -->

                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#base2">
                            <i class="fab fa-blogger-b"></i>
                            <p>Blog</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base2">
                            <ul class="nav nav-collapse">
                                <li>
                                    <router-link to="/admin/blog/blogpost">
                                        <span class="sub-item">Blog Post</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/admin/blog/blogcomment">
                                        <span class="sub-item">Blog Comment</span>
                                    </router-link>
                                </li>


                            </ul>
                        </div>
                    </li>

<!--                    -->
<li class="nav-item">
                        <a data-bs-toggle="collapse" href="#base3">
                            <i class="fas fa-user"></i>
                            <p>Visitor</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base3">
                            <ul class="nav nav-collapse">
                                <li>
                                    <router-link to="/admin/visitor/newsletter">
                                        <span class="sub-item">Newsletter</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/admin/visitor/contact">
                                        <span class="sub-item">Contact</span>
                                    </router-link>
                                </li>
                                </ul>
                        </div>
                        </li>
                            


                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#base4">
                            <i class="fas fa-clipboard-list"></i>
                            <p>Aplication</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base4">
                            <ul class="nav nav-collapse">
                                <li>
                                    <router-link to="/admin/seeker/application">
                                        <span class="sub-item">Aplication</span>
                                    </router-link>
                                </li>


                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SideNav"
    }
</script>

<style scoped>

</style>