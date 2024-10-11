<template>
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>

        </div>
    </div>

</template>

<script>
    export default {
        name: "SavedJobsComponent",
        data() {
            return {
                favourites: [],
            };
        },
        mounted() {
            this.loadFavourites();
        },
        methods: {
            loadFavourites() {
                axios.get('/api/frontend/favourites')
                    .then(response => {
                        this.favourites = response.data;
                    });
            },
            addFavourite(jobId) {
                axios.post('/api/frontend/favourites', { job_id: jobId })
                    .then(() => {
                        this.loadFavourites();
                    });
            },
            removeFavourite(jobId) {
                axios.delete(`/api/favourites/${jobId}`)
                    .then(() => {
                        this.loadFavourites();
                    });
            }
        }
    }
</script>

<style scoped>

</style>