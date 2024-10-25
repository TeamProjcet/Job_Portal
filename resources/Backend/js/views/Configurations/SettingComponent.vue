<template>
    <div class="container mt-5">
        <h1 class="mb-4">Settings</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="setting in settings" :key="setting.id">
                <td>{{ setting.key }}</td>
                <td>{{ setting.value }}</td>
                <td>
                    <button class="btn btn-primary btn-sm" @click="editSetting(setting.id)">Edit</button>
                    <button class="btn btn-danger btn-sm" @click="deleteSetting(setting.id)">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
        <button class="btn btn-success" @click="showAddSettingModal">Add Setting</button>

        <!-- Add Setting Modal -->
        <div class="modal fade" id="addSettingModal" tabindex="-1" role="dialog" aria-labelledby="addSettingModalLabel" aria-hidden="true" v-if="isModalOpen">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSettingModalLabel">Add Setting</h5>
                        <button type="button" class="close" @click="isModalOpen = false" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="settingKey">Key</label>
                            <input type="text" class="form-control" v-model="newSetting.key" placeholder="Key" />
                        </div>
                        <div class="form-group">
                            <label for="settingValue">Value</label>
                            <input type="text" class="form-control" v-model="newSetting.value" placeholder="Value" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="isModalOpen = false">Close</button>
                        <button type="button" class="btn btn-primary" @click="saveSetting">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                settings: [
                    { id: 1, key: 'QUEUE_CONNECTION', value: 'database' },
                    { id: 2, key: 'APP_NAME', value: 'Job Portal' },
                    { id: 3, key: 'MAIL_MAILER', value: 'smtp' },
                    { id: 4, key: 'MAIL_HOST', value: 'smtp.gmail.com' },
                    { id: 5, key: 'MAIL_PORT', value: '587' },
                    { id: 6, key: 'MAIL_USERNAME', value: 'example@gmail.com' },
                ],
                newSetting: { key: '', value: '' },
                isModalOpen: false,
            };
        },
        methods: {
            showAddSettingModal() {
                this.isModalOpen = true;
            },
            saveSetting() {
                if (this.newSetting.key && this.newSetting.value) {
                    // Generate a new ID for the new setting
                    const newId = this.settings.length ? this.settings[this.settings.length - 1].id + 1 : 1;
                    this.settings.push({ id: newId, ...this.newSetting });
                    this.isModalOpen = false;
                    this.newSetting = { key: '', value: '' }; // Reset input fields
                } else {
                    alert('Both key and value are required!');
                }
            },
            editSetting(id) {
                // Logic for editing a setting can be added here
                alert(`Editing setting with ID: ${id}`);
            },
            deleteSetting(id) {
                this.settings = this.settings.filter(setting => setting.id !== id);
            },
        },
    };
</script>

<style>
    /* যদি প্রয়োজন হয় তবে কিছু কাস্টম স্টাইল যোগ করুন */
</style>
