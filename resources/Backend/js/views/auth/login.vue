<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h5 class="card-title text-center">Login Form</h5>
                <form @submit.prevent="login">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" v-model="email" id="email" required>
                    </div>
                    <div class="form-group position-relative">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" v-model="password" id="password" required>
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember-me">
                        <label class="form-check-label" for="remember-me">Remember me</label>
                    </div>
                    <div class="text-center mt-3">
                        <a href="forgot.html" class="btn btn-link">Forgot password?</a>
                    </div>
                    <button class="btn btn-success btn-block mt-3">Login</button>
<!--                    <div class="text-center mt-3">-->
<!--                        Not a member? <a href="{{url('/register')}}" class="btn btn-link">Signup now</a>-->
<!--                    </div>-->
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "logib",
        data() {
            return {
                email: '',
                password: '',
                user: null,
            };
        },
        methods: {
            async login() {
                const credentials = { email: this.email, password: this.password };
                try {
                    const response = await axios.post('/api/login', credentials);
                    const token = response.data.token;
                    localStorage.setItem('token', token);

                    // লগইনের পর ব্যবহারকারীর ডেটা ফেচ করুন
                    await this.fetchUserData();
                } catch (error) {
                    console.error('লগইন ব্যর্থ:', error.response.data);
                }
            },
            async fetchUserData() {
                const token = localStorage.getItem('token');
                try {
                    const response = await axios.get('/api/user', {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    });
                    this.user = response.data; // প্রতিক্রিয়া ব্যবহারকারী ডেটা ধারণ করে
                } catch (error) {
                    console.error('ব্যবহারকারীর ডেটা ফেচ করতে ব্যর্থ:', error.response.data);
                }
            },
        },
    }
</script>

<style scoped>
    .field-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>
