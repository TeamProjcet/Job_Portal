<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card-header ">
                    <h3  class=" btn-custom" >Role</h3>
                    <select  class="form-control" v-model="selectedRole" @change="getRolesPermissions()">
                        <option disabled>Select Role</option>
                        <option v-for="role in requireData.roles" :key="role.id" :value="role.id">
                            {{ role.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div v-if="status" class="alert alert-success">{{ status }}</div>
                <div class="card mt-1">

                    <div class="overflow-auto my-3">
                        <table class="role-permission-table">
                            <thead >
                            <tr class="text-centerN">
                                <th>Modules</th>
                                <th colspan="7">Permissions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="data in dataList" :key="data.id">
                                <td>
                                    <input type="checkbox"
                                           :checked="selectedModules.includes(data.id)"
                                           @change="setPermission($event, selectedModules,  data.id, data)">


                                {{ data.name }}
                                </td>

                                <td v-for="permission in data.permissions" :key="permission.id">
                                    <input type="checkbox"
                                           :checked="selectedPermissions.includes(permission.id)"
                                           @change="setPermission($event, selectedPermissions, permission.id)">

                                    {{ permission.name }}
                                </td>

                            </tr>
                            </tbody>
                        </table>
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
    import {Toast} from "vue-toastification";

    import axios from 'axios';
    export default {
        name: "PermissionComponent",
        components: {DataTable, FormModal, PageTop},
        data() {
            return {
                tableHeading: ["Module Name", "Permission Name"],
                status: null,
                roles: [],
                selectedRole: null,
                selectedModules: [],
                selectedPermissions: [],

            };
        },
        mounted() {
            this.getDataList();
            this.getRequiredData(['roles']);

        },
        methods: {
            getRolesPermissions : function (){
                const _this = this;
                var url = _this.urlGenaretor(`api/roles/${this.selectedRole}/permissions`);
                _this.httpReq('get', url, {}, {}, function (retData){
                    _this.selectedModules = retData.result.role_modules;
                    _this.selectedPermissions = retData.result.role_permissions;
                })
            },

            setPermission : function (event, object, id, baseObject = false){
                const _this = this;
                if (event.target.checked){
                    object.push(id);

                    if (typeof baseObject === 'object'){
                        $.each(baseObject.permissions, function (index, value){
                            _this.selectedPermissions.push(value.id);
                        });
                    }
                }else{
                    var index = object.indexOf(id);
                    object.splice(index, 1);

                    if (typeof baseObject === 'object'){
                        $.each(baseObject.permissions, function (index, value){
                            var dataIndex = _this.selectedPermissions.indexOf(value.id);
                            _this.selectedPermissions.splice(dataIndex, 1) ;
                        });
                    }
                }
                try {
                    var url = _this.urlGenaretor(`api/roles/${this.selectedRole}/permissions`);
                    axios.post(url, { permissions: this.selectedPermissions,modules: this.selectedModules })
                        .then(response => {
                            _this.$toast.success("Permissions updated successfully!");
                        })
                        .catch(error => {
                            _this.$toast.error("Error updating permissions!");
                        });
                } catch (error) {
                    _this.$toast.error("Error updating permissions!");
                }
            },


        }

    };
</script>

<style scoped>
    .btn-custom {
        background-color: rgba(26, 26, 26, 0.84);
        color: white;
        text-align: center;
        border-bottom: 2px solid #dee2e6;
        border-bottom-right-radius: 20px;
        border-top-left-radius: 20px;
        width: 200px;
    }

    .btn-custom:hover {
        background-color: #218838;
    }
    h1 {
        text-align: center;
        color: #423a8e;
        font-weight: bold;
        font-size: 1.7em;
    }


    input[type="checkbox"] {
        margin-right: 5px;
        transform: scale(0.9);
        cursor: pointer;
        accent-color: #423a8e;
    }


    .role-select option {
        background-color: #ffffff;
        color: #333;
        padding: 10px;
        font-size: 16px;

    }




    .role-permission-table {
        min-width: 100%;
        border-collapse: collapse;
        text-align: left;
        font-size: 12px;
    }

    .role-permission-table th,
    .role-permission-table td {
        border: 1px solid #dddddd;
        padding: 6px;
    }

    .role-permission-table th {
        background-color: #423a8e;
        color: white;
        font-weight: bold;
    }

    .role-permission-table td {
        /*display: flex;*/
        background-color: #f9f9f9;
        color: #555555;
    }

    .role-permission-table tr:hover {
        background-color: #f1f1f1;
    }

    label {
        display: flex;
        cursor: pointer;
        font-weight: normal;
    }

    input[type="checkbox"]:checked {
        background-color: #423a8e;
        border-color: #423a8e;
    }


    label {
        cursor: pointer;
        font-weight: normal;
        margin-bottom: 0;
    }
</style>
