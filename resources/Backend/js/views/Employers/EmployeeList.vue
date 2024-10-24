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
                    <td>
                        <img class="w-50 h-50" :src="storageImage(data.employer.image)" alt="image"></td>
                    <td>{{ data.name }}</td>
                    <td>{{ data.email }}</td>
                    <td>{{ data.company.name }}</td>
                    <td>
                        <a :href="data.employer[0] ? data.employer[0].company_website : 'N/A'" target="_blank">
                            <i class="fas fa-globe"></i> View Website
                        </a>
                    </td>
                    <td>{{ data.employer[0] ? data.employer[0].company_address : 'N/A' }}</td>
                    <td>{{ data.employer[0] ? data.employer[0].contact_person : 'N/A' }}</td>
                    <td>{{ data.employer[0] ? data.employer[0].bio : 'N/A' }}</td>


                    <td>
                        <a v-if="can('employer.destroy')"  @click="CategoryDatadelete(data.id, index)">
                            <i class="fas fa-trash-alt" style="color: red;"></i>
                        </a>
                    </td>
                </tr>
            </DataTable>
            </div>
        </div>
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
                tableHeading: ["Sl", "Profile","name",  "Email", "Company Name", "company_website",  "company_address",  "contact_person",  "Bio",   "Action"],

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