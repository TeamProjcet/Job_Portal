<template>
    <div class="container text-center py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <div class="card-body">
                        <h5 class="display-6 text-danger mb-3">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            Not Found
                        </h5>
                        <p class="text-muted">Sorry, we couldn't find any results matching your search.</p>
                        <router-link to="/" class="btn btn-primary mt-3">
                            <i class="bi bi-arrow-left"></i> Go Back to Home
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NotFoundComponent"
    }
</script>

<style scoped>

</style>