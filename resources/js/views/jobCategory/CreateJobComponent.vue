<template>
    <div>
        <div class="d-flex bg-light align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3" style="margin-left: 20px;">
                    {{$route.meta.pagetitle}}
                </h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <router-link to="/admin/jobcategory/joblist" class="btn btn-primary btn-round">
                    Back To Job List
                </router-link>
            </div>
        </div>

        <form @submit.prevent="submitFromData(fromData)" >
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Job Name</label>
                        <select v-model="fromData.category_id" name="category_id" class="form-control">
                            <template v-for="(item , index) in requireData.category">
                                <option :value="item.id">{{item.name}}</option>
                            </template>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" v-model="fromData.position" name="title" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Salary</label>
                        <input type="number" class="form-control" v-model="fromData.salary"  name="salary" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company Name</label>
                        <select v-model="fromData.company_id" name="company_id" class="form-control" >
                            <option value="" disabled>Select company name</option>
                           <template v-for="(item ,index) in requireData.company">
                               <option :value="item.id">{{item.name}}</option>

                           </template>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" v-model="fromData.address" placeholder="Enter address" name="address" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Job Type</label>
                        <select v-model="fromData.job_type" name="job_type" class="form-control">
                            <option value="">Select Job Type</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Details</label>
                        <textarea class="form-control" v-model="fromData.details" name="details" rows="3" ></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" v-model="fromData.date_time" name="date_time" >
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <div @click="clickFileField('imageField')" class="image_upload" :style="{ 'background-image': 'url('+publicImage('assets/img/uploading.avif')+')' }">
                                    <template v-if="fromData.image !== undefined">
                                        <img :src="storageImage(fromData.image)">
                                    </template>
                                </div>
                                <input @change="uploadImage($event, fromData, 'image')" type="file" id="imageField" class="file_field">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
  

        name: "CreateJobComponent",

        mounted() {
            this.getDataList();
            this.getRequiredData(['category','company']);
            // this.$set(this.fromData, "name", "");

        }
    }
</script>

<style scoped>
    .image_upload img{
        max-width: 100%;
        max-height: 100%;

    }
    .image_upload{
        height: 99px;
        width: 170px;
        background-size: contain;
        background-repeat: no-repeat;
        cursor: pointer;
    }
    #imageField{
        display: none;
    }
</style>
