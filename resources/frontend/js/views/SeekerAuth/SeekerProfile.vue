<template>
<div class="container mt-5">
<!-- Profile Section -->
<div class="row">
<div class="col-md-4">
<div class="card">
    <div class="card-body text-center">
        <img style="width: 100px; height: 100px; border: solid 5px; border-radius: 50px"
             :src="storageImage(seeker.image)"
             class="img-fluid rounded-circle mx-auto d-block" alt="Profile Picture">
        <h4 class="mt-3">{{ seeker.name }}</h4>
        <h6 class="pt-2">Bio</h6>
        <p class="text-muted">{{ seeker.bio }}</p>
        <hr>
        <h6>Expreince</h6>
        <p class="text-muted">{{ seeker.experience }}</p>
        <hr>
        <h6>Skills:</h6>
        <p v-if="parsedSkills">
                <label class="badge bg-primary mx-1" v-for="(Skills, index) in parsedSkills" :key="index">{{ Skills }}</label>
        </p>
        <hr>
        <h6>Education:</h6>
        <p v-if="parsedEducation">
                <label class="badge bg-primary mx-1" v-for="(educat, index) in parsedEducation" :key="index">{{ educat }}</label>
        </p>

        <hr>
        <h6>Contact Info</h6>
        <p><strong>Email:</strong> {{ seeker.email }}</p>
        <p><strong>Phone:</strong> +880{{ seeker.phone }}</p>
        <p><strong>Address:</strong> {{ seeker.address }}</p>
    </div>
</div>
</div>
<!-- Dashboard Sections -->
<div class="col-md-8">
<!-- Menu Tabs -->
<ul class="nav nav-tabs" id="profileTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="applied-jobs-tab" data-bs-toggle="tab" href="#applied-jobs"
           role="tab" aria-controls="applied-jobs" aria-selected="true">Applied Jobs</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="saved-jobs-tab" data-bs-toggle="tab" href="#saved-jobs" role="tab"
           aria-controls="saved-jobs" aria-selected="false">Saved Jobs</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="update-profile-tab" data-bs-toggle="tab" href="#update-profile"
           role="tab" aria-controls="update-profile" aria-selected="false">Update Profile</a>
    </li>
