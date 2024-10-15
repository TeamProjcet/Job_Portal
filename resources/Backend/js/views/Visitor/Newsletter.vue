<template>
    <div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
                </div>
                <DataTable :tableHeading="tableHeading">
                    <tr v-for="(data, index) in dataList">
                        <td>{{ index+1 }}</td>
                        <td>{{ data.email }}</td>
                        <td>
                            <a  @click="CategoryDatadelete(data.id)">
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
    import DataTable from "../../Components/DataTable";
    export default {
        name: "Newsletter",
        components: {DataTable},
        data() {
            return {
                tableHeading: ["Sl", "Email", "Action"],
            };
        },
        mounted() {
            this.getDataList();
        },
    }
</script>

<style scoped>

</style>