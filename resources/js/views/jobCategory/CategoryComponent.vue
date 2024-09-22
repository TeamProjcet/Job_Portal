<template>
    <div class="container">
        <div class="page-inner" >
    <div class="row">
        <div class="card">
            <div class="card-header">
                <PageTop></PageTop>
            </div>
            <DataTable :tableHeading="tableHeading">
                <tr >
                    <td>1</td>
                    <td>WEB</td>
                    <td>
                        <a  @click="openEditModal(data , data.id)">
                            <i class="fas fa-edit" style="color: blue;"></i>
                        </a>
                        <a  @click="CategoryDatadelete(data.id, index)">
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
<!--                            v-model="fromData.name"-->
                            class="form-control"
                            name="name"
                            type="text"
                    />
                </div>
            </div>
        </FormModal>
    </div>
    </div>
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
                tableHeading: ["Sl", "name", "Action"],

            };
        },
        mounted() {
            // this.getDataList();
            // this.$set(this.fromData, "name", "");
        },
        computed: {}
    }
</script>

<style scoped>

</style>