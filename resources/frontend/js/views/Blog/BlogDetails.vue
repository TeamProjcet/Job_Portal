<template>

    <div class="container-xxl py-5 shadow p-4 rounded">
        <header class="mb-4">
            <h1>{{post.title}}</h1>
            <p class="text-muted">
                Published on {{ formatDate(post.created_at) }}
                by Author {{ post.company ? post.company.name : 'Unknown' }}
            </p>
        </header>

        <article>
            <img style="height: 500px" :src="storageImage(post.image)" class="img-fluid w-75" alt="Blog post image">
            <div class="mt-3">
                <p v-html="post.description"></p>
            </div>
        </article>


        <footer class="mt-5">

            <!-- Share Section -->
            <div class="mb-4">
                <h4>Share this post:</h4>
                <a href="#" class="btn btn-outline-primary me-2">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="#" class="btn btn-outline-info me-2">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
                <a href="#" class="btn btn-outline-danger me-2">
                    <i class="fab fa-google-plus-g"></i> Google+
                </a>
                <a href="#" class="btn btn-outline-success me-2">
                    <i class="fab fa-linkedin-in"></i> LinkedIn
                </a>
            </div>
            <h4 class="text-muted ">Views: {{ post.view_count }}</h4>
            <div class="row col-md-6 mt-5">
                <h4>Comments</h4>
                <div v-for="comm in comment">
                    <div class="card mb-3">
                        <div class="card-body d-flex align-items-start">
                            <img :src="storageImage(comm.seeker.image)" alt="User Avatar" class="rounded-circle" style="width: 50px; height: 50px; margin-right: 15px;">
                            <div>
                                <h5 class="card-title">{{comm.seeker.name}}</h5>
                                <p class="card-text">{{comm.comments}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <h3>Leave a Comment</h3>
            <div class="row col-md-9" v-if="isAuthenticated">
                <form @submit.prevent="blogComment()">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" v-model="fromData.name" class="form-control" id="name" readonly>
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" v-model="fromData.email" class="form-control" id="email" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea class="form-control" v-model="fromData.comments" id="comment" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div v-else class="row col-md-6">
                <router-link to="/seekerlogin" class="nav-link">
                    <button class="btn btn-primary w-100">{{$t('comment')}}</button>
                </router-link>
            </div>
        </footer>
    </div>

</template>

<script>
    import axios from 'axios';
    export default {
        name: "BlogDetails",
        props: ['id'],
        data() {
            return {
                post: {},
                comment: {},
                isAuthenticated:false,
                error: null,
            };
        },
        mounted() {
            this.getPostDetails();
            this.authData();

        },

        methods: {
            async getPostDetails() {
                try {
                    const response = await axios.get(`/api/frontend/blogDetails/${this.id}`);

                    if (response.data && response.data.result) {
                        this.post = response.data.result.post;
                        this.comment = response.data.result.blogComment;
                    } else {
                        this.error = "No blog details found.";
                    }
                } catch (error) {
                    this.error = "Failed to load blog details.";
                }
            },

            async blogComment() {
                this.fromData.blog_id = this.post.id;
                try {
                    const response = await axios.post('/api/blogcomment', this.fromData);
                    if (parseInt(response.data.status) === 2000) {
                        this.$toast.success("Comment Submited successfully");
                    } else {
                        this.$toast.error("Comment Submited  failed!");
                    }
                } catch (error) {
                    console.error("Error submitting Comment:", error);
                    this.$toast.error("Comment submission failed!");
                }
            }
        }
    }
</script>

<style scoped>

</style>


