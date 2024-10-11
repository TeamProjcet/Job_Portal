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
<!--          <div v-if="seekers.length > 0">-->
<!--              <label >Select Seeker:</label>-->
<!--              <select v-model="form.seeker_id">-->
<!--                  <option v-for="seeker in seekers" :key="seeker.id" :value="seeker.seeker_id">-->
<!--                      Seeker ID: {{ seeker.seeker_id }}-->
<!--                  </option>-->
<!--              </select>-->
<!--          </div>-->

<!--          <div v-else>-->
<!--              <p>No seekers found for this job.</p>-->
<!--          </div>-->
          <label >Interview Date:</label>
          <input type="date" class="form-control" v-model="fromData.interview_date" required>

          <label >Interview Time:</label>
          <input type="time"  class="form-control"  v-model="fromData.interview_time" required>

          <label >Location:</label>
          <input type="text"  class="form-control"  v-model="fromData.interview_location" required>


<!--          <p v-if="message">{{ message }}</p>-->
      </FormModal>
    </div>
    </div>
</template>




<script>
    import FormModal from "../../Components/FormModal";
    import PageTop from "../../Components/PageTop";
    import DataTable from "../../Components/DataTable";
    export default {
        name: "InterviewComponent",
        components: {DataTable, PageTop, FormModal},
        data(){
            return{
                tableHeading:["SL","name","Action"],

            }
        },
        mounted() {
            this.getRequiredData(['application'])
        }
    }
</script>

<style scoped>

</style>


<!--<script>-->
<!--    export default {-->
<!--        data() {-->
<!--            return {-->
<!--                seekers: [],-->
<!--                form: {-->
<!--                    job_id: 1, // Example job ID, replace dynamically-->
<!--                    seeker_id: '',-->
<!--                    interview_date: '',-->
<!--                    interview_time: '',-->
<!--                    interview_location: '',-->
<!--                },-->
<!--                message: ''-->
<!--            };-->
<!--        },-->
<!--        mounted() {-->
<!--            this.fetchSeekers();-->
<!--        },-->
<!--        methods: {-->
<!--            fetchSeekers() {-->
<!--                axios.get(`/api/jobs/${this.form.job_id}/seekers`)-->
<!--                    .then(response => {-->
<!--                        this.seekers = response.data;-->
<!--                    })-->
<!--                    .catch(error => {-->
<!--                        console.error('Error fetching seekers:', error);-->
<!--                    });-->
<!--            },-->
<!--            scheduleInterview() {-->
<!--                axios.post('/api/interviews', this.form)-->
<!--                    .then(response => {-->
<!--                        this.message = response.data.message;-->
<!--                        this.form.seeker_id = '';-->
<!--                        this.form.interview_date = '';-->
<!--                        this.form.interview_time = '';-->
<!--                        this.form.interview_location = '';-->
<!--                    })-->
<!--                    .catch(error => {-->
<!--                        console.error('Error scheduling interview:', error);-->
<!--                    });-->
<!--            }-->
<!--        }-->
<!--    };-->
<!--</script>-->

