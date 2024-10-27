<template>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Settings Management</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="(value, key) in settingvalue" :key="key">
                    <td>{{ key }}</td>
                    <td @dblclick="editField(key, value)" class="editable-field">
                        <span v-if="!isEditing[key] && key !== 'softlogo'">{{ value }}</span>

                        <!-- Check if the field is an image -->
                        <template v-if="key === 'softlogo'">
                            <div class="mb-3">
                                <label class="form-label">Upload Logo</label>
                                <div
                                        @click="clickFileField('softlogoField')"
                                        class="image_upload"
                                        :style="{ 'background-image': settingvalue.softlogo ? 'url(' + storageImage(settingvalue.softlogo) + ')' : 'url(' + publicImage('images/uploading.avif') + ')' }">
                                </div>
                                <input v-if="isEditing[key]" @change="uploadImage($event,editableText[key], 'softlogo')" type="file" name="softlogo" id="softlogoField" class="file_field" style="display: none;">
                            </div>
                        </template>

                        <!-- Default text input for other fields -->
                        <template v-else>
                            <input v-if="isEditing[key]" type="text" v-model="editableText[key]" @blur="updateSetting(key)" />
                        </template>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField(key, value)">
                            Edit
                        </button>
                    </td>
                </tr>

                <!--                <tr v-for="[key, value] in Object.entries(settingvalue)" :key="key">-->
<!--                <tr>-->
<!--                    <td>{{ settingvalue.APP_NAME }}</td>-->
<!--                    <td @dblclick="editField('APP_NAME', settingvalue.APP_NAME)" class="editable-field">-->
<!--                        <span v-if="!isEditing['APP_NAME']">{{ settingvalue.APP_NAME }}</span>-->
<!--                        <input v-if="isEditing['APP_NAME']" type="text" v-model="editableText['APP_NAME']"-->
<!--                               @blur="updateSetting('APP_NAME')"/>-->
<!--                    </td>-->
<!--                    <td class="text-center">-->
<!--                        <button class="btn btn-primary btn-sm" @click="editField('APP_NAME', settingvalue.APP_NAME)">-->
<!--                            Edit-->
<!--                        </button>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>{{ settingvalue.APP_NAME }}</td>-->
<!--                    <td @dblclick="editField('APP_NAME', settingvalue.APP_NAME)" class="editable-field">-->
<!--                        <span v-if="!isEditing['APP_NAME']">{{ settingvalue.APP_NAME }}</span>-->
<!--                        <input v-if="isEditing['APP_NAME']" type="text" v-model="editableText['APP_NAME']"-->
<!--                               @blur="updateSetting('APP_NAME')"/>-->
<!--                    </td>-->
<!--                    <td class="text-center">-->
<!--                        <button class="btn btn-primary btn-sm" @click="editField('APP_NAME', settingvalue.APP_NAME)">-->
<!--                            Edit-->
<!--                        </button>-->
<!--                    </td>-->
<!--                </tr>-->


                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                settingvalue: {
                    softlogo: null
                },
                editableText: {
                    softlogo: null
                },
                isEditing: {}
            };
        },
        mounted() {
            this.fetchSettings();
        },
        methods: {
            fetchSettings() {
                axios.get('/api/setting').then(response => {
                    this.settingvalue = response.data.result;
                });
            },
            editField(key, value) {
                this.isEditing = {...this.isEditing, [key]: true};
                this.editableText = {...this.editableText, [key]: value};
            },
            updateSetting(key) {
                const value = this.editableText[key];
                axios.put(`/api/setting/${key}`, {key, value})
                    .then(response => {
                        this.settingvalue[key] = value;
                        this.isEditing[key] = false;
                    })
                    .catch(error => {
                        console.error('Error updating setting:', error);
                    });
            },

        },
    };
</script>

<style scoped>
    .editable-field {
        cursor: pointer;
    }

    .editable-field input {
        width: 100%;
        height:50px;
        font-size: 20px;
    }
    .image_upload img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 4px;
    }
    .image_upload {
        height: 120px;
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        cursor: pointer;
        border: 2px dashed #007bff;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .photo {
        height: 100%;
        width: 100%;
        border-radius: 4px;
    }
    #imageField {
        display: none;
    }
</style>
