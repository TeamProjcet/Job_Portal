<template>

    <div class="row">
        <div class="card">
            <div class="card-header">
                <PageTop></PageTop>
            </div>
            <DataTable :tableHeading="tableHeading">


                <tr v-for="(data, index) in dataList" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{data.company.name}}</td>
                    <td>{{ data.title }}</td>
                    <td><img :src="storageImage(data.image)" style="width: 100px; height: 100px" alt="Image"></td>
                    <td>
                    <span :class="data.status ? 'badge badge-success' : 'badge badge-danger'">
                        {{ data.status ? 'Active' : 'Inactive' }}
                    </span>
                    </td>
                    <td>
                        <a v-if="can('blogpost.edit')" @click="openEditModal(data , data.id)">
                            <i class="fas fa-edit" style="color: blue;"></i>
                        </a>
                        <a v-if="can('blogpost.destroy')" @click="CategoryDatadelete(data.id, index)">
                            <i class="fas fa-trash-alt" style="color: red;"></i>
                        </a>
                    </td>
                </tr>

            </DataTable>
        </div>

        <!--        slot-->
        <FormModal @submit="submitFromData(fromData)">
            <div class="row">
                <div class="col-md-12">
                    <label>Company Name</label>
                    <select class="form-control" v-model="fromData.company_id" name="company_id"
                            v-validate="'required'">
                        <option disabled>Select Company</option>
                        <template v-for="(item ,index) in requireData.company">
                            <option :value="item.id">{{item.name}}</option>
                        </template>

                    </select>

                </div>
                <div class="col-md-12">
                    <label>Title</label>

                    <input
                            v-validate="'required'"
                            v-model="fromData.title"
                            class="form-control"
                            name="title"
                            type="text"
                    />
                </div>

                <div class="mb-3">
                    <label class="form-label">Details</label>
                    <editor v-model="fromData.description" v-validate="'required'" name="details" :init="tinymceInit"/>
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
                            <input @change="uploadImage($event, fromData, 'image')" type="file" name="image" id="imageField" class="file_field">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <div class="form-check">
                        <input
                                class="form-check-input"
                                type="radio"
                                v-model="fromData.status"
                                :value="1"
                                id="activeStatus"
                        />
                        <label class="form-check-label" for="activeStatus">
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                                class="form-check-input"
                                type="radio"
                                v-model="fromData.status"
                                :value="0"
                                id="inactiveStatus"
                        />
                        <label class="form-check-label" for="inactiveStatus">
                            Inactive
                        </label>
                    </div>
                </div>

            </div>
        </FormModal>

    </div>


</template>

<script>
    import PageTop from "../../Components/PageTop";
    import DataTable from "../../Components/DataTable";
    import FormModal from "../../Components/FormModal";


    export default {
        name: "BlogPostComponent",
        components: {
            FormModal, DataTable, PageTop
        },
        data() {
            return {
                tableHeading: ["Id", "company name", "title",  "image", "status", "action"],
                tinymceInit:{
                    license_key: 'gpl',
                    height: 300,
                    menubar: false,
                    plugins: 'link image code',
                    toolbar: 'undo redo | styleselect | bold italic | link image | code',
                }
            };
        },
        mounted() {
            this.getDataList();
            this.getRequiredData(['company']);
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
