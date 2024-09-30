<template>

    <div class="row">
        <div class="card">
            <div class="card-header">
                <PageTop></PageTop>
            </div>
            <DataTable :tableHeading="tableHeading">


                <tr v-for="(data, index) in dataList" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>N/A</td>
                    <td>{{ data.title }}</td>
                    <td v-html="data.description"></td>
                    <td><img :src="storageImage(data.image)" style="width: 100px; height: 100px" alt="Image"></td>
                    <td>
                    <span :class="data.status ? 'badge badge-success' : 'badge badge-danger'">
                        {{ data.status ? 'Active' : 'Inactive' }}
                    </span>
                    </td>
                    <td>
                        <a @click="openEditModal(data , data.id)">
                            <i class="fas fa-edit" style="color: blue;"></i>
                        </a>
                        <a @click="CategoryDatadelete(data.id, index)">
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
                    <textarea id="details" class="form-control" v-model="fromData.description" name="details" rows="5" placeholder="Enter job details..."></textarea>
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
        components: {FormModal, DataTable, PageTop},
        data() {
            return {
                tableHeading: ["Id", "company name", "title", "description", "image", "status", "action"],
                isReadOnly: false,
            };
        },
        mounted() {
            this.getDataList();
            this.getRequiredData(['company']);
            this.initTinyMCE();

        },
        methods: {
            initTinyMCE() {
                tinymce.init({
                    selector: 'textarea',
                    setup: (editor) => {
                        editor.on('change', () => {
                            this.fromData.description = editor.getContent();
                        });
                    },
                    // Additional TinyMCE configuration can go here
                    menubar: false,
                    statusbar: false,
                    toolbar: "undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify lineheight | checklist bullist numlist indent outdent | removeformat | code",
                    height: 300,
                    readonly: false,
                    license_key: 'gpl',
                });
            },

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