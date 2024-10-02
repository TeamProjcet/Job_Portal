<template>
    <div class="container-xxl py-5">
        <header class="mb-4">
            <h1>{{post.title}}</h1>
            <p class="text-muted">Published on {{formattedDate}} by Author Name</p>
        </header>

        <article>
            <img style="height: 500px" :src="storageImage(post.image)" class="img-fluid w-75" alt="Blog post image">
            <div class="mt-2">
                <p>{{post.description}}</p>
            </div>
        </article>

        <footer class="mt-5">
            <h3>Leave a Comment</h3>
            <div v-if="isAuthenticated">
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
            <div v-else>
                <router-link to="/seekerlogin" class="nav-link">
                    <button class="btn btn-primary w-100">Login</button>
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
                isAuthenticated:false,
                error: null // To store any error messages
            };
        },
        mounted() {
            this.getPostDetails();
            this.checkAuthentication();

        },
        computed: {
            formattedDate() {
                if (this.post.updated_at) {
                    const options = { year: 'numeric', month: 'long', day: 'numeric' };
                    return new Date(this.post.updated_at).toLocaleDateString(undefined, options);
                }
                return 'Date not available';
            },
        },
        methods: {
            async getPostDetails() {
                try {
                    const response = await axios.get(`/api/blogpost/${this.id}`);
                    console.log("Full API Response:", response);

                    if (response.data && response.data.result) {
                        this.post = response.data.result; // Assign the result to post
                    } else {
                        this.error = "No blog details found."; // Set new error message
                    }
                } catch (error) {
                    console.error("Error fetching blog details:", error.response ? error.response.data : error.message);
                    this.error = "Failed to load blog details."; // Set error message
                }
            }
        }
    }
</script>

<style scoped>

</style>


