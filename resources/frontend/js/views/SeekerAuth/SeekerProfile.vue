<template>
    <div class="container mt-5">
        <!-- Profile Section -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img  style="width: 100px; height: 100px; border: solid 5px; border-radius: 50px" :src="storageImage(seeker.profile_picture)"class="img-fluid rounded-circle mx-auto d-block" alt="Profile Picture">
                        <h4 class="mt-3">{{seeker.name}}</h4>
                        <h5 class="pt-2">Bio</h5>
                        <p class="text-muted">{{seeker.bio}}</p>
                        <hr>
                        <hr>
                        <h6>Contact Info</h6>
                        <p><strong>Email:</strong> {{seeker.email}}</p>
                        <p><strong>Phone:</strong> +880{{seeker.phone}}</p>
                    </div>
                </div>
            </div>
            <!-- Dashboard Sections -->
            <div class="col-md-8">
                <!-- Menu Tabs -->
                <ul class="nav nav-tabs" id="profileTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="applied-jobs-tab" data-bs-toggle="tab" href="#applied-jobs" role="tab" aria-controls="applied-jobs" aria-selected="true">Applied Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="update-profile-tab" data-bs-toggle="tab" href="#update-profile" role="tab" aria-controls="update-profile" aria-selected="false">Update Profile</a>
                    </li>
                </ul>
                <!-- Tab Content -->
                <div class="tab-content mt-3" id="profileTabContent">
                    <!-- Applied Jobs Section -->
                    <div class="tab-pane fade show active" id="applied-jobs" role="tabpanel" aria-labelledby="applied-jobs-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Application Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">interview</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="apply in applications" :key="apply.id">
                                        <td>{{ apply.job.position }}</td>
                                        <td>{{apply.applied_at}}</td>
                                        <td>
                                        <span :class="{
                                        'text-success p-1 ': apply.application_status == 1,
                                        'text-danger p-1 ': apply.application_status == 2,
                                        'text-warning p-1 ': apply.application_status == 0
                                        }">
                                        {{ apply.application_status == 0 ? 'Pending' : apply.application_status == 1 ? 'Accepted' : 'Rejected' }}
                                        </span>
                                        </td>
                                        <td>{{apply.job.address}}</td>
                                        <td v-if="apply.application_status == 1" >
                                            <button class="btn btn-info btn-sm" >
                                            Interview Schedule
                                        </button>

                                    </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Update Profile Section -->
                    <div class="tab-pane fade" id="update-profile" role="tabpanel" aria-labelledby="update-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <form id="updateProfileForm" @submit.prevent="submitProfile">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" v-model="fromData.name" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" v-model="fromData.email" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" v-model="fromData.phone"  >
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" v-model="fromData.address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="bio" class="form-label">Bio</label>
                                        <textarea class="form-control" id="bio" v-model="fromData.bio" rows="4"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Upload your Profile</label>
                                            <div @click="clickFileField('imageField')" class="image_upload" :style="{ 'background-image': 'url(' + publicImage('images/uploading.avif') + ')' }">
                                                <template v-if="fromData.profile_picture !== undefined">
                                                    <img class="photo" :src="storageImage(fromData.profile_picture)">
                                                </template>
                                            </div>
                                            <input @change="uploadImage($event, fromData, 'profile_picture')" type="file" name="profile_picture" id="imageField" class="file_field">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</template>

<script>
    import axios from 'axios';
    import Toast from "vue-toastification";

    export default {

        name: "SeekerProfile",
        data(){
            return{
                seeker: {},
                applications:[],
                components:{
                    Toast
                }

            }
        },

        mounted(){
            this.checkAuthentication();
        },

        methods:{

            async submitProfile() {

                this.fromData.id = this.seeker.id;
             await axios.put('/api/frontend/seeker/profile', this.fromData)
                    .then(function (res) {
                        if (parseInt(res.data.status) === 2000) {
                            this.$toast.success(" Profile Update successfully");

                        } else {
                            this.$toast.error("Profile Update failed!");
                        }
                    })
                    .catch(function (error) {
                        if (error.response) {
                            this.error = "No Job details found.";

                        }
                    });
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