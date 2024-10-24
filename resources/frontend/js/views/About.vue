<template>
    <div class="">

        <!-- Header End -->
        <div class=" py-5 bg-dark page-header mb-5">
            <div class="container  my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3  slideInDown">{{$t('about_us')}}</h1>
            </div>
        </div>
        <!-- Header End -->


        <!-- About Start -->    
        <div class="container-xxl py-5 shadow p-4 rounded">
            <div class="container">

                <div class="row g-5 align-items-center">
                    <div class="col-lg-6" >
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start" v-if="frontdata">
                                <img  style="width: 600px" :src="storageImage(frontdata.image)" alt="image"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" >
                        <h1 v-if="frontdata" class="mb-4">{{frontdata.title}}</h1>
                        <p  v-if="frontdata" v-html="frontdata.details" class="mb-4"></p>

                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "About",
        data(){
            return{
                frontdata:null

            }
        },
        mounted(){
            this.getFrontdata();
        },
        methods:{
            async getFrontdata() {
                axios.get('api/frontend/frontData')
                    .then((response) => {
                        this.frontdata = response.data.result[0];
                    })
                    .catch((error) => {
                        this.error = "Error fetching data. Please try again later.";
                    });
            }

        }
    }
</script>

<style scoped>

</style>