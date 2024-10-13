<template>
    <div class="row">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
            <div>
                <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <!--                <a @click="openEditModal()" class="btn btn-primary btn-round"><i class="fas fa-plus"></i>Add</a>-->
            </div>
        </div>
        <div class="col-md-12">
            <!-- Menu Tabs -->
            <ul class="nav nav-tabs" id="profileTab" role="tablist">
                <li class="nav-item">
                    <router-link :to="`/admin/seeker/application?application_status=0`" class="nav-link"
                                 :class="(parseInt($route.query.application_status) === 0 || $route.query.application_status === undefined) ? 'active' : ''" >
                        <h6 class="mt-n1 mb-0">Pending Jobs</h6>
                    </router-link>
                </li>
                <li class="nav-item" v-for="(applystatus, index) in requireData.application_status" :key="index">
                    <router-link :to="`/admin/seeker/application?application_status=${applystatus.value}`" class="nav-link"
                                 :class="(parseInt(applystatus.value) === parseInt($route.query.application_status)) ? 'active' : ''" >
                        <h6 class="mt-n1 mb-0">{{applystatus.name}}</h6>
                    </router-link>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content mt-3" id="profileTabContent">
                <!-- Applied Jobs Section -->
                <div class="tab-pane fade show active" id="applied-jobs" role="tabpanel" aria-labelledby="applied-jobs-tab">
                    <div class="card">
                        <div class="card-body">

                            <template v-if="!isLoading && applylist.applyData !==undefined">
                                <div class="table-responsive">

                                    <DataTable :tableHeading="tableHeading">
                                        <tr v-for="(data, index) in applylist.applyData.data" :key="index">
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ data.seeker.name }}</td>
                                            <td>{{ data.seeker.email }}</td>
                                            <td>
                                                <!-- Display the image -->
                                                <img :src="storageImage(data.job.image)" style="width: 100px; height: 100px" alt="Image">
                                            </td>
                                            <td>{{ data.job.company.name}}</td>
                                            <td>{{ data.job.position}}</td>
                                            <td>
                                        <span :class="{
                                        'bg-success p-1': data.application_status == 1,
                                        'bg-danger p-1': data.application_status == 2,
                                        'bg-warning p-1': data.application_status == 0
                                        }">
                                        {{ data.application_status == 0 ? 'Pending' : data.application_status == 1 ? 'Accepted' : 'Rejected' }}
                                        </span>
                                            </td>
                                            <!--                                    <td>-->
                                            <!--                                        &lt;!&ndash; Display the image &ndash;&gt;-->
                                            <!--                                        <img :src="storageImage(data.image)" style="width: 100px; height: 100px" alt="Image">-->
                                            <!--                                    </td>-->
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
                                                <router-link :to="{ name: 'ApplicationView', params: { id: data.id } }">
                                                    <i class="fas fa-eye" style="color: blue; margin-right: 5px; font-size: 20px"></i>
                                                </router-link>

                                                <a style="cursor: pointer" @click="CategoryDatadelete(data.id)">
                                                    <i class="fas fa-trash-alt" style="color: red; font-size: 20px"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </DataTable>
                                </div>
                                <!--                                <pagination previousText="PREV" nextText="NEXT" :data="joblist.jobData" @paginateTo="getJobList"></pagination>-->

                            </template >


                            <template v-else>
                                <span class="dataLoader"><i class="fa fa-spin fa-spinner"></i></span>

                            </template>
                        </div>
                    </div>
                </div>
                <!-- Update Profile Section -->

            </div>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';
    import DataTable from "../../Components/DataTable";
    export default {
        name: "ApplicationComponent",
        components: {DataTable},
        data() {
            return {
                tableHeading: ["Sl", "Name", "Email","Image", "Company", "Position","Status","Resume", "Action"],
                applylist:[],
                application_status : 0,
                isLoading : false,

            };
        },
        watch: {
            '$route.query': {
                handler: function(newValue) {
                    this.application_status = this.$route.query.application_status;
                    this.getapplyList();
                },
                deep: true
            }
        },
        mounted() {
            this.getapplyList();
            this.getRequiredData(['application_status']);

        },
        methods:{
            getapplyList( page=1){
                this.isLoading = true;
                this.applylist={};
                try{
                    axios.get(`/api/backendData?application_status=${this.application_status}&page=${page}`).then((response)=>{
                        this.isLoading = false;
                        this.applylist=response.data.result;
                    })
                }catch(error) {
                    this.error = "Error fetching apply data. Please try again later.";

                }


            }
        }
    }
</script>

<style scoped>
    .dataLoader{
        margin-left: 50%;
    }
    .dataLoader i{
        font-size: 50px;

    }

</style>