<template>

    <div class="container mt-5">
        <!-- Profile Section -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>John Doe</h4>
                        <p>Software Developer</p>
                    </div>
                    <div class="card-body">
                        <img src="https://via.placeholder.com/120" class="img-fluid rounded-circle mx-auto d-block" alt="Profile Picture">
                        <h5 class="text-center">About Me</h5>
                        <p class="text-muted text-center">Experienced software developer with a passion for building innovative applications.</p>
                        <hr>
                        <h6>Skills</h6>
                        <ul class="list-unstyled">
                            <li class="badge bg-primary">JavaScript</li>
                            <li class="badge bg-primary">PHP</li>
                            <li class="badge bg-primary">Vue.js</li>
                            <li class="badge bg-primary">Laravel</li>
                        </ul>
                        <hr>
                        <h6>Contact Info</h6>
                        <p><strong>Email:</strong> johndoe@gmail.com</p>
                        <p><strong>Phone:</strong> +123 456 7890</p>
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
                            <div class="card-header">Applied Jobs</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Frontend Developer</td>
                                        <td>Google</td>
                                        <td><span class="badge bg-primary">In Review</span></td>
                                    </tr>
                                    <tr>
                                        <td>Backend Developer</td>
                                        <td>Facebook</td>
                                        <td><span class="badge bg-success">Accepted</span></td>
                                    </tr>
                                    <tr>
                                        <td>Full Stack Developer</td>
                                        <td>Microsoft</td>
                                        <td><span class="badge bg-danger">Rejected</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Update Profile Section -->
                    <div class="tab-pane fade" id="update-profile" role="tabpanel" aria-labelledby="update-profile-tab">
                        <div class="card">
                            <div class="card-header">Update Profile Information</div>
                            <div class="card-body">
                                <form id="updateProfileForm">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" value="John Doe">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" value="johndoe@gmail.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" value="+123 456 7890">
                                    </div>
                                    <div class="mb-3">
                                        <label for="bio" class="form-label">About Me</label>
                                        <textarea class="form-control" id="bio" rows="4">Experienced software developer with a passion for building innovative applications.</textarea>
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

    export default {
        name: "SeekerProfile"
    }
</script>


<style scoped>

</style>