</ul>
<!-- Tab Content -->
<div class="tab-content mt-3" id="profileTabContent">
    <!-- Applied Jobs Section -->
    <div class="tab-pane fade show active" id="applied-jobs" role="tabpanel"
         aria-labelledby="applied-jobs-tab">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Job Title</th>
                        <th scope="col">Application Date</th>
                        <th scope="col">Location</th>
                        <th scope="col">Status</th>
                        <th scope="col">Interview</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="apply in applications" :key="apply.id">
                        <td>{{ apply.job.position }}</td>
                        <!--                                        <td>{{ new Date(apply.created_at).toLocaleDateString() }}</td>-->
                        <td>{{formatDate(apply.created_at)}}</td>

                        <td>{{ apply.job.address }}</td>
                        <td>
                        <span :class="{
                            'bg-primary p-1': apply.application_status == 1,
                            'bg-danger p-1': apply.application_status == 2,
                            'bg-warning p-1': apply.application_status == 0
                        }">
                            <label class="badge text-white mx-1">{{ apply.application_status == 0 ? 'Pending' : apply.application_status == 1 ? 'Accepted' : 'Rejected' }}</label>
                        </span>
                        </td>


                        <td>
                            <router-link :to="{ name: 'interviewtable', params: { id: apply.id } }"
                                         class="btn btn-info btn-sm">
                                Interview Schedule
                            </router-link>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Saved Jobs Section -->
    <div class="tab-pane fade" id="saved-jobs" role="tabpanel" aria-labelledby="saved-jobs-tab">
        <div v-for="job in savedJobs" :key="job.id">
            <div class="card mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between">
                    <div class="job-details">
                        <div class="job-title-text mb-3">
                            <router-link :to="{ name: 'Details', params: { id: job.job_id }}"
                                         class="job-link text-decoration-none">
                                <h5 class="card-title text-primary">
                                    <i class="bi bi-briefcase"></i>
                                    {{truncateString(job.job.position, 50)}}
                                </h5>
                            </router-link>
                        </div>
                        <a class="comp-name-text mb-2">
                            <i class="bi bi-geo-alt"></i>
                            <strong>Address:</strong>
                            <span class="text-muted">
                            {{ job.job.address }}
                            </span>
                        </a>
                    </div>
                    <div class="logo-container">
                        <img style="height: 80px" :src="storageImage(job.job.image)" alt="Company Logo"
                             class="company-logo"/>
                    </div>
                </div>
                <div class="d-flex gap-2 p-3">
                    <router-link :to="{ name: 'Details', params: { id: job.job_id }}"
                                 class="btn btn-primary">Apply Now
                    </router-link>
                    <button @click="deleteJob(job.id)" class="btn btn-danger">Remove</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Profile Section -->
    <div class="tab-pane fade" id="update-profile" role="tabpanel" aria-labelledby="update-profile-tab">
        <div class="card shadow-sm">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Update Seeker Profile</h4>
                    </div>
                    <div class="card-body">
                        <form id="updateProfileForm" @submit.prevent="submitFromData(fromData)">
                            <div class="row">
                                <!-- Name and Email -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" v-model="fromData.name" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" v-model="fromData.email" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Phone and Address -->
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" v-model="fromData.phone">
                                </div>
                                <select class="col-md-6 mb-3" v-model="fromData.address">
                                    <label for="address" class="form-label">Address</label>
                                    <template v-for="data in requireData.district">
                                        <option :value="data.name">{{data.name}}</option>
                                    </template>
                                    <input type="text" class="form-control" id="address" v-model="fromData.address">
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3  ">
                                    <label  class="form-label">Skill</label>
                                    <multiselect
                                            v-model="fromData.skills"
                                            :options="skillname"
                                            :multiple="true"
                                            placeholder="Choose Skill"

                                    ></multiselect>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Education</label>
                                    <multiselect
                                            v-model="fromData.education"
                                            :options="educations"
                                            :multiple="true"
                                            placeholder="Choose Education Levels"

                                    ></multiselect>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="experience" class="form-label">Experience</label>
                                <input type="text" class="form-control" id="experience" v-model="fromData.experience">
                            </div>
                            <!-- Bio -->
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea class="form-control" id="bio" v-model="fromData.bio" rows="4"></textarea>
                            </div>


                            <!-- Profile Picture Upload -->
                            <div class="mb-3">
                                <label class="form-label">Upload Image</label>
                                <div @click="clickFileField('imageField')" class="image_upload"
                                     :style="{ 'background-image': 'url(' + publicImage('images/uploading.avif') + ')' }">
                                    <template v-if="fromData.image !== undefined">
                                        <img class="photo img-thumbnail" :src="storageImage(fromData.image)" style="width: 150px;">
                                    </template>
                                </div>
                                <input @change="uploadImage($event, fromData, 'image')" type="file" name="image" id="imageField" class="file_field">
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success btn-block">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
`
</div>
</div>
</div>
</div>

</template>

<script>
    import axios from 'axios';
    import Toast from "vue-toastification";
    import format from 'date-fns/format';
    import multiselect from 'vue-multiselect'
    import VueMultiselect from "vue-multiselect/src/Multiselect";

    export default {

        name: "SeekerProfile",
        components: {multiselect},
        data() {
            return {
                seeker: {},
                applications: [],
                savedJobs: [],
                components: {
                    Toast, format,
                },

                educations: ['Secondary School (SSC)', 'Higher Secondary School (HSC)', 'Diploma in Engineering', 'Bachelor\'s Degree', 'Master\'s Degree', 'Professional Degree', 'Postgraduate Degree', 'Ph.D.'],
                skillname:[ 'JavaScript', 'Python', 'Java', 'C++', 'Laravel','vue', 'PHP', 'C#', 'TypeScript', 'HTML', 'CSS', 'React', 'Angular', 'SQL','MongoDB', 'Express.js', 'Node', 'Bootstrap', 'Django','Git'],

            }
        },
        computed: {
            parsedEducation() {
                try {
                    return JSON.parse(this.seeker.education);
                } catch (error) {
                    return [];
                }
            } ,
            parsedSkills() {
                try {
                    return JSON.parse(this.seeker.skills);
                } catch (error) {
                    return [];
                }
            }
        },

        mounted() {
            this.seekerdata();
            this.SavedJobs();
            this.getRequiredData(['district'])
        },

        methods: {
            formatDate(dateString) {
                return format(new Date(dateString), 'MMMM d, yyyy');
            },
            truncateString(str, length) {
                if (str.length > length) {
                    return str.substring(0, length) + '...';
                }
                return str;
            },

            async SavedJobs() {
                try {
                    const response = await axios.get('/api/frontend/saved');
                    this.savedJobs = response.data.result;
                } catch (error) {
                    console.error('Error fetching saved jobs:', error);
                }
            },
            async seekerdata() {
                try {
                    const response = await axios.get('/api/frontend/seekerdata');
                    this.applications = response.data.result.applications;
                    this.seeker = response.data.result.seeker;
                } catch (error) {
                    console.error('Error fetching saved jobs:', error);
                }
            },


            async deleteJob(id) {
                const result = await this.$swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                });

                if (result.isConfirmed) {
                    try {
                        const response = await axios.delete(`/api/frontend/saved/${id}`);
                        this.savedJobs = this.savedJobs.filter(job => job.id !== id);
                        this.$swal.fire('Deleted!', 'Your job has been deleted.', 'success');
                    } catch (error) {
                        console.error('Error deleting job:', error);
                        this.$swal.fire('Error!', 'There was a problem deleting the job.', 'error');
                    }
                }
            },



        }
    }
</script>


<style scoped>
    @import 'vue-multiselect/dist/vue-multiselect.min.css';
    .image_upload img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 4px;
    }

    .image_upload {
        height: 120px;
        width: 30%;
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