<template>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
            </div>
            <DataTable :tableHeading="tableHeading">
                    <tr v-for="(data, index) in dataList" :key="data.id">
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
                tableHeading: ['#', 'User', 'Comment', 'Actions']
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
