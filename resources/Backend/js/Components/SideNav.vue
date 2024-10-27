<template>
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <router-link to="/admin/dashboard" class="logo">
                    <img
                            src="https://i.ibb.co.com/6w26Pc2/logo.jpg"
                            alt="navbar brand"
                            class="navbar-brand"
                            height="40"
                            width="50"
                    />
                </router-link>
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

            <!-- User Profile Section -->
            <div class="user-profile">
                <img :src="storageImage(user && user.employer && user.employer.length > 0 ? user.employer[0].image : '')" alt="User Profile" class="profile-image" />
                <p class="user-name">{{ user ? user.name : 'Guest' }}<span>{{user && user.roles && user.roles.length > 0 ? user.roles[0].name : '' }}</span></p>
            </div>
            <!-- End User Profile Section -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <li class="nav-item active">
                        <router-link
                                data-bs-toggle="collapse"
                                to="/admin/dashboard"
                                class="collapsed"
                                aria-expanded="false"
                        >
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </router-link>
                    </li>

                    <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                        <h4 class="text-section">Menu Items</h4>
                    </li>
                    <li class="nav-item" v-for="(menu, mindex) in Config.menus" :key="mindex">
                        <template v-if="menu.sub_menus.length > 0">
                            <a :data-bs-toggle="'collapse'" :href="'#collapse' + mindex">
                                <i :class="menu.icon"></i>
                                <p>{{ menu.name }}</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" :id="'collapse' + mindex">
                                <ul class="nav nav-collapse">
                                    <li v-for="(subMenu, sindex) in menu.sub_menus" :key="sindex">
                                        <router-link class="nav-link" :to="subMenu.link">
                                            <i :class="subMenu.icon"></i> {{ subMenu.name }}
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </template>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "SideNav",
        data(){
            return{
                user: {},
            }
        },
        mounted() {
            this.getconfigurations();
            this.userAuthData()
        },

        methods:{
            getconfigurations:function () {
                const _this=this;
                const url=_this.urlGenaretor('api/configurations');
                _this.httpReq('get',url,{},{},function(retData){
                _this.$store.commit('Config',retData.result);

                    _this.$store.commit('permissions',retData.result.permissions)


                })
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


        },

    }
</script>

<style scoped>
    .user-profile {
        display: flex;
        align-items: center;
        padding: 10px;
        color: white;
        transition: background-color 0.3s;
    }

    .user-profile:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .profile-image {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 10px;
        border: 2px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user-name {
        font-size: 14px;
        font-weight: bold;
        margin-top: 15px;
        display: flex;
        flex-direction: column;
    }

    .user-name span {
        font-weight: normal;
        color: rgba(255, 255, 255, 0.7);
        font-size: 12px;
    }
</style>