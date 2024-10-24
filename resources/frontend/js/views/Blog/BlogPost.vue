
<template>
    <div class="container mt-4 shadow p-4 rounded">
        <div class="row">
            <h3 class="d-flex justify-content-center my-4">
                <span class="badge bg-primary py-3 px-3 container-fluid">
                    {{$t("blog_Article")}}
                </span>
            </h3>
            <template v-if="dataList.blogpost !== undefined">
            <div class="col-md-4"  v-for="post in dataList.blogpost.data" :key="post.id">
                <div class="card mb-4">
                    <img
                            style="height: 200px"
                            :src="storageImage(post.image)"
                            class="card-img-top"
                            alt="Blog Post Image"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ truncateString(post.title, 50) }}</h5>
                        <p class="card-text font">{{ truncateString(post.description, 180) }}</p>
                        <div class="d-flex justify-content-between">
                            <router-link
                                    :to="{ name: 'Blog-Details', params: { id: post.id } }"
                                    class="btn btn-primary"
                            >
                                {{$t("read_more")}}
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            </template>

        </div>
        <div v-if="error" class="alert alert-danger">{{ error }}</div>

        <div class="col-12 d-flex justify-content-center" v-if="dataList.blogpost !== undefined">
            <pagination
                    previousText="PREV"
                    nextText="NEXT"
                    :totalPages="totalPages"
                    :currentPage="currentPage"
                    :data="dataList.blogpost"
                    @paginateTo="getDataList"
            ></pagination>
        </div>
    </div>
</template>

<script>
    import Pagination from "../../plugins/pagination/pagination";
    export default {
        name: "BlogPost",
        components: { Pagination },
        data() {
            return {
                blogpost: [],
                currentPage: 1,
                totalPages: 0,
                error: null,
            };
        },
        mounted() {
            this.getDataList();
        },
        methods: {


        },
    };
</script>

<style scoped>

</style>
