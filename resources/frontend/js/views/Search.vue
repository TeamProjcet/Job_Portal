<template>
    <div class="container-fluid bg-primary mb-5 "  style="padding: 35px;">
        <div class="container text-center">
            <div class="row g-2 mb-3 justify-content-center">
                <div class="col-md-12">
                    <div class="row g-2 align-items-center justify-content-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0 search-input" placeholder="Keyword Search" v-model="keyword"/>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select border-0 select-input" v-model="selectedCompany">
                                <option value="" disabled selected>Company</option>
                                <template v-for="item in requireData.company" >
                                    <option :value="item.id">{{ item.name }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100 search-button" @click="redirectToResults">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Search",
        data() {
            return {
                keyword: '',
                selectedCompany: '',
                jobPosts: [],

            };
        },
        mounted() {
            this.getDataList();
            this.getRequiredData(['company']);
        },
        methods: {
            async getDataList() {
                try {
                    const response = await axios.get('/api/joblist');
                    this.jobPosts = response.data.result;
                } catch (error) {
                    console.error("Error fetching job posts:", error);
                }
            },
            async getRequiredData(dataTypes) {
                if (dataTypes.includes('company')) {
                    try {
                        const response = await axios.get('/api/company');
                        this.requireData.company = response.data.result;
                    } catch (error) {
                        console.error("Error fetching company data:", error);
                    }
                }
            },

            redirectToResults() {
                const regex = new RegExp(this.keyword, 'i'); // 'i' flag makes it case-insensitive

                const filteredJobPosts = this.jobPosts.filter(job => {
                    const matchesKeyword = regex.test(job.position); // Test the position against the regex
                    const matchesCompany = this.selectedCompany ? job.company.id === this.selectedCompany : true;
                    return matchesKeyword && matchesCompany;
                });

                // console.log(filteredJobPosts);

                // Redirect to results page  query parameter
                this.$router.push({
                    name: 'JobResults',
                    query: { jobs: JSON.stringify(filteredJobPosts) }
                });
            }


        }
    }
</script>


