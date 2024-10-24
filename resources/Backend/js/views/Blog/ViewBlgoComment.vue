<template>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
            </div>
            <DataTable :tableHeading="tableHeading">
                <tr v-for="(data, index) in comments.data" :key="data.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ data.seeker.name }}</td>
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
                        :data="comments"
                        @paginateTo="ViewComment"
                ></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    import DataTable from "../../Components/DataTable";
    import axios from 'axios';

    export default {
        name: "ViewBlgoComment",
        components: {
            DataTable
        },
        data() {
            return {
                tableHeading: ['#', 'User', 'Comment', 'Actions'],
                postId: this.$route.params.id,
                comments: [],
                currentPage: 1,
                totalPages: 0,
            }
        },
        mounted() {
            this.ViewComment()
        },
        methods: {
            async ViewComment(page = 1) {
                if (!this.postId) {
                    this.error = "Category ID is not defined.";
                    return;
                }
                try {
                    const response = await axios.get(`/api/blogcomment/${this.postId}?page=${page}`);
                    this.comments = response.data.result;
                } catch (error) {
                    console.error('Error fetching comments:', error);
                }
            },
        },
    }
</script>

<style scoped>

</style>