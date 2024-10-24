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

                            <div class="col-6 text-start">
                                <img @dblclick="openTextModal('aboutimage1')" class="img-fluid w-100"  :src="staticText.aboutimage1" alt="image"/>

                            </div>
                            <div class="col-6 text-start">
                                <img @dblclick="openTextModal('aboutimage2')" class="img-fluid" style="width: 85%; margin-top: 15%;"  :src="staticText.aboutimage2" alt="image"/>

                            </div>
                            <div class="col-6 text-end">
                                <img @dblclick="openTextModal('aboutimage3')"  class="img-fluid" style="width: 85%;"  :src="staticText.aboutimage3" alt="image"/>

                            </div>
                            <div class="col-6 text-end">
                                <img @dblclick="openTextModal('aboutimage4')" class="img-fluid w-100"   :src="staticText.aboutimage4" alt="image"/>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6" >
                        <h1 @dblclick="openTextModal('aboutTitle')" class="mb-4">{{staticText.aboutTitle}}</h1>
                        <p @dblclick="openTextModal('aboutDetails')"  v-html="staticText.aboutDetails" class="mb-4"></p>

                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        <TextModal @submit="submitText()"     :isModalOpen="isModalOpen"
                   @close="isModalOpen = false" >

            <textarea v-model="editableText" class="form-control" rows="4"></textarea>
        </TextModal>
    </div>
</template>

<script>
    import axios from 'axios'
    import TextModal from "../Components/TextModal";
    export default {
        name: "About",
        components: {TextModal},
        data(){
            return{
                frontdata:null,
                staticText: {},
                isModalOpen: false,
                canOpenModal:false,


            };
        },
        created() {
            this.fetchStaticTexts();
            this.checkUserRole();


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
    .whimage{
        width: 200px;
    }

</style>