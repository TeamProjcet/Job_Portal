<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center">Seeker Login</h2>
                <form @submit.prevent="submitLogin">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" v-model="fromData.email" id="email" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" v-model="fromData.password" id="password" class="form-control" required />
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <p v-if="errorMessage" class="text-danger mt-3">{{ errorMessage }}</p>
                <div class="text-center">
                    <p>Don't have an account? <router-link to="/seekerregis" class="btn btn-link">Register</router-link></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "SeekerLogin",
        data() {
            return {

                errorMessage: ''
            };
        },
        methods: {
            submitLogin() {
                const _this = this;

                axios.post('api/frontend/seekerlogin', {
                    email: _this.fromData.email,
                    password: _this.fromData.password
                })
                    .then(function (res) {
                        if (parseInt(res.data.status) === 2000) {
                            _this.$toast.success("Login successful!");
                            _this.$router.push('/');
                        } else {
                            _this.$toast.error("Invalid credentials!");
                        }
                    })
                    .catch(function (error) {
                        if (error.response) {
                            _this.errorMessage = error.response.data.message || "An error occurred.";
                        }
                    });
            }
        }
    };
</script>

<style scoped>
    /* এখানে আপনার স্টাইল যুক্ত করুন */
</style>
