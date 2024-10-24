<template>
    <div class="wrapper">
        <div class="main-panel">
            <Header />

            <SideNav />

            <div class="container">
                <div class="page-inner">
                    <router-view />
                </div>
            </div>

            <Footer />
        </div>
    </div>
</template>

<script>
    import Header from "./Components/Header";
    import SideNav from "./Components/SideNav";
    import Footer from "./Components/Footer";

    export default {
        name: "App",
        components: {
            Header,
            SideNav,
            Footer,
        },
        mounted() {

        },
    };
</script>

<style scoped>

</style>
