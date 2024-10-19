<template>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
            </div>
            <DataTable :tableHeading="tableHeading">
                    <tr v-for="(data, index) in commentShow" :key="data.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ data.seekerName }}</td>
                        <td>{{ data.comments }}</td>
                        <td>
                            <a @click="CategoryDatadelete(data.id, index)">
                                <i class="fas fa-trash-alt" style="color: red;"></i>
                            </a>
                        </td>
                    </tr>
            </DataTable>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
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
            this.blogCommentShow()
        },

        methods: {
            async blogCommentShow() {
                try {
                    const response = await axios.get(`/api/blogcomment`);

                    if (response.data && response.data.result) {
                        this.commentShow = response.data.result.map(comment => ({
                            id: comment.id,
                            comments: comment.comments,
                            seekerName: comment.seeker.name,
                        }));
                    } else {
                        this.error = "No blog details found.";
                    }
                } catch (error) {
                    this.error = "Failed to load blog details.";
                }
            },


        }
    }
</script>

<style scoped>
    /* Add any scoped styles here */
</style>
