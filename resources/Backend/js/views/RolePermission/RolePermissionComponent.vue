<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div ></div>
                <div class="card mt-3">
                    <div class="card-header">

                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
                            <div>
                                <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
                            </div>
                            <div class="ms-md-auto py-2 py-md-0">
                                <router-link to="/admin/role/role"  class="btn btn-primary btn-round"><i class="fas fa-plus"></i>Add Role</router-link>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <DataTable :tableHeading="tableHeading">

                            <tr v-for="(data, index) in dataList" :key="index">
                                <td>{{index + 1}}</td>
                                <td>{{data.name}}</td>
                                <td>{{data.email}}</td>
                                <td v-if="data.roles && data.roles.length">
                                    <label class="badge bg-primary mx-1 ">{{data.roles[0].name}}</label></td>
                                <td v-else>No Role Assigned</td>
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
                        <FormModal @submit="submitFromData(fromData)">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">User Name</label>
                                    <input type="text" class="form-control" v-model="fromData.name" readonly>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">User Name</label>
                                    <input type="text" class="form-control" v-model="fromData.email" readonly>

                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Role Name</label>
                                    <select  v-validate="'required'" v-model="fromData.role_id" name="role_id" class="form-control" >
                                        <option value="" disabled>Select Role name</option>
                                        <template v-for="(item, index) in requireData.roles">
                                            <option :value="item.id">{{item.name}}</option>
                                        </template>
                                    </select>
                                </div>

                            </div>
                        </FormModal>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import PageTop from "../../Components/PageTop";
    import FormModal from "../../Components/FormModal";
    import DataTable from "../../Components/DataTable";

    export default {
        name: "RolePermissionComponent",
        components: {DataTable, FormModal, PageTop},
        data() {
            return {
                tableHeading: ["SL","User Name", "User Email","Role Name","Action"],
                roles: [],
            }
        },
        mounted() {
            this.getDataList();
            this.getRequiredData(['roles']);

        },
        methods: {


        }


    }
</script>

<style scoped>
textcolor{
    color: white;
}

</style>