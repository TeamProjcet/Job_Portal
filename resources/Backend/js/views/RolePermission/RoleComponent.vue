<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div ></div>
                <div class="card mt-3">
                    <div class="card-header">

                        <PageTop :storePermission= "can('roles.store')"/>
                    </div>
                    <div class="card-body">
                        <DataTable :tableHeading="tableHeading">

                            <tr v-for="(data, index) in dataList" :key="data.id">
                                <td>{{index + 1}}</td>
                                <td>{{data.name}}</td>

                                <td>
                                    <a v-if="can('roles.edit')" @click="openEditModal(data, data.id)">
                                        <i class="fas fa-edit" style="color: blue;"></i>
                                    </a>
                                    <a v-if="can('roles.destroy')"  @click="CategoryDatadelete(data.id, index)">
                                        <i class="fas fa-trash-alt" style="color: red;"></i>
                                    </a>
                                </td>
                            </tr>

                        </DataTable>
                        <FormModal @submit="submitFromData(fromData)">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Role Name</label>
                                    <input type="text" class="form-control" v-model="fromData.name" >

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
    import DataTable from "../../Components/DataTable";
    import FormModal from "../../Components/FormModal";
    import PageTop from "../../Components/PageTop";
    export default {
        name: "RoleComponent",
        components: {PageTop, FormModal, DataTable},
        data(){
            return{
                tableHeading:["SL","Name","Action"],

            }
        },
        mounted(){
          this.getDataList();

        },
        methods: {

        }
        }
</script>

<style scoped>

</style>