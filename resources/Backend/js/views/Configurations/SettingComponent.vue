
<!--<template>-->
<!--    <div class="container mt-5">-->
<!--        <h1 class="mb-4 text-center">Settings Management</h1>-->
<!--        <div class="table-responsive">-->
<!--            <table class="table table-striped table-bordered">-->
<!--                <thead class="table-dark">-->
<!--                <tr>-->
<!--                    <th>Key</th>-->
<!--                    <th>Value</th>-->
<!--                    <th class="text-center">Actions</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                <tr v-for="(value, key) in settingvalue" :key="key">-->
<!--                    <td>{{ key }}</td>-->
<!--                    <td @dblclick="editField(key, value)" class="editable-field">-->
<!--                        <template v-if="key === 'softlogo'">-->
<!--                            <div class="mb-3">-->
<!--                                <label class="form-label">Upload Logo</label>-->
<!--                                <div-->
<!--                                        @click="clickFileField('softlogoField')"-->
<!--                                        class="image_upload"-->
<!--                                        :style="{ 'background-image': settingvalue.softlogo ? 'url(' + storageImage(settingvalue.softlogo) + ')' : 'url(' + publicImage('images/uploading.avif') + ')' }">-->
<!--                                </div>-->
<!--                                <input v-if="isEditing[key]" @change="upload($event,editableText, 'softlogo')" type="file" id="softlogoField" ref="softlogoField" class="file_field" style="display: none;">-->
<!--                            </div>-->
<!--                        </template>-->

<!--                        <template v-else>-->
<!--                            <span v-if="!isEditing[key]">{{ value }}</span>-->
<!--                            <input v-if="isEditing[key]" type="text" v-model="editableText[key]" @blur="updateSetting(key)" />-->
<!--                        </template>-->
<!--                    </td>-->
<!--                    <td class="text-center">-->
<!--                        <button class="btn btn-primary btn-sm" @click="editField(key, value)">Edit</button>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--            </table>-->

<!--            <template>-->
<!--                <div class="container mt-5">-->
<!--                    <h1 class="mb-4 text-center">Settings Management</h1>-->
<!--                    <div class="table-responsive">-->
<!--                        <table class="table table-striped table-bordered">-->
<!--                            <thead class="table-dark">-->
<!--                            <tr>-->
<!--                                <th>Feature</th>-->
<!--                                <th>Status</th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!--                            <tr>-->
<!--                                <td><label for="jobSelect">Job</label></td>-->
<!--                                <td>-->
<!--                                    <select v-model="editableText.job" class="form-control" id="jobSelect">-->
<!--                                        <option value="1">Yes</option>-->
<!--                                        <option value="0">No</option>-->
<!--                                    </select>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td><label for="blogSelect">Blog</label></td>-->
<!--                                <td>-->
<!--                                    <select v-model="editableText.blog" class="form-control" id="blogSelect">-->
<!--                                        <option value="1">Yes</option>-->
<!--                                        <option value="0">No</option>-->
<!--                                    </select>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </template>-->



<!--        </div>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--    import axios from 'axios';-->

<!--    export default {-->
<!--        data() {-->
<!--            return {-->
<!--                settingvalue: {-->
<!--                    softlogo: null,-->
<!--                },-->
<!--                editableText: {-->
<!--                    softlogo: null,-->
<!--                },-->
<!--                isEditing: {}-->
<!--            };-->
<!--        },-->
<!--        mounted() {-->
<!--            this.fetchSettings();-->
<!--        },-->
<!--        methods: {-->

<!--            editField(key, value) {-->
<!--                this.isEditing = { ...this.isEditing, [key]: true };-->
<!--                this.editableText = { ...this.editableText, [key]: value };-->
<!--            },-->
<!--            updateSetting(key) {-->
<!--                const value = this.editableText[key];-->
<!--                axios.put(`/api/setting/${key}`, {key, value})-->
<!--                    .then(response => {-->
<!--                        this.$set(this.settingvalue, key, value);-->
<!--                        this.isEditing[key] = false;-->
<!--                    })-->
<!--                    .catch(error => {-->
<!--                        console.error('Error updating setting:', error);-->
<!--                    });-->
<!--            },-->
<!--            upload: function (event, dataObject, dataModel, callback = false) {-->
<!--                const _this = this;-->
<!--                var files = event.target.files[0];-->
<!--                var form = new FormData();-->
<!--                form.append('file', files);-->
<!--                _this.httpReq('post', _this.urlGenaretor('api/upload'), form, {}, function (retData) {-->
<!--                    if (retData && retData.result && retData.result.name) {-->
<!--                        const imageName = retData.result.name;-->
<!--                        const settingData = {-->
<!--                            key: dataModel,-->
<!--                            value: imageName-->
<!--                        };-->
<!--                        _this.httpReq('put', _this.urlGenaretor(`api/setting/${dataModel}`), settingData, {}, function (updateResponse) {-->
<!--                            _this.$set(dataObject, dataModel, imageName);-->
<!--                            if (callback) callback(updateResponse);-->
<!--                            _this.toast.success("Image updated successfully!");-->
<!--                        });-->
<!--                    } else {-->
<!--                        _this.toast.error("Image updated Unsuccessfully!");-->
<!--                        console.error("Error uploading file: API not found");-->
<!--                    }-->
<!--                });-->
<!--            }-->




<!--        }-->
<!--    };-->
<!--</script>-->

