<!--<template>-->
<!--    <div class="container mt-5">-->
<!--        <div class="card shadow-sm">-->
<!--            <div class="card-header bg-success text-white">-->
<!--                <h3 class="mb-0">Messages</h3>-->
<!--            </div>-->
<!--            <div class="card-body message-container">-->
<!--                &lt;!&ndash; Messages list &ndash;&gt;-->
<!--                <div-->
<!--                        v-for="msg in messages"-->
<!--                        :key="msg.id"-->
<!--                        :class="{-->
<!--                        'message-item mb-3 p-3 border rounded': true,-->
<!--                        'text-right ml-auto': msg.sender?.id === currentUserId,-->
<!--                        'mr-auto': msg.sender?.id !== currentUserId-->
<!--                    }"-->
<!--                >-->
<!--                    <p class="mb-1"><strong>{{ msg.sender?.name || 'Unknown' }}:</strong></p>-->
<!--                    <div class="message-content">{{ msg.message_content }}</div>-->
<!--                    <button-->
<!--                            class="btn btn-danger btn-sm mt-1"-->
<!--                            @click="deleteMessage(msg.id)"-->
<!--                            v-if="msg.sender?.id === currentUserId"-->
<!--                    >-->
<!--                        Delete-->
<!--                    </button>-->

<!--                    &lt;!&ndash; Replies &ndash;&gt;-->
<!--                    <div v-if="msg.replies && msg.replies.length > 0" class="mt-2">-->
<!--                        <div-->
<!--                                v-for="reply in msg.replies"-->
<!--                                :key="reply.id"-->
<!--                                :class="{-->
<!--                                'reply-item border rounded p-2 mb-2': true,-->
<!--                                'bg-light mr-auto': reply.sender?.id !== currentUserId,-->
<!--                                'text-right ml-auto': reply.sender?.id === currentUserId-->
<!--                            }"-->
<!--                        >-->
<!--                            <p class="mb-1"><strong>{{ reply.sender?.name || 'Unknown' }}:</strong></p>-->
<!--                            <div class="message-content">{{ reply.message_content }}</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; Message input &ndash;&gt;-->
<!--            <div class="card-footer">-->
<!--                <form @submit.prevent="sendMessage">-->
<!--                    <div class="form-group">-->
<!--                        <textarea-->
<!--                                v-model="newMessage"-->
<!--                                placeholder="Write your message..."-->
<!--                                class="form-control"-->
<!--                                rows="3"-->
<!--                        ></textarea>-->
<!--                    </div>-->
<!--                    <button type="submit" class="btn btn-primary mt-2 float-right">Send</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->


<!--<script>-->
<!--    import axios from "axios";-->

<!--    export default {-->
<!--        data() {-->
<!--            return {-->
<!--                messages: [],-->
<!--                newMessage: '',-->
<!--                currentUserId: 1-->
<!--            };-->
<!--        },-->
<!--        created() {-->
<!--            this.fetchMessages();-->
<!--            // this.fetchCurrentUser();-->
<!--        },-->
<!--        methods: {-->
<!--            // async fetchCurrentUser() {-->
<!--            //     try {-->
<!--            //         const response = await axios.get('/userAuth');-->
<!--            //         this.currentUserId = response.data.id;-->
<!--            //     } catch (error) {-->
<!--            //         console.error("Error fetching current user:", error);-->
<!--            //     }-->
<!--            // },-->
<!--            async fetchMessages() {-->
<!--                try {-->
<!--                    const response = await axios.get('/api/messages');-->
<!--                    this.messages=response.data.result-->

<!--                } catch (error) {-->
<!--                    console.error("Error fetching messages:", error);-->
<!--                }-->
<!--            },-->
<!--            async sendMessage() {-->
<!--                try {-->
<!--                    const response = await axios.post('/api/messages', {-->
<!--                        receiver_id: 1,  // Adjust according to your logic-->
<!--                        message_content: this.newMessage,-->
<!--                    });-->
<!--                    // Update messages after sending-->
<!--                    this.messages.unshift(response.data.data);-->
<!--                    this.newMessage = '';-->
<!--                } catch (error) {-->
<!--                    console.error("Error sending message:", error);-->
<!--                }-->
<!--            }-->
<!--        }-->
<!--    };-->
<!--</script>-->


