<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div></div>
                <div class="card mt-3">
                    <div class="card-header">

                        <div class="container-fluid py-4">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-md-start mb-2 mb-md-0">
                                    <router-link to="/admin/role/role" class="btn btn-dark btn-round">
                                        <i class="fas fa-plus"></i> Add Role
                                    </router-link>
                                </div>
                                <div class="col-md-4 text-center">
                                    <h3 class="fw-bold">User Add Role</h3>
                                </div>
                                <div class="col-md-4 text-md-end mb-2 mb-md-0">
                                    <router-link to="/admin/user/registration" class="btn btn-dark btn-round">
                                        <i class="fas fa-plus"></i> Add User
                                    </router-link>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <DataTable :tableHeading="tableHeading">
                            <tr v-for="(data, index) in dataList" :key="index">
                                <td>{{index + 1}}</td>
                                <td>{{data.name}}</td>
                                <td>{{data.email}}</td>
                                <td>{{data.company.name}}</td>

                                <td v-if="data.roles && data.roles.length">
                                    <label class="badge bg-primary mx-1">{{data.roles[0].name}}</label>
                                </td>
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
                                    <label class="form-label">User Email</label>
                                    <input type="text" class="form-control" v-model="fromData.email" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Role Name</label>
                                    <select v-validate="'required'" v-model="fromData.role_id" name="role_id" class="form-control">
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
        components: { DataTable, FormModal, PageTop },
        data() {
            return {
                tableHeading: ["SL", "User Name", "User Email","Company name", "Role Name", "Action"],
                roles: [],
            };
        },
        mounted() {
            this.getDataList();
            this.getRequiredData(['roles']);
        },
        methods: {}
    };
</script>

<style scoped>
    textcolor {
        color: white;
    }
</style>
