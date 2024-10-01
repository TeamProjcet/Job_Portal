<template>
    <div class="wrapper">
        <div class="main-panel">
            <!-- Top bar section -->
            <Header />

            <!-- Side bar section -->
            <SideNav />

            <div class="container">
                <div class="page-inner">
                    <!-- Content section -->
                    <router-view />
                </div>
            </div>

            <!-- Footer section -->
            <Footer />
        </div>
    </div>
</template>

<script>
    // Importing components
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
