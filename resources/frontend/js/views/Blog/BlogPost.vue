<template>
    <div class="container mt-4 shadow p-4 rounded">
        <div class="row">
            <h3 class="d-flex justify-content-center my-4" >

                    <span class="badge bg-primary  py-3 px-3 container-fluid">
                 Blog & Article
                   </span>
            </h3>
            <div class="col-md-4" v-for="post in dataList.blogpost" :key="post.id">
                <div class="card mb-4">
                    <img
                            style="height: 200px"
                            :src="storageImage(post.image)"
                            class="card-img-top"
                            alt="Blog Post Image"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ truncateString(post.title, 50) }}</h5>
                        <p class="card-text font">{{truncateString(post.description, 180)}}</p>
                        <div class="d-flex  justify-content-between">
                            <router-link
                                :to="{ name: 'Blog-Details', params: { id: post.id } }"
                                class="btn btn-primary"
                        >
                            Read More
                        </router-link>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div v-if="error" class="alert alert-danger">{{ error }}</div>
    </div>
</template>

<script>


    export default {
        name: "BlogPost",

        data() {
            return {
                blogpost: [],
                error: null,
            };
        },

        computed: {

        },

        mounted() {
            this.getDataList();
        },

        methods: {
            truncateString(str, length) {
                if (str) {
                    const tempElement = document.createElement('div');
                    tempElement.innerHTML = str;
                    const plainText = tempElement.textContent || tempElement.innerText || '';

                    if (plainText.length > length) {
                        return plainText.substring(0, length) + '...';
                    }
                    return plainText;
                }
                return '';
            },

        },

    };
</script>

<style scoped>

</style>
