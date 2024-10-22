<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Stay Updated!</h2>
                <p class="card-text text-center">
                    Subscribe to our newsletter to get the latest job updates and news directly to your inbox.
                </p>
                <form @submit.prevent="sendMessage()">
                    <div class="mb-3">
                        <label class="form-label">Url</label>
                        <input
                                v-model="fromData.Url"
                                type="url"
                                placeholder="Enter The URL"
                                class="form-control"
                                required
                        />
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Details</label>
                        <editor
                                v-model="fromData.details"
                                type="text"
                                placeholder="Enter details for the subscribers"
                                class="form-control"
                                required
                        />
                    </div>
                    <!-- Url Field -->

                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button v-if="can('sendMail.store')" type="submit" class="btn btn-outline-dark w-50">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "SubscribeEmails",
        data() {
            return {
                // details: '',
            };
        },
        methods: {
            async sendMessage() {
                try {
                    await axios.post('/api/sendMail', this.fromData);


                        this.$toast.success(" Submitted Successfully");

                } catch (error) {
                    if (error.response) {
                        this.error = "No found.";
                        this.$toast.error(this.error);
                    } else {
                        this.$toast.error("An unexpected error occurred.");
                    }
                }
            },

        },
    };
</script>

<style scoped>
    /* আপনি এখানে কাস্টম স্টাইল যোগ করতে পারেন */
</style>
