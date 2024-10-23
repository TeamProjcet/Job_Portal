<!--<template>-->
<!--    <div class="d-flex justify-content-center align-items-center">-->
<!--        <div class="card text-center shadow">-->
<!--            <div class="card-body">-->
<!--                <h1 class="font-weight-bold">{{ currentTime }}</h1>-->
<!--                <p class="">{{ formatDate(currentDate )}}</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--    export default {-->
<!--        name: "TimeWeatherComponent",-->
<!--        data() {-->
<!--            return {-->
<!--                currentTime: "",-->
<!--                currentDate: "",-->
<!--                weather: null,-->
<!--                temperature: null,-->
<!--                timer: null,-->
<!--            };-->
<!--        },-->
<!--        mounted() {-->
<!--            this.updateTime();-->
<!--            this.timer = setInterval(this.updateTime, 1000);-->
<!--        },-->
<!--        methods: {-->
<!--            updateTime() {-->
<!--                const now = new Date();-->
<!--                this.currentTime = now.toLocaleTimeString();-->
<!--                this.currentDate = now.toLocaleDateString();-->
<!--            },-->
<!--        },-->
<!--        beforeDestroy() {-->
<!--            clearInterval(this.timer);-->
<!--        },-->
<!--    };-->
<!--</script>-->

<!--<style scoped>-->
<!--    .card {-->
<!--        width: 400px; /* প্রস্থ কমানো হয়েছে */-->
<!--        height: 90px; /* উচ্চতা কমানো হয়েছে */-->
<!--        background-color: #f8f9fa;-->
<!--    }-->
<!--</style>-->


<template>
    <div class="d-flex justify-content-center align-items-center bg-light">
        <div class="card text-center shadow">
            <div class="card-body">
                <h1 class="font-weight-bold">{{ countdownTime }}</h1>
                <p v-if="timeUp">Time is up!</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TimeWeatherComponent",
        data() {

            return {
                countdownTime: "",
                endTime: null,
                timer: null,
                timeUp: false,
            };
        },
        mounted() {
            this.endTime = new Date("2024-10-30T10:00:00").getTime();

            this.timer = setInterval(this.updateCountdown, 1000);
        },
        methods: {
            updateCountdown() {
                const now = new Date().getTime();
                const distance = this.endTime - now;

                if (distance <= 0) {
                    clearInterval(this.timer);
                    this.countdownTime = "00:00:00";
                    this.timeUp = true;
                } else {
                    const days = Math.floor(distance / (1000 * 60 * 60 * 24)); // দিন
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); // ঘন্টা
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)); // মিনিট
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    this.countdownTime = `${days} দিন ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                }
            },
        },
        beforeDestroy() {
            clearInterval(this.timer);
        },
    };
</script>

<style scoped>
    .card {
        width: 400px;
        height: 90px;
         background-color: #f8f9fa;
    }
</style>

