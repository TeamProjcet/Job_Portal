<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center">Seeker Register</h2>
                <form @submit.prevent="submitFrom(fromData)">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" v-model="fromData.name"  id="name" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" v-model="fromData.email" id="email" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" v-model="fromData.password" id="password" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password:</label>
                        <input type="password" v-model="fromData.confirmPassword"  id="confirmPassword" class="form-control" required />
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
                <p v-if="errorMessage" class="text-danger mt-3">{{ errorMessage }}</p>
                <div class="text-center">
                    <p>Already have an account? <router-link to="/seekerlogin" class="btn btn-link">Login</router-link></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SeekerRegis",
        data() {
            return {
                errorMessage: ''
            };
        },
        methods: {
        //
        //     if (_this.fromData.password !== _this.fromData.confirmPassword) {
        // _this.errorMessage = "Passwords do not match.";
        // return;
    // }

        }
    };
</script>


<style scoped>

</style>