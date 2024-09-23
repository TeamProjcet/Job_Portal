<template>
    <div class="wrapper">
        <div class="main-panel">
            <!-- Top bar section -->
           <Header></Header>

            <!-- Side bar section -->
            <SideNav></SideNav>
            <div class="container">
                <div class="page-inner" >
            <!-- Content section -->
            <router-view></router-view>
                </div>
            </div>

            <!-- Footer section -->
            <Footer></Footer>
        </div>
    </div>
</template>

<script>


    import Footer from "./Components/Footer";
    import SideNav from "./Components/SideNav";
    import Header from "./Components/Header";
    export default {
        name: "App",
        components: {
            Header,
            SideNav,
            Footer

        },
        mounted() {
        },
    };
</script>

<style scoped>
</style>
