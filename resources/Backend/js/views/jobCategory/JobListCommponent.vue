<template>

    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
                    <div>
                        <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
                    </div>
                    <div class="ms-md-auto py-2 py-md-0">
                        <router-link v-if="can('joblist_add')" to="/admin/jobcategory/createjob"  class="btn btn-primary btn-round"><i class="fas fa-plus"></i>Add</router-link>
                    </div>
                </div>
            </div>
            <DataTable :tableHeading="tableHeading">
                <tr v-for="(data, index) in dataList" :key="index" >
                    <td>{{index +1}}</td>
                    <td>{{data.position}}</td>
                    <td>{{data.salary  || 'Negotiatable'}}</td>
                    <td>{{data.address}}</td>
                    <td><img :src="storageImage(data.image)" style="width: 100px; height: 100px" alt="Image"></td>
                    <td>{{data.date_time}}</td>
                    <td>
                    <span :class="data.status ? 'badge badge-success' : 'badge badge-danger'">
                        {{ data.status ? 'Active' : 'Inactive' }}
                    </span>
                    </td>
                    <td>

                        <a v-if="can('joblist_edit')" @click="openEditModal(data, data.id)">
                            <i class="fas fa-edit" style="color: blue;"></i>
                        </a>

                        <a v-if="can('joblist_delete')" @click="CategoryDatadelete(data.id, index)">
                            <i class="fas fa-trash-alt" style="color: red;"></i>
                        </a>
                    </td>
                </tr>
            </DataTable>
            <template>
<!--                <pagination-->
<!--                        :current-page="pagination.current_page"-->
<!--                        :total="pagination.total"-->
<!--                        :per-page="10"-->
<!--                        @paginate="getDataList"-->
<!--                        previousText="PREV"-->
<!--                        nextText="NEXT"-->
<!--                ></pagination>-->
                <pagination previousText="PREV" nextText="NEXT" :data="dataList" @paginateTo="getDataList"></pagination>
            </template>
            <FormModal class="form-modal"  @submit="submitFromData(fromData)">
                <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Job Name</label>
                            <select v-model="fromData.category_id" v-validate="'required'" name="category_id" class="form-control">
                                <template v-for="(item, index) in requireData.category">
                                    <option :value="item.id">{{item.name}}</option>
                                </template>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" v-validate="'required'" v-model="fromData.position" name="title">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Salary</label>
                            <input type="number" class="form-control" v-validate="'required'" v-model="fromData.salary" name="salary">
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
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" v-validate="'required'" v-model="fromData.address" placeholder="Enter address" name="address">
                        </div>

                        <div class="mb-3">
                    <label class="form-label">Job Type</label>
                    <select v-model="fromData.job_type" v-validate="'required'" name="job_type" class="form-control">
                        <option value="">Select Job Type</option>
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
                        <label class="form-label">Date</label>
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
                                    <input @change="uploadImage($event, fromData, 'image')" type="file" name="image" id="imageField" class="file_field">
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
                </div>
            </FormModal>
<!--            <a v-if="dataList && dataList.current_page < dataList.last_page"-->
<!--               class="btn btn-primary py-3 px-5"-->
<!--               @click="getDataList(dataList.current_page + 1)">-->
<!--                Browse More Jobs-->
<!--            </a>-->


        </div>

    </div>


</template>

<script>
    import PageTop from "../../Components/PageTop";
    import DataTable from "../../Components/DataTable";
    import FormModal from "../../Components/FormModal";

    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';
    import Pagination from "../plugins/pagination/pagination";

    export default {
        components: {FormModal, DataTable, PageTop,DatePicker,Pagination},


        name: "JobListCommponent",
        data() {
            return {
                tableHeading: ["Sl", "Title",  "Salary", "Location","image", "Date", "Status", "Action"],
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
            this.getRequiredData(['category','company','job_type']);

        },
        storageImage(imagePath) {
            return `${uploadPath}${imagePath}`;
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
