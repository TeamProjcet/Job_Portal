<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Profile Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center position-relative">
                        <div>
                            <img  v-if="!employer.length" src="https://www.w3schools.com/howto/img_avatar.png" class="w-50 img-fluid rounded-circle mx-auto d-block"
                                  alt="Profile Picture">
                            <template v-for="items in employer">
                                <img v-if="employer.length"
                                        style="width: 100px; height: 100px; border: solid 5px; border-radius: 50px"
                                        :src="storageImage(items.image)"
                                        class=" img-fluid rounded-circle mx-auto d-block"
                                        alt="Profile Picture"
                                >

                            </template>
                        </div>


                        <h4 class="mt-3">{{user.name}}</h4>
                        <template v-for="items in employer">
                            <h5 class="pt-2">Bio</h5>
                            <p class="text-muted">{{items.bio}}</p>
                        </template>
                        <hr>
                        <h6>Contact Info</h6>
                        <table class="table table-borderless">
                            <tbody>
                            <template >
                                <tr v-if="user.company && user.company.name">
                                    <td><strong>Company Name:</strong></td>
                                    <td>{{ user.company.name }}</td>
                                </tr>
                            </template>
                            <template v-for="items in employer">
                                <tr>
                                    <td><strong>Address:</strong></td>
                                    <td>{{items.company_address}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Website:</strong></td>
                                    <td><a :href="items.company_website" target="_blank">{{items.company_website}}</a></td>
                                </tr>
                                <tr>
                                    <td><strong>Contact_Person:</strong></td>
                                    <td>{{items.contact_person}}</td>
                                </tr>
                            </template>

                            <tr>
                                <td><strong>Email:</strong></td>
                                <td><a :href="user.email">{{user.email}}</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex p-2 gap-2">
                        <button v-if="!employer.length" @click="openEditModal()" type="button" class="btn btn-success">Save Profile</button>

                        <template v-for="items in employer">
                            <button v-if="employer.length" @click="openEditModal(items, items.id)" type="button" class="btn btn-primary">Update Profile</button>
                        </template>
                    </div>
                </div>
            </div>

            <template>
                    <FormModal class="form-modal" @submit="submitFromData(fromData)">
                        <div>
                            <div class="mb-3">
                                <label class="form-label">Contact Person</label>
                                <input type="text" class="form-control" v-model="fromData.contact_person">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Company Website</label>
                                <input type="url" class="form-control" v-model="fromData.company_website">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Company Address</label>
                                <input type="text" class="form-control" v-model="fromData.company_address">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Company Description</label>
                                <input type="text" class="form-control" v-model="fromData.company_description">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control" v-model="fromData.bio" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Upload your Profile</label>
                                <div @click="clickFileField('imageField')" class="image_upload" :style="{ 'background-image': 'url(' + publicImage('images/uploading.avif') + ')' }">
                                    <template v-if="fromData.image !== undefined">
                                        <img class="photo" :src="storageImage(fromData.image)">
                                    </template>
                                </div>
                                <input @change="uploadImage($event, fromData, 'image')" id="imageField" type="file" name="image" class="file_field">
                            </div>
                        </div>
                    </FormModal>

            </template>
        </div>
    </div>
</template>

<script>
    import Toast from "vue-toastification";
    import FormModal from "../../Components/FormModal";
    import axios from 'axios'

    export default {
        name: "EmployerProfile",
        components: {FormModal},
        data() {
            return {
                user: {},
                employer: [],

                components:{
                    Toast, FormModal
                },
            };
        },
        mounted() {
            this.userdata();

        },

        methods: {
            defaultImage() {
                return 'https://www.w3schools.com/howto/img_avatar.png';
            },
            async userdata() {
                try {
                    const response = await axios.get('/userdata');
                    this.user = response.data.result.user;
                    this.employer = response.data.result.employer;
                } catch (error) {
                    console.error('Error fetching saved jobs:', error);
                }
            },

        }
    }
</script>

<style scoped>
    .image_upload img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 4px;
    }
    .image_upload {
        height: 120px;
        width: 25%;
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

    .edit-icon {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>
