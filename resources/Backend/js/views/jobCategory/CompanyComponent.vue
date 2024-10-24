<template>
    <div>
        <div class="row">
        <div class="card">
            <div class="card-header">
                <PageTop :storePermission="can('company.store')"/>
            </div>
            <DataTable :tableHeading="tableHeading">
                <tr v-for="(data, index) in dataList.data">
                    <td>{{index + 1}}</td>
                    <td>{{data.name}}</td>
                    <td>
                        <a v-if="can('company.edit')" @click="openEditModal(data , data.id)">
                            <i class="fas fa-edit" style="color: blue;"></i>
                        </a>
                        <a v-if="can('company.destroy')" @click="CategoryDatadelete(data.id, index)">
                            <i class="fas fa-trash-alt" style="color: red;"></i>
                        </a>
                    </td>
                </tr>
            </DataTable>
            <div class="col-12 d-flex justify-content-lg-start">
                <pagination
                        previousText="PREV"
                        nextText="NEXT"
                        :totalPages="totalPages"
                        :currentPage="currentPage"
                        :data="dataList"
                        @paginateTo="getDataList"
                ></pagination>
            </div>
        </div>
        <FormModal @submit="submitFromData(fromData)">
            <div class="row">
                <div class="col-md-12">
                    <label>Company Name</label>

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
    </div>
</template>

<script>
    import PageTop from "../../Components/PageTop";
    import DataTable from "../../Components/DataTable";
    import FormModal from "../../Components/FormModal";
    import Pagination from "../../plugins/pagination/pagination";

    export default {
        name: "CompanyComponent",
        components: {FormModal, DataTable, PageTop, Pagination},
        data() {
            return {
                tableHeading: ["Sl", "name", "Action"],
                currentPage: 1,
                totalPages: 0,
            };
        },
        mounted() {
            this.getDataList();
        }
    }
</script>

<style scoped>

</style>