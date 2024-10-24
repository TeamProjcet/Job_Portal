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

        <form @submit.prevent="submitFromData(fromData)">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Job Name</label>
                        <select v-model="fromData.category_id" name="category_id" v-validate="'required'" class="form-control">
                            <template v-for="(item, index) in requireData.category">
                                <option :value="item.id">{{item.name}}</option>
                            </template>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Position</label>
                        <input type="text" class="form-control" v-validate="'required'" v-model="fromData.position" name="title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Vacancy</label>
                        <input type="number" class="form-control" v-validate="'required'" v-model="fromData.vacancy" name="title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Salary</label>
                        <input type="text" class="form-control" v-validate="'required'" v-model="fromData.salary" name="salary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company Name</label>
                        <select v-model="fromData.company_id" v-validate="'required'" name="company_id" class="form-control">
                            <option value="" disabled>Select company name</option>
                            <template v-for="(item, index) in requireData.company">
                                <option :value="item.id">{{item.name}}</option>
                            </template>
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="form-label">Location</div>
                        <select class="form-control" v-model="fromData.address" v-validate="'required'" name="address">
                            <template v-for="item in requireData.district">
                                <option :value="item.name">{{item.name}}</option>
                            </template>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Job Type</label>
                        <select v-model="fromData.job_type" name="job_type" v-validate="'required'" class="form-control">
                            <option  disabled>Select Job Type</option>
                            <template v-for="(type, index) in requireData.job_type">
                                <option :value="type.value">{{type.name}}</option>
                            </template>
                        </select>
                    </div>

                <div class="mb-3">
                    <label class="form-label">Details</label>
                    <editor v-model="fromData.details" v-validate="'required'" name="details" :init="tinymceInit"/>
                </div>


                    <div class="mb-3">
                        <label class="form-label">Date Line</label>
                        <div>
                            <date-picker class="w-100" placeholder="" v-validate="'required'" v-model="fromData.date_time" name="date_time" valueType="format"></date-picker>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Upload Image</label>
                                <div @click="clickFileField('imageField')" class="image_upload" :style="{ 'background-image': 'url(' + publicImage('images/uploading.avif') + ')' }">
                                    <template v-if="fromData.image !== undefined">
                                        <img class="photo" :src="storageImage(fromData.image)">
                                    </template>
                                </div>
                                <input @change="uploadImage($event, fromData, 'image')" type="file" name="image"  id="imageField" class="file_field">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div>
                            <label>
                                <input type="radio" v-model="fromData.status" :value="1"> Active
                            </label>
                            <label>
                                <input type="radio" v-model="fromData.status" :value="0"> Inactive
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</template>


<script>

    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';
    import PageTop from "../../Components/PageTop";
    export default {
        name: "CreateJobComponent",
        components: {
            PageTop,
            DatePicker
        },
        data() {
            return {
                isReadOnly: false,
                tinymceInit:{
                    height: 300,
                    menubar: false,
                    plugins: 'link image code',
                    toolbar: 'undo redo | styleselect | bold italic | link image | code',
                }
            };
        },
        mounted() {
            this.getDataList();
            this.getRequiredData(['category','company','job_type','district']);
        },
    }
</script>

<style scoped>
    .image_upload img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 4px;
    }
    .image_upload {
        height: 120px;
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        cursor: pointer;
        border: 2px dashed #007bff;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .photo {
        height: 100%;
        width: 100%;
        border-radius: 4px;
    }
    #imageField {
        display: none;
    }
</style>


