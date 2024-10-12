<template>

    <div class="row">
        <div class="card">
            <div class="card-header">
                <div>
                    <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
                </div>
            </div>
            <div class="table-responsive">
            <DataTable :tableHeading="tableHeading">
                <tr v-for="(data, index) in dataList" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ data.company_name }}</td>
                    <td>{{ data.company_website }}</td>
                    <td>{{ data.company_website }}</td>
                    <td>{{ data.contact_person }}</td>
                    <td>{{ data.industry }}</td>
                    <td>{{ data.company_description }}</td>
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
        </div>
        <FormModal @submit="submitFromData(fromData)">
            <div >
                <label>Company Name:</label>
                <input class="form-control" v-model="fromData.company_name" type="text" required />
            </div>
            <div>
                <label>Company Website:</label>
                <input class="form-control" v-model="fromData.company_website" type="text" />
            </div>
            <div>
                <label>Company Address:</label>
                <input class="form-control" v-model="fromData.company_address" type="text" required />
            </div>
            <div>
                <label>Contact Person:</label>
                <input class="form-control" v-model="fromData.contact_person" type="text" required />
            </div>
            <div>
                <label>Industry:</label>
                <input class="form-control" v-model="fromData.industry" type="text" required />
            </div>
            <div>
                <label>Company Description:</label>
                <textarea class="form-control" v-model="fromData.company_description"></textarea>
            </div>

        </FormModal>
    </div>
</template>

<script>
    import PageTop from "../../Components/PageTop";
    import FormModal from "../../Components/FormModal";
    import DataTable from "../../Components/DataTable";
    export default {
        name: "EmployerForm",
        components: {DataTable, FormModal, PageTop},
        data() {
            return {
                tableHeading: ["Sl", "name",  "company_website",  "company_address",  "contact_person",  "industry",  "company_description",   "Action"],

            };
        },
        mounted() {
            this.getDataList();
            // this.$set(this.fromData, "name", "");
        },

    }
</script>

<style scoped>

</style>