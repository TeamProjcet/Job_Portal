<template>
    <div class="container mt-5" style="width: 900px">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h3 class="mb-0">Messages</h3>
            </div>
            <div class="card-body message-container">
                <div
                        v-for="msg in messages"
                        :key="msg.id"
                        class="message-item mb-3 p-3 border rounded position-relative"
                        :class="msg.sender && msg.sender.id === currentUserId ? 'sent-message bg-secondary text-white ml-auto' : 'received-message  text-dark mr-auto'"
                >
                    <p class="mb-1"><strong>{{ msg.sender ? msg.sender.name : 'Unknown' }}</strong></p>
                    <div class="message-content">{{ msg.message_content }}</div>
                    <button
                            v-if="msg.sender && msg.sender.id === currentUserId"
                            class="delete-btn btn btn-danger btn-sm position-absolute"
                            style="top: 10px; right: 10px;"
                            @click="deleteMessage(msg.id)"
                            title="Delete Message"
                    >
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>

            <div class="card-footer">
                <form @submit.prevent="sendMessage">
                    <div class="d-flex justify-content-center align-items-end">
                        <div class="form-group flex-grow-1 mr-2" style="max-width: 700px;">
                            <textarea v-model="newMessage" placeholder="Write your message..." class="form-control" rows="2" required></textarea>
                        </div>
                        <div style="margin: 20px;">
                            <button type="submit" class="btn btn-dark"><i class="fas fa-paper-plane"></i>Send</button>
                        </div>
                    </div>
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
                currentUserId: this.getCurrentUserId(),
                receiverId: this.$route.params.id
            };
        },
        created() {
            this.fetchMessages();
        },
        methods: {
            getCurrentUserId() {
                return 2;
            },
            async fetchMessages() {
                try {
                    const id = this.$route.params.id;
                    const response = await axios.get(`/api/messagessend/${id}`);
                    this.messages = response.data.result;
                } catch (error) {
                    console.error("Error fetching messages:", error);
                }
            },
            async sendMessage() {
                try {
                    const response = await axios.post('/api/messages', {
                        receiver_id: this.receiverId,
                        message_content: this.newMessage,
                        sender_id: this.currentUserId, // Include sender ID if needed in the backend
                    });
                    this.newMessage = '';
                    this.fetchMessages();
                } catch (error) {
                    console.error("Error sending message:", error);
                }
            },
            async deleteMessage(messageId) {
                try {
                    await axios.delete(`/api/messages/${messageId}`);
                    this.messages = this.messages.filter(msg => msg.id !== messageId);
                } catch (error) {
                    console.error("Error deleting message:", error);
                }
            }
        }
    };
</script>

<style scoped>
    .message-container {
        max-height: 700px;
        overflow-y: auto;
        background-color: rgba(240, 240, 240, 0.9);
        padding: 20px;
        border-radius: 5px;
    }

    .message-item {
        max-width: 75%;
    }
    .received-message {
        background-color: #F1E4C3;
    }

    .text-left {
        text-align: left;
    }

    .textright {
        text-align: right;
    }

    .ml-auto {
        margin-left: auto;
    }

    .mr-auto {
        margin-right: auto;
    }
</style>
