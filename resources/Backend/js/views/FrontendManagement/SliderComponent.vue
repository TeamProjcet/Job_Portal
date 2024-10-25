<template>
    <div>
        <div>
            <div class="card-header">
                <PageTop :storePermission="can('company.store')"/>
            </div>
            <DataTable :tableHeading="tableHeading">
                <tr v-for="(data, index) in dataList" :key="index">
                    <td>{{index +1}}</td>
                    <td>{{data.title}}</td>
                    <td>{{truncateString(data.description, 20)}}</td>
                    <td><img :src="storageImage(data.slide_image)" style="width: 100px; height: 100px" alt="Image"></td>
                    <td>
                        <a  @click="openEditModal(data, data.id)">
                            <i class="fas fa-edit" style="color: blue;"></i>
                        </a>
                        <a  @click="CategoryDatadelete(data.id, index)">
                            <i class="fas fa-trash-alt" style="color: red;"></i>
                        </a>
                    </td>
                </tr>
            </DataTable>
        </div>

        <div class="container-fluid mt-4">
            <FormModal @submit="submitFromData(fromData)">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" v-validate="'required'" v-model="fromData.title" name="title" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Details</label>
                        <editor v-model="fromData.description" v-validate="'required'" name="details" :init="tinymceInit" />
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Upload Image</label>
                                <div @click="clickFileField('imageField')" class="image_upload" :style="{ 'background-image': 'url(' + publicImage('images/uploading.avif') + ')' }">
                                    <template v-if="fromData.slide_image !== undefined">
                                        <img class="photo" :src="storageImage(fromData.slide_image)" />
                                    </template>
                                </div>
                                <input @change="uploadImage($event, fromData, 'slide_image')" type="file" name="slide_image" id="imageField" class="file_field" />
                            </div>
                        </div>
                    </div>

                </div>
            </FormModal>
        </div>
    </div>
</template>

<script>
    import PageTop from "../../Components/PageTop";
    import FormModal from "../../Components/FormModal";
    import DataTable from "../../Components/DataTable";

    export default {
        components: {FormModal, PageTop, DataTable},
        name: "SliderComponent",

        data(){
            return{
                tableHeading: ["SL", "Title", "Description", "Slider Image", "Action"],
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