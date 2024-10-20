<template>
    <div class="row">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3" style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0"></div>
        </div>
        <div class="col-md-12">
            <div class="">
                <!-- First Row -->
                <div class="d-flex">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label fw-bold">Interview Status</label>
                            <select class="form-select" v-model="selectedInterviewStatus" @change="filterData">
                                <option value="">Select Interview Status</option>
                                <template v-for="(status, index) in requireData.interview_status" >
                                    <option :value="status.value">{{ status.name }}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label fw-bold">Application Status</label>
                            <select class="form-select" v-model="selectedApplicationStatus" @change="filterData">
                                <option value="">Select Application Status</option>
                                <template v-for="(status, index) in requireData.application_status">
                                    <option :value="status.value">{{ status.name }}</option>
                                </template>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label fw-bold">Address</label>
                            <select class="form-select" v-model="selectedAddress" @change="filterData">
                                <option disabled>Filter Address</option>
                                <template v-for="data in requireData.district">
                                    <option :value="data.name">{{data.name}}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label fw-bold">Education</label>
                            <select class="form-select" v-model="selectedEducation" @change="filterData">
                                <option disabled>Filter Educations</option>
                                <template v-for="educat in educations">
                                    <option value="educat">{{educat}}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label fw-bold">Skills</label>
                            <select class="form-select" v-model="selectedSkills" @change="filterData">
                                <option disabled>Filter Skills</option>
                                <template v-for="skill in skillname">
                                    <option value="skill">{{skill}}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="tab-content mt-3" id="profileTabContent">
                <!-- Applied Jobs Section -->
                <div class="tab-pane fade show active" id="applied-jobs" role="tabpanel" aria-labelledby="applied-jobs-tab">
                    <div class="card">
                        <div class="card-body">

                            <template v-if="!isLoading && dataList !== undefined">
                                <div class="table-responsive">
                                    <DataTable :tableHeading="tableHeading">
                                        <tr v-for="(data, index) in displayedData" :key="index">
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ data.seeker.name }}</td>
                                            <td>{{ data.seeker.email }}</td>
                                            <td>
                                                <img :src="storageImage(data.seeker.image)" style="width: 100px; height: 100px" alt="Image">
                                            </td>
                                            <td>{{ data.job.company.name }}</td>
                                            <td>{{ data.job.position }}</td>
                                            <td>
                                                <span :class="{
                                                    'bg-success p-1': data.application_status == 1,
                                                    'bg-danger p-1': data.application_status == 2,
                                                    'bg-warning p-1': data.application_status == 0
                                                }">
                                                    {{ data.application_status == 0 ? 'Pending' : data.application_status == 1 ? 'Accepted' : 'Rejected' }}
                                                </span>
                                            </td>
                                            <td>
                                                <template v-if="data.image">
                                                    <template v-if="isPDF(data.image)">
                                                        <img src="https://i.ibb.co.com/7NzrJtr/4208479.png" style="width: 100px; height: 100px" alt="PDF Icon">
                                                    </template>
                                                    <template v-else>
                                                        <img :src="storageImage(data.image)" style="width: 100px; height: 100px" alt="Image">
                                                    </template>
                                                </template>
                                                <template v-else>
                                                    <img src="https://i.ibb.co.com/3ssF0pw/giphy.gif" style="width: 100px; height: 100px" alt="Default Icon">
                                                </template>
                                            </td>
                                            <td>
                                                <router-link v-if="can('application.show')" :to="{ name: 'ApplicationView', params: { id: data.id } }">
                                                    <i class="fas fa-eye" style="color: blue; margin-right: 5px; font-size: 20px"></i>
                                                </router-link>
                                                <a v-if="can('application.destroy')" style="cursor: pointer" @click="CategoryDatadelete(data.id)">
                                                    <i class="fas fa-trash-alt" style="color: red; font-size: 20px"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </DataTable>
                                </div>
                            </template>

                            <template v-else>
                                <span class="dataLoader"><i class="fa fa-spin fa-spinner"></i></span>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import DataTable from "../../Components/DataTable";

    export default {
        name: "ApplicationComponent",
        components: { DataTable},
        data() {
            return {
                tableHeading: ["Sl", "Name", "Email", "Image", "Company", "Position", "Status", "Resume", "Action"],
                application_status: 0,
                isLoading: false,
                selectedAddress: '',
                selectedEducation: '',
                selectedSkills: '',
                selectedInterviewStatus: '',
                selectedApplicationStatus: '',
                filteredData: [],
                educations: ['Secondary School (SSC)', 'Higher Secondary School (HSC)', 'Diploma in Engineering', 'Bachelor\'s Degree', 'Master\'s Degree', 'Professional Degree', 'Postgraduate Degree', 'Ph.D.'],
                skillname:[ 'JavaScript', 'Python', 'Java', 'C++', 'Laravel','vue', 'PHP', 'C#', 'TypeScript', 'HTML', 'CSS', 'React', 'Angular', 'SQL','MongoDB', 'Express.js', 'Node', 'Bootstrap', 'Django','Git'],

            };
        },
        watch: {
            '$route.query': {
                handler() {
                    this.application_status = this.$route.query.application_status;
                    this.getDataList();
                },
                deep: true
            }
        },
        computed: {
            displayedData() {
                return this.filteredData.length > 0 ? this.filteredData : this.dataList;
            }
        },
        mounted() {
            this.getDataList();
            this.getRequiredData(['application_status', 'interview_status','district']);
        },
        methods: {
            filterData() {
                this.filteredData = this.dataList.filter(item => {
                    const seeker = item.seeker;
                    const matchesAddress = !this.selectedAddress || seeker.address == this.selectedAddress;
                    const matchesEducation = !this.selectedEducation || JSON.parse(seeker.education).includes(this.selectedEducation);
                    const matchesSkills = !this.selectedSkills || JSON.parse(seeker.skills).includes(this.selectedSkills);
                    const matchesInterviewStatus = !this.selectedInterviewStatus || item.interview_status == this.selectedInterviewStatus;
                    const matchesApplicationStatus = !this.selectedApplicationStatus || item.application_status == this.selectedApplicationStatus;
                    return matchesAddress && matchesEducation && matchesSkills && matchesInterviewStatus && matchesApplicationStatus;
                });

            },
        }
    };
</script>

<style scoped>
    .dataLoader {
        margin-left: 50%;
    }
    .dataLoader i {
        font-size: 50px;
    }
</style>
