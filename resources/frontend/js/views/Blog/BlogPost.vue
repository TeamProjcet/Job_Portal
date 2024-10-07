<template>
    <div class="container-xxl py-5">
        <div class="row">
            <div class="col-md-4" v-for="post in blog_filter" :key="post.id">
                <div class="card mb-4">
                    <img
                            style="height: 200px"
                            :src="storageImage(post.image)"
                            class="card-img-top"
                            alt="Blog Post Image"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">{{ post.description }}</p>
                        <div class="d-flex  justify-content-between">
                            <router-link
                                :to="{ name: 'Blog-Details', params: { id: post.id } }"
                                class="btn btn-primary"
                        >
                            Read More
                        </router-link>
                            <div class="fw-bold ">
                                <p class="">Author:{{post.user.name}}</p></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div v-if="error" class="alert alert-danger">{{ error }}</div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "BlogPost",

        data() {
            return {
                blogpost: [],
                error: null,
            };
        },

        computed: {
            blog_filter() {
                return this.blogpost.filter(post => post.status === 1); // status active on post show
            },
        },

        mounted() {
            this.getPosts();
        },

        methods: {
            async getPosts() {
                try {
                    const response = await axios.get('/api/blogpost');
                    if (response.data && response.data.result) {
                        this.blogpost = response.data.result;
                    } else {
                        throw new Error("Unexpected response format");
                    }
                } catch (error) {
                    // console.error("Error fetching blog data:", error);
                    this.error = "Error fetching blog data. Please try again later.";
                }
            },
        },

    };
</script>

<style scoped>
    /* Add your styles here if needed */
</style>
