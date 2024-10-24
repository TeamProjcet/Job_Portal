<template>
    <div>
        <h1>Settings</h1>
        <table>
            <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr >
                <td>setting</td>
                <td>setting</td>
<!--                <td>{{ setting.key }}</td>-->
<!--                <td>{{ setting.value }}</td>-->
                <td>
                    <button @click="editSetting(setting.id)">Edit</button>
                    <button @click="deleteSetting(setting.id)">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
        <button @click="showAddSettingModal">Add Setting</button>
        <div v-if="isModalOpen">
            <h2>Add Setting</h2>
            <input v-model="newSetting.key" placeholder="Key" />
            <input v-model="newSetting.value" placeholder="Value" />
            <button @click="saveSetting">Save</button>
            <button @click="isModalOpen = false">Close</button>
        </div>
    </div>
</template>
<script>
    export default {
        name: "SettingComponent"
    }
</script>

<style scoped>

</style>