<!--<style scoped>-->
<!--    .editable-field { cursor: pointer; }-->
<!--    .image_upload img {-->
<!--        max-width: 100%;-->
<!--        max-height: 100%;-->
<!--        border-radius: 4px;-->
<!--    }-->
<!--    .image_upload {-->
<!--        height: 320px;-->
<!--        width: 100%;-->
<!--        background-size: cover;-->
<!--        background-repeat: no-repeat;-->
<!--        cursor: pointer;-->
<!--        border: 2px dashed #007bff;-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        justify-content: center;-->
<!--    }-->

<!--</style>-->










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
                <tr>
                    <td><h5>Main Logo</h5></td>
                    <td @dblclick="editField('softlogo', settingvalue.softlogo)" class="editable-field">
                        <div class="mb-3">
                            <label class="form-label">Upload Logo</label>
                            <div
                                    @click="clickFileField('softlogoField')"
                                    class="image_upload"
                                    :style="{ 'background-image': settingvalue.softlogo ? 'url(' + storageImage(settingvalue.softlogo) + ')' : 'url(' + publicImage('images/uploading.avif') + ')' }">
                            </div>
                            <input v-if="isEditing['softlogo']" @change="upload($event, editableText, 'softlogo')" type="file" id="softlogoField" ref="softlogoField" class="file_field" style="display: none;">
                        </div>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField('softlogo', settingvalue.softlogo)">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>APP_NAME</td>
                    <td @dblclick="editField('APP_NAME', settingvalue.APP_NAME)" class="editable-field">
                        <span v-if="!isEditing['APP_NAME']">{{ settingvalue.APP_NAME }}</span>
                        <input v-if="isEditing['APP_NAME']" type="text" v-model="editableText['APP_NAME']" @blur="updateSetting('APP_NAME')" />
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField('APP_NAME', settingvalue.APP_NAME)">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>MAIL_ENCRYPTION</td>
                    <td @dblclick="editField('MAIL_ENCRYPTION', settingvalue.MAIL_ENCRYPTION)" class="editable-field">
                        <span v-if="!isEditing['MAIL_ENCRYPTION']">{{ settingvalue.MAIL_ENCRYPTION }}</span>
                        <input v-if="isEditing['MAIL_ENCRYPTION']" type="text" v-model="editableText['MAIL_ENCRYPTION']" @blur="updateSetting('MAIL_ENCRYPTION')" />
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField('MAIL_ENCRYPTION', settingvalue.MAIL_ENCRYPTION)">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>MAIL_FROM_ADDRESS</td>
                    <td @dblclick="editField('MAIL_FROM_ADDRESS', settingvalue.MAIL_FROM_ADDRESS)" class="editable-field">
                        <span v-if="!isEditing['MAIL_FROM_ADDRESS']">{{ settingvalue.MAIL_FROM_ADDRESS }}</span>
                        <input v-if="isEditing['MAIL_FROM_ADDRESS']" type="text" v-model="editableText['MAIL_FROM_ADDRESS']" @blur="updateSetting('MAIL_FROM_ADDRESS')" />
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField('MAIL_FROM_ADDRESS', settingvalue.MAIL_FROM_ADDRESS)">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>MAIL_HOST</td>
                    <td @dblclick="editField('MAIL_HOST', settingvalue.MAIL_HOST)" class="editable-field">
                        <span v-if="!isEditing['MAIL_HOST']">{{ settingvalue.MAIL_HOST }}</span>
                        <input v-if="isEditing['MAIL_HOST']" type="text" v-model="editableText['MAIL_HOST']" @blur="updateSetting('MAIL_HOST')" />
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField('MAIL_HOST', settingvalue.MAIL_HOST)">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>MAIL_MAILER</td>
                    <td @dblclick="editField('MAIL_MAILER', settingvalue.MAIL_MAILER)" class="editable-field">
                        <span v-if="!isEditing['MAIL_MAILER']">{{ settingvalue.MAIL_MAILER }}</span>
                        <input v-if="isEditing['MAIL_MAILER']" type="text" v-model="editableText['MAIL_MAILER']" @blur="updateSetting('MAIL_MAILER')" />
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField('MAIL_MAILER', settingvalue.MAIL_MAILER)">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>MAIL_PASSWORD</td>
                    <td @dblclick="editField('MAIL_PASSWORD', settingvalue.MAIL_PASSWORD)" class="editable-field">
                        <span v-if="!isEditing['MAIL_PASSWORD']">{{ settingvalue.MAIL_PASSWORD }}</span>
                        <input v-if="isEditing['MAIL_PASSWORD']" type="text" v-model="editableText['MAIL_PASSWORD']" @blur="updateSetting('MAIL_PASSWORD')" />
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField('MAIL_PASSWORD', settingvalue.MAIL_PASSWORD)">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>MAIL_PORT</td>
                    <td @dblclick="editField('MAIL_PORT', settingvalue.MAIL_PORT)" class="editable-field">
                        <span v-if="!isEditing['MAIL_PORT']">{{ settingvalue.MAIL_PORT }}</span>
                        <input v-if="isEditing['MAIL_PORT']" type="text" v-model="editableText['MAIL_PORT']" @blur="updateSetting('MAIL_PORT')" />
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField('MAIL_PORT', settingvalue.MAIL_PORT)">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>MAIL_USERNAME</td>
                    <td @dblclick="editField('MAIL_USERNAME', settingvalue.MAIL_USERNAME)" class="editable-field">
                        <span v-if="!isEditing['MAIL_USERNAME']">{{ settingvalue.MAIL_USERNAME }}</span>
                        <input v-if="isEditing['MAIL_USERNAME']" type="text" v-model="editableText['MAIL_USERNAME']" @blur="updateSetting('MAIL_USERNAME')" />
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField('MAIL_USERNAME', settingvalue.MAIL_USERNAME)">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>Job Post</td>
                    <td @dblclick="editField('jobPost', settingvalue.jobPost)" class="editable-field">
                        <span v-if="!isEditing['jobPost']">{{ settingvalue.jobPost == 1 ? 'Yes' : 'No' }}</span>
                        <select  class="form-control" v-if="isEditing['jobPost']" type="text" v-model="editableText['jobPost']" @blur="updateSetting('jobPost')">
                            <option disabled>Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField('jobPost', settingvalue.jobPost)">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>Blog Post</td>
                    <td @dblclick="editField('blogPost', settingvalue.blogPost)" class="editable-field">
                        <span v-if="!isEditing['blogPost']">{{ settingvalue.blogPost == 1 ? 'Yes' : 'No' }}</span>
                        <select class="form-control" v-if="isEditing['blogPost']" type="text" v-model="editableText['blogPost']" @blur="updateSetting('blogPost')">
                            <option disabled>Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" @click="editField('blogPost', settingvalue.blogPost)">Edit</button>
                    </td>
                </tr>
                </tbody>



            </table>

            <template>
                <div class="container mt-5">
                    <h1 class="mb-4 text-center">Settings Management</h1>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                            <tr>
                                <th>Feature</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><label for="jobSelect">Job</label></td>
                                <td>
                                    <select v-model="editableText.job" class="form-control" id="jobSelect">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="blogSelect">Blog</label></td>
                                <td>
                                    <select v-model="editableText.blog" class="form-control" id="blogSelect">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </template>



        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                settingvalue: {
                    softlogo: null,
                },
                editableText: {
                    softlogo: null,
                },
                isEditing: {}
            };
        },
        mounted() {
            this.fetchSettings();
        },
        methods: {

            editField(key, value) {
                this.isEditing = { ...this.isEditing, [key]: true };
                this.editableText = { ...this.editableText, [key]: value };
            },
            updateSetting(key) {
                const value = this.editableText[key];
                axios.put(`/api/setting/${key}`, {key, value})
                    .then(response => {
                        this.$set(this.settingvalue, key, value);
                        this.isEditing[key] = false;
                    })
                    .catch(error => {
                        console.error('Error updating setting:', error);
                    });
            },
            upload: function (event, dataObject, dataModel, callback = false) {
                const _this = this;
                var files = event.target.files[0];
                var form = new FormData();
                form.append('file', files);
                _this.httpReq('post', _this.urlGenaretor('api/upload'), form, {}, function (retData) {
                    if (retData && retData.result && retData.result.name) {
                        const imageName = retData.result.name;
                        const settingData = {
                            key: dataModel,
                            value: imageName
                        };
                        _this.httpReq('put', _this.urlGenaretor(`api/setting/${dataModel}`), settingData, {}, function (updateResponse) {
                            _this.$set(dataObject, dataModel, imageName);
                            if (callback) callback(updateResponse);
                            _this.toast.success("Image updated successfully!");
                        });
                    } else {
                        _this.toast.error("Image updated Unsuccessfully!");
                        console.error("Error uploading file: API not found");
                    }
                });
            }




        }
    };
</script>

<style scoped>
    .editable-field { cursor: pointer; }

    .image_upload img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 4px;
    }
    .image_upload {
        height: 320px;
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        cursor: pointer;
        border: 2px dashed #007bff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

</style>

