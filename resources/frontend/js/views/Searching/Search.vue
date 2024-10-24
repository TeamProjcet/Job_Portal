<template>
    <div class="container-fluid bg-primary mb-5 "  style="padding: 35px;">
        <div class="container text-center">
            <div class="row g-2 mb-3 justify-content-center">
                <div class="col-md-12">
                    <div class="row g-2 align-items-center justify-content-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0 search-input" :placeholder="$t('keywordsearch')" v-model="keyword"/>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select border-0 select-input" v-model="selectedCompany">
                                <option value="" disabled>{{$t('company')}}</option>
                                <template v-for="item in requireData.company" >
                                    <option :value="item.id">{{ item.name }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select border-0 select-input" v-model="selectedCategory">
                                <option value="" disabled selected>{{$t('job_category')}}</option>
                                <template v-for="item in requireData.category" >
                                    <option :value="item.id">{{ item.name }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100 search-button" @click="redirectToResults">
                                <i class="bi bi-search"></i>  {{$t('search')}}
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
                selectedCategory: '',
                jobPosts: [],

            };
        },
        mounted() {
            this.jonDataList();
            this.getRequiredData(['company','category']);
        },
        methods: {
            async jonDataList() {
                try {
                    const response = await axios.get(`/api/frontend/joblist`);
                    this.jobPosts = Array.isArray(response.data.result.jobData.data) ? response.data.result.jobData.data : [];
                } catch (error) {
                    console.error("Error fetching job posts:", error);
                }
            },



            redirectToResults() {
                const regex = new RegExp(this.keyword, 'i');

                const filteredJobPosts = this.jobPosts.filter(job => {
                    const matchesKeyword = regex.test(job.position);
                    const matchesCompany = this.selectedCompany ? job.company.id === this.selectedCompany : true;
                    const matchesCategory = this.selectedCategory ? job.category.id === this.selectedCategory : true;

                    return matchesKeyword && matchesCompany && matchesCategory;
                });

                this.$router.push({
                    name: 'JobResults',
                    query: { jobs: JSON.stringify(filteredJobPosts) }
                });
            }
        }
    }
</script>


