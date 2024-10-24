<template>
    <div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
                </div>
                <DataTable :tableHeading="tableHeading">
                    <tr v-for="(data, index) in dataList.data">
                        <td>{{ index+1 }}</td>
                        <td>{{ data.email }}</td>
                        <td>
                            <a v-if="can('newsletter.destroy')" @click="CategoryDatadelete(data.id)">
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
                currentPage: 1,
                totalPages: 0,
            };
        },
        mounted() {
            this.getDataList();
        },
    }
</script>

<style scoped>

</style>