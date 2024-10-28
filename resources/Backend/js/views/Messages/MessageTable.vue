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
            <tr v-for="message in messages" :key="message.id">
                <td>
                    <a @click="openMessenger(message.sender.id)">
                        {{ message.sender.name || 'Unknown' }} <!-- সিকার নাম দেখাতে হবে -->
                    </a>
                </td>
                <td>{{ message.message_content }}</td>
                <td>
                    <button @click="openMessenger(message.sender.id)" class="btn btn-primary">
                        Reply
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                messages: [],
            };
        },
        mounted() {
            this.fetchMessages();
        },
        methods: {
            fetchMessages() {
                // API থেকে মেসেজগুলি ফেচ করুন
                axios.get('/api/messages')
                    .then(response => {
                        this.messages = response.data.data; // এখানে ডেটা সেট করুন
                    })
                    .catch(error => {
                        console.error("There was an error fetching messages!", error);
                    });
            },
            openMessenger(seekerId) {
                // মেসেজিং পেজে নিয়ে যান
                this.$router.push({ name: 'Messenger', params: { seekerId: seekerId } });
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
