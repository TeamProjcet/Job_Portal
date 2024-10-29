<template>
    <div class="message-table">
        <h2>Messages</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Seeker Name</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(group) in groupedMessages" :key="group[0].sender.id">
                <td class="d-flex align-items-center">
                    <div class="image-container">
                        <img :src="storageImage(group[0].sender.image)" alt="image"/>
                    </div>
                    <p class="sender-name">{{ group[0].sender ? group[0].sender.name : 'Unknown' }}</p>
                </td>
                <td>
                    <div>{{ group[group.length - 1].message_content }}</div>
                </td>
                <td>
                    <router-link
                            v-if="can('messages.getMessagesByReceiver')"
                            :to="{ name: 'MessageComponent', params: { id: group[0].sender ? group[0].sender.id : null } }"
                            class="btn btn-dark text-white">
                        Reply
                    </router-link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                messages: [],
            };
        },
        computed: {
            groupedMessages() {
                if (!Array.isArray(this.messages) || this.messages.length === 0) {
                    return []; // Ensure messages is an array
                }

                const groups = {};
                this.messages.forEach(msg => {
                    if (msg.sender) {
                        const senderId = msg.sender.id;
                        if (!groups[senderId]) {
                            groups[senderId] = [];
                        }
                        groups[senderId].push(msg);
                    }
                });
                return Object.values(groups);
            },
        },

        mounted() {
            this.fetchMessages();
        },
        methods: {
            fetchMessages() {
                axios.get('/api/messages')
                    .then(response => {
                        this.messages = Array.isArray(response.data.result) ? response.data.result : [];
                    })
                    .catch(error => {
                        console.error("There was an error fetching messages!", error);
                        this.messages = [];
                    });
            },
        },
    };
</script>

<style scoped>
    .message-table {
        margin: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table td a {
        color: #007bff;
        text-decoration: none;
    }
     .d-flex {
         display: flex;
         align-items: center;
         gap: 15px;
     }

    .image-container img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 3px solid #6c757d; /* Border color */
        object-fit: cover;
    }

    .sender-name {
        font-size: 16px;
        font-weight: bold;
        color: #333; /* Text color */
        margin: 0;
    }
</style>

