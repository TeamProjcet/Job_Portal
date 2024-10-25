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

                    <li class="nav-item ">
                        <router-link to="/admin/frontend/slider">Slider</router-link>
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
    export default {
        name: "SideNav",
        mounted() {
            this.getconfigurations();
        },

        methods:{
            getconfigurations:function () {
                const _this=this;
                const url=_this.urlGenaretor('api/configurations');
                _this.httpReq('get',url,{},{},function(retData){
                _this.$store.commit('Config',retData.result);

                    _this.$store.commit('permissions',retData.result.permissions)


                })
            }


        },

    }
</script>

<style scoped>

</style>