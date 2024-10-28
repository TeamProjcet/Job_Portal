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
                <td>
                    <p>
                        {{ group[0].sender ? group[0].sender.name : 'Unknown' }}
                    </p>
                </td>
                <td>
                    <div>
                        {{ group[group.length - 1].message_content }}
                    </div>
                </td>
                <td>
                    <router-link :to="{ name: 'MessageComponent', params: { id: group[0].sender ? group[0].sender.id : null } }" class="btn btn-dark text-white">
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
                        this.messages = response.data.result;
                    })
                    .catch(error => {
                        console.error("There was an error fetching messages!", error);
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
</style>
