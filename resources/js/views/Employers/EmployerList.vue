<template>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <PageTop></PageTop>
            </div>
            <div class="table-responsive">
            <DataTable :tableHeading="tableHeading">

                <tr >
                    <td>1</td>
                    <td>Mohon</td>
                    <td>Mohon</td>
                    <td>Mohon</td>
                    <td>Mohon</td>
                    <td>Mohon</td>
                    <td>Mohon</td>
                    <td>tmss</td>

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

        <!--        slot-->
        <FormModal @submit.prevent="submitFromData(fromData)">

            <div class="mb-3">
                <label  class="form-label">User ID</label>
                <input type="number" class="form-control" v-model="fromData.user_id" placeholder="Enter User ID" />
            </div>

            <div class="mb-3">
                <label class="form-label">Company Name</label>
                <input type="text" class="form-control" v-model="fromData.company_name" placeholder="Enter Company Name" />
            </div>

            <!-- Company Website -->
            <div class="mb-3">
                <label  class="form-label">Company Website</label>
                <input type="url" class="form-control" v-model="fromData.company_website" placeholder="Enter Company Website" />
            </div>

            <!-- Company Address -->
            <div class="mb-3">
                <label  class="form-label">Company Address</label>
                <input type="text" class="form-control" v-model="fromData.company_address" placeholder="Enter Company Address" />
            </div>

            <!-- Contact Person -->
            <div class="mb-3">
                <label  class="form-label">Contact Person</label>
                <input type="text" class="form-control" v-model="fromData.contact_person" placeholder="Enter Contact Person Name" />
            </div>

            <!-- Industry -->
            <div class="mb-3">
                <label  class="form-label">Industry</label>
                <input type="text" class="form-control" v-model="fromData.industry" placeholder="Enter Industry" />
            </div>

            <!-- Company Description -->
            <div class="mb-3">
                <label  class="form-label">Company Description</label>
                <textarea class="form-control" v-model="fromData.company_description" rows="3" placeholder="Enter Company Description"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </FormModal>


    </div>

</template>

<script>
    import FormModal from "../../Components/FormModal";
    import DataTable from "../../Components/DataTable";
    import PageTop from "../../Components/PageTop";
    export default {
        name: "EmployerForm",
        components: {PageTop, DataTable, FormModal},
        data() {
            return {
                tableHeading: ["Sl", "Author ","Company Name", " Website", " Address", "Contact ","Industry"," Description", "Action"],

            };
        },
        methods: {
        },
    };
</script>

<style scoped>
</style>

