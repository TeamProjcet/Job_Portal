<template>

    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
                    <div>
                        <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
                    </div>
                    <div class="ms-md-auto py-2 py-md-0">
                        <router-link to="/admin/jobcategory/createjob"  class="btn btn-primary btn-round"><i class="fas fa-plus"></i>Add</router-link>
                    </div>
                </div>
            </div>
            <DataTable :tableHeading="tableHeading">
                <tr>
                    <td>1</td>
                    <td>WEB</td>
                    <td>Junior Developer</td>
                    <td>We are seeking a skilled Web Developer to join our team</td>
                    <td>full time</td>
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
            </div>
        </FormModal>
    </div>


</template>

<script>
    import PageTop from "../../Components/PageTop";
    import DataTable from "../../Components/DataTable";
    import FormModal from "../../Components/FormModal";
    export default {
        components: {FormModal, DataTable, PageTop},
        name: "JobPostCommponent",
        data() {
            return {
                tableHeading: ["Sl", "Name", "Title", "Details", "Type", "Action"],

            };
        },
        mounted() {
            // this.getDataList();
            // this.$set(this.fromData, "name", "");
            this.getDataList();
            this.getRequiredData(['category']);
        },
        computed: {}
    }
</script>

<style scoped>

</style>