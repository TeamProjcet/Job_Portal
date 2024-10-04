<template>
    <div class="container-fluid bg-white p-0">
        <Header></Header>


        <router-view></router-view>


        <Footer></Footer>
    </div>
</template>

<script>
    import Footer from "./Components/Footer";
    import Header from "./Components/Header";
    export default {
        name: "App",
        components: {
            Header,
            Footer
        },
        mounted() {
        },
    };
</script>


<style scoped>

</style>
