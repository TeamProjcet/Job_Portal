<template>
    <div>
        <div class="d-flex bg-light align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3" style="margin-left: 20px;">
                    {{$route.meta.pagetitle}}
                </h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <!-- You can add more elements here if needed -->
            </div>
        </div>

        <div class="container-fluid mt-4">
            <h3 class="d-flex justify-content-center my-4">
                <span class="badge bg-dark py-3 px-3 container-fluid">About Table</span>
            </h3>

            <form @submit.prevent="submitFromData(fromData)">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" v-validate="'required'" v-model="fromData.position" name="title" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Vacancy</label>
                            <input type="number" class="form-control" v-validate="'required'" v-model="fromData.vacancy" name="vacancy" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Salary</label>
                            <input type="text" class="form-control" v-validate="'required'" v-model="fromData.salary" name="salary" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" v-validate="'required'" v-model="fromData.address" placeholder="Enter address" name="address" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Details</label>
                            <editor v-model="fromData.details" v-validate="'required'" name="details" :init="tinymceInit" />
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Upload Image</label>
                                    <div @click="clickFileField('imageField')" class="image_upload" :style="{ 'background-image': 'url(' + publicImage('images/uploading.avif') + ')' }">
                                        <template v-if="fromData.image !== undefined">
                                            <img class="photo" :src="storageImage(fromData.image)" />
                                        </template>
                                    </div>
                                    <input @change="uploadImage($event, fromData, 'image')" type="file" name="image" id="imageField" class="file_field" />
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
    export default {
        name: "FrontendManage",
        data(){
            return{

                tinymceInit:{
                    height: 300,
                    menubar: false,
                    plugins: 'link image code',
                    toolbar: 'undo redo | styleselect | bold italic | link image | code',
                }
            }
        }
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