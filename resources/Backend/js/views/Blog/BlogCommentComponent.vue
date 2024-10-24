<template>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
            </div>
            <DataTable :tableHeading="tableHeading">
                    <tr v-for="(data, index) in dataList.data" :key="data.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ data.seekerName }}</td>
                        <td>{{ data.comments }}</td>
                        <td>
                            <a v-if="can('blogcomment.destroy')" @click="CategoryDatadelete(data.id, index)">
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
</template>

<script>
    import PageTop from "../../Components/PageTop";
    import DataTable from "../../Components/DataTable";
    import FormModal from "../../Components/FormModal";

    export default {
        name: "BlogCommentComponent",
        components: {
            FormModal, DataTable, PageTop
        },
        data() {
            return {
                commentShow: {},
                tableHeading: ['#', 'User', 'Comment', 'Actions'],
                currentPage: 1,
                totalPages: 0,
            };
        },
        mounted(){
            this.getDataList();
        },

        methods: {


        }
    }
</script>

<style scoped>
    /* Add any scoped styles here */
</style>