<!--<style scoped>-->
<!--    .message-container {-->
<!--        max-height: 400px;-->
<!--        overflow-y: auto;-->
<!--        background-color: rgba(240, 240, 240, 0.9);-->
<!--        padding: 20px;-->
<!--        border-radius: 5px;-->
<!--    }-->

<!--    .message-item {-->
<!--        max-width: 75%;-->
<!--    }-->

<!--    .text-right {-->
<!--        text-align: right;-->
<!--    }-->

<!--    .ml-auto {-->
<!--        margin-left: auto; /* Your sent message */-->
<!--    }-->

<!--    .mr-auto {-->
<!--        margin-right: auto; /* Your received message */-->
<!--    }-->
<!--</style>-->




<template>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0">Messages</h3>
            </div>
            <div class="card-body message-container">
                <!-- Messages list -->
                <div
                        v-for="msg in messages"
                        :key="msg.id"
                        :class="{
                        'message-item mb-3 p-3 border rounded': true,
                        'text-right ml-auto': msg.sender?.id === currentUserId,
                        'mr-auto': msg.sender?.id !== currentUserId
                    }"
                >
                    <p class="mb-1"><strong>{{ msg.sender?.name || 'Unknown' }}:</strong></p>
                    <div class="message-content">{{ msg.message_content }}</div>
                    <button
                            class="btn btn-danger btn-sm mt-1"
                            @click="deleteMessage(msg.id)"
                            v-if="msg.sender?.id === currentUserId"
                    >
                        Delete
                    </button>

                    <!-- Replies -->
                    <div v-if="msg.replies && msg.replies.length > 0" class="mt-2">
                        <div
                                v-for="reply in msg.replies"
                                :key="reply.id"
                                :class="{
                                'reply-item border rounded p-2 mb-2': true,
                                'bg-light mr-auto': reply.sender?.id !== currentUserId,
                                'text-right ml-auto': reply.sender?.id === currentUserId
                            }"
                        >
                            <p class="mb-1"><strong>{{ reply.sender?.name || 'Unknown' }}:</strong></p>
                            <div class="message-content">{{ reply.message_content }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Message input -->
            <div class="card-footer">
                <form @submit.prevent="sendMessage">
                    <div class="form-group">
                        <textarea
                                v-model="newMessage"
                                placeholder="Write your message..."
                                class="form-control"
                                rows="3"
                        ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 float-right">Send</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                messages: [],
                newMessage: '',
                UserId: [],
                currentUserId: null
            };
        },
        created() {
            this.fetchCurrentUser();
            this.fetchMessages();
        },
        methods: {
            async fetchCurrentUser() {
                try {
                    const response = await axios.get('/userAuth');
                    this.UserId = response.data.result;
                    this.currentUserId=this.UserId.id;
                } catch (error) {
                    console.error("Error fetching current user:", error);
                }
            },
            async fetchMessages() {
                try {
                    const response = await axios.get('/api/messages');
                    this.messages = response.data.result;
                } catch (error) {
                    console.error("Error fetching messages:", error);
                }
            },

            async sendMessage() {
                try {
                    const response = await axios.post('/api/messages', {
                        receiver_id: 1,
                        message_content: this.newMessage,
                        // sender_id: this.currentUserId
                    });
                    this.messages.unshift(response.data.data);
                    this.newMessage = '';
                    this.fetchMessages();
                 } catch (error) {
                    console.error("Error sending message:", error);
                }
            },
            async deleteMessage(messageId) {
                try {
                    await axios.delete(`/api/messages/${messageId}`); // Delete request to your API
                    this.messages = this.messages.filter(msg => msg.id !== messageId); // Remove the message from the list
                } catch (error) {
                    console.error("Error deleting message:", error);
                }
            }
        }
    };
</script>

<style scoped>
    .message-container {
        max-height: 400px;
        overflow-y: auto;
        background-color: rgba(240, 240, 240, 0.9);
        padding: 20px;
        border-radius: 5px;
    }

    .message-item {
        max-width: 75%;
    }

    .text-right {
        text-align: right;
    }

    .ml-auto {
        margin-left: auto; /* Your sent message */
    }

    .mr-auto {
        margin-right: auto; /* Your received message */
    }
</style>









