<template>
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center vh-100 not-found-bg position-relative">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
        <div class="text-center bg-white p-5 rounded-custom shadow-lg position-relative rotating-card">
            <img src="https://img.freepik.com/premium-vector/colorful-picture-number-number-4-bird_917213-250947.jpg?size=626&ext=jpg" alt="Not Found" class="img-fluid">

            <h2 class="mb-3 text-secondary text-gradient">Page Not Found</h2>
            <p class="lead mb-4 text-muted">Sorry, the page you are looking for doesn't exist or has been moved.</p>
            <router-link to="/" class="btn bg-success text-white btn-outline-success btn-lg px-5 custom-btn">
                Go Back Home
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NotFoundPage"
    };
</script>

<style scoped>
    .text-gradient {
        font-size: 2.5rem;
        font-weight: bold;
        background: linear-gradient(45deg, #ff416c, #ff4b2b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .vh-100 {
        height: 100vh;
    }

    .img-fluid {
        max-width: 300px;
        height: auto;
    }

    .btn {
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .not-found-bg {
        background: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?fit=crop&w=1920&q=80') no-repeat center center;
        background-size: cover;
        position: relative;
    }

    .overlay {
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 1;
    }

    .bg-white {
        background-color: white;
    }

    .shadow-lg {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .rounded-custom {
        border-radius: 20px;
        z-index: 2;
    }

    .position-relative {
        z-index: 2;
    }

    .lead {
        font-size: 1.1rem;
    }

    /* Button hover effect */
    .custom-btn:hover {
        background-color: #fff;
        color: #007bff;
        border-color: #007bff;
        box-shadow: 0px 4px 15px rgba(0, 123, 255, 0.5);
        transform: scale(1.05);
    }

    /* Continuous rotation effect */
    .rotating-card {
        animation: rotate 30s linear infinite;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
