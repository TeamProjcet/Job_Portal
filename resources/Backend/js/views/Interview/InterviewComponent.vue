<template>
    <div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <PageTop></PageTop>
                </div>
                <DataTable :tableHeading="tableHeading">
                    <tr >
                        <td>1</td>
                        <td>df</td>

                        <td>
                            <a
                                    @click="openEditModal(data, data.id)">
                                <i class="fas fa-edit" style="color: blue;"></i>
                            </a>
                            <a v-if="can('category_delete')" @click="CategoryDatadelete(data.id, index)">
                                <i class="fas fa-trash-alt" style="color: red;"></i>
                            </a>
                        </td>
                    </tr>
                </DataTable>
            </div>

      <FormModal @submit="submitFromData(fromData)">

          <div class="mb-3">
              <label class="form-label">Job Name</label>
              <select v-model="fromData.job_id" name="job_id" v-validate="'required'" class="form-control">
                  <template v-for="(item, index) in requireData.jobData" >
                      <option :value="item.id">{{item.position}}</option>
                  </template>
              </select>
          </div>

          <div class="mb-3">
              <label >Location:</label>
              <input type="text" v-validate="'required'" class="form-control" v-model="fromData.location" name="location">

          </div>

          <div class="mb-3">

              <label >Interview Date:</label>
              <input type="date" v-validate="'required'" class="form-control" v-model="fromData.interview_date" name="interview_date">

          </div>

          <div class="mb-3">

              <label >Interview Time:</label>
              <input type="time" v-validate="'required'" class="form-control"  v-model="fromData.interview_time" name="interview_time">

          </div>

          <div class="mb-3">
              <label class="form-label">Notic</label>
              <editor type="text"  v-validate="'required'" class="form-control" v-model="fromData.notic" name="notic"></editor>
          </div>



      </FormModal>
    </div>
    </div>
</template>




<script>
    import FormModal from "../../Components/FormModal";
    import PageTop from "../../Components/PageTop";
    import DataTable from "../../Components/DataTable";
    import axios from "axios";
    export default {
        name: "InterviewComponent",
        components: {DataTable, PageTop, FormModal},
        data(){
            return{
                tableHeading:["SL","name","Action"],
                jobdata:[],

            }
        },
        mounted() {
            this.getRequiredData(['jobData']);
        },
        methods:{


        }
    }
</script>

<style scoped>

</style>



