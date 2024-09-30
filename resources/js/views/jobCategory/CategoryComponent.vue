<template>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <PageTop></PageTop>
            </div>
            <DataTable :tableHeading="tableHeading">
                <tr v-for="(data, index) in dataList" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ data.name }}</td>
                    <td>
                        <!-- Display the image -->
                        <img :src="storageImage(data.image)" style="width: 100px; height: 100px" alt="Image">
                    </td>
                    <td>
                        <a @click="openEditModal(data, data.id)">
                            <i class="fas fa-edit" style="color: blue;"></i>
                        </a>
                        <a @click="CategoryDatadelete(data.id, index)">
                            <i class="fas fa-trash-alt" style="color: red;"></i>
                        </a>
                    </td>
                </tr>
            </DataTable>
        </div>

        <!-- Slot for the form modal -->
        <FormModal @submit="submitFromData(fromData)">
            <div class="row">
                <div class="col-md-12">
                    <label>Category Name</label>
                    <input
                            v-validate="'required'"
                            v-model="fromData.name"
                            class="form-control"
                            name="name"
                            type="text"
                    />
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
            </div>
        </FormModal>
    </div>
</template>

<script>
    import PageTop from "../../Components/PageTop";
    import DataTable from "../../Components/DataTable";
    import FormModal from "../../Components/FormModal";

    export default {
        name: "CategoryComponent",
        components: {FormModal, DataTable, PageTop},
        data() {
            return {
                tableHeading: ["Sl", "Name", "Image", "Action"], // Make sure Image is included here
            };
        },
        mounted() {
            this.getDataList(); // Ensure you fetch the data that includes images
        },
        methods: {
            // Assuming this function retrieves the correct path for images
            storageImage(imagePath) {
                return `/storage/${imagePath}`;
            }
        }
    };
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
        border: 2px dashed #007bff; /* Add a dashed border for better visibility */
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .photo {
        height: 100%;
        width: 100%;
        border-radius: 4px; /* Match the border radius of the upload area */
    }
    #imageField {
        display: none;
    }
</style>
