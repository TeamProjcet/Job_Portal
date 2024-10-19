<template>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
            </div>
            <DataTable :tableHeading="tableHeading">
                <tr v-for="(data, index) in comments" :key="data.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ data.seeker.name }}</td>
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
                postId: this.$route.params.postId,
                comments: [],
            }
        },
        mounted() {
            this.ViewComment()
        },
        methods: {
            async ViewComment() {
                if (!this.postId) {
                    this.error = "Category ID is not defined.";
                    return;
                }
                try {
                    const response = await axios.get(`/api/frontend/jobcate/${this.postId}`);
                    this.comments = response.data.result.blogComment;
                } catch (error) {
                    console.error('Error fetching comments:', error);
                }
            },
        },
    }
</script>

<style scoped>

</style>