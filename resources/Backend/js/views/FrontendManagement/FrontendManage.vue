<template>
    <div>

        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
            <div>
                <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
            </div>
        </div>

        <div class="container-fluid mt-4">

            <div class="col-md-10 container-fluid">
                <div class="card">
                    <div class="card-body text-center position-relative">
                        <hr>
                        <h3 class="d-flex justify-content-center my-4">
                            <span class="badge bg-dark py-3 px-3 container-fluid">About Table</span>
                        </h3>
                        <table class="table table-borderless">
                            <tbody v-if="dataList.length">
                            <tr>
                                <td><strong>Title:</strong></td>
                                <td>{{dataList[0].title}}</td>
                            </tr>
                            <tr>
                                <td><strong>Details:</strong></td>
                                <td v-html="dataList[0].details"></td>

                            </tr>
                            <tr>
                                <td><strong>Image:</strong></td>
                                <td><img :src="storageImage(dataList[0].image)" alt="image" class="img-fluid" style="max-width: 100px;"/></td>
                            </tr>
                            </tbody>
                        </table>

                        <hr>
                        <h3 class="d-flex justify-content-center my-4">
                            <span class="badge bg-dark py-3 px-3 container-fluid">Contact Table</span>
                        </h3>
                        <table class="table table-borderless">
                            <tbody v-if="dataList.length">
                            <tr>
                                <td><strong>Location:</strong></td>
                                <td>{{dataList[0].location}}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>{{dataList[0].email}}</td>
                            </tr>
                            <tr>
                                <td><strong>Phone:</strong></td>
                                <td>+88{{dataList[0].phone}}</td>
                            </tr>
                            <tr>
                                <td><strong>Map:</strong></td>
                                <td><a :href="dataList[0].map" target="_blank">View Map</a></td>
                            </tr>
                            <tr>
                                <td><strong>Facebook:</strong></td>
                                <td><a :href="dataList[0].facebook" target="_blank">View Facebook</a></td>
                            </tr><tr>
                                <td><strong>Linkdin:</strong></td>
                                <td><a :href="dataList[0].map" target="_blank">View Linkdin</a></td>
                            </tr><tr>
                                <td><strong>Youtube:</strong></td>
                                <td><a :href="dataList[0].map" target="_blank">View Youtube</a></td>
                            </tr><tr>
                                <td><strong>Twitter:</strong></td>
                                <td><a :href="dataList[0].map" target="_blank">View Twitter</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex p-2 gap-2" >
                        <div v-if="can('frontmanage.store')">
                        <button v-if="!dataList.length" @click="openEditModal()" type="button" class="btn btn-success">Save </button>
                        </div>
                        <div v-if="can('frontmanage.update')">
                        <template  v-for="data in dataList">
                            <button v-if="dataList.length" @click="openEditModal(data,data.id)" type="button" class="btn btn-primary">Update </button>
                        </template>
                        </div>
                    </div>
                </div>

            </div>

            <FormModal @submit="submitFromData(fromData)">
<!--                about    Section-->
                    <div class="col-md-12">
                        <h3 class="d-flex justify-content-center my-4">
                            <span class="badge bg-dark py-3 px-3 container-fluid">About Table</span>
                        </h3>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" v-validate="'required'" v-model="fromData.title" name="title" />
                        </div>

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

                    </div>
<!--                    Contact Section-->
                    <div class="col-md-12">
                        <h3 class="d-flex justify-content-center my-4">
                            <span class="badge bg-dark py-3 px-3 container-fluid">Contact Table</span>
                        </h3>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" v-validate="'required'" v-model="fromData.location" name="location" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" v-validate="'required'" v-model="fromData.phone" name="phone" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" v-validate="'required'" v-model="fromData.email" name="email" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Map</label>
                            <input type="url" class="form-control" v-validate="'required'" v-model="fromData.map" name="map" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Facebook</label>
                            <input type="url" class="form-control" v-validate="'required'" v-model="fromData.facebook" name="facebook" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Youtube</label>
                            <input type="url" class="form-control" v-validate="'required'" v-model="fromData.youtube" name="youtube" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Linkdin</label>
                            <input type="url" class="form-control" v-validate="'required'" v-model="fromData.linkdin" name="linkdin" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Twitter</label>
                            <input type="url" class="form-control" v-model="fromData.twitter" name="twitter" />
                        </div>
                    </div>
            </FormModal>
        </div>
    </div>
</template>


<script>
    import PageTop from "../../Components/PageTop";
    import FormModal from "../../Components/FormModal";
    export default {
        name: "FrontendManage",
        components: {FormModal, PageTop},
        data(){
            return{

                tinymceInit:{
                    height: 500,
                    menubar: false,
                    plugins: 'link image code',
                    toolbar: 'undo redo | styleselect | bold italic | link image | code',
                }
            }
        },
        mounted() {
            this.getDataList();
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