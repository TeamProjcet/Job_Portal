import axios from "axios";
import {Validator} from "vee-validate";
import {Toast} from "vue-toastification";


export default {
    data() {
        return {

        };
    },


    methods: {
        // getDataList: function (page = 1) {
        //     const _this = this;
        //     axios.get(_this.urlGenaretor()
        //         // {params: {
        //         //     page : page,
        //         //     filter : _this.formFilter,
        //         // }}
        //     )
        //         .then(function (res) {
        //             if (parseInt(res.data.status) === 2000) {
        //                 _this.$store.commit("dataList", res.data.result);
        //
        //             }
        //             if (parseInt(res.data.status) === 5000) {
        //
        //             }
        //         });
        // },
        // getRequiredData: function (array) {
        //     const _this = this;
        //     _this.httpReq('post', _this.urlGenaretor('api/required_data'), array, {}, function (retData) {
        //         $.each(retData.result, function (eachItem, value) {
        //             _this.$set(_this.requireData, eachItem, value);
        //         });
        //     });
        // },
        // httpReq: function (method, url, data = {}, params = {}, callback = false) {
        //
        //     axios({
        //         method: method,
        //         url: url,
        //         data: data,
        //         params: params
        //     }).then(function (res) {
        //         if (parseInt(res.data.result) === 5000) {
        //             return;
        //
        //         }
        //         if (parseInt(res.data.result) === 3000) {
        //             return;
        //
        //         }
        //         if (typeof callback === 'function') {
        //             callback(res.data);
        //         }
        //     })
        //
        // },
        submitFrom() {
            const _this = this;

            if (_this.fromData.password !== _this.fromData.confirmPassword) {
                _this.errorMessage = "Passwords do not match.";
                return;
            }

            axios.post('/api/frontend/seekerregis', _this.fromData)
                .then(function (res) {
                    if (parseInt(res.data.status) === 2000) {
                        _this.$toast.success("Registered successfully!");
                        _this.$router.push('/seekerlogin');
                    } else {
                        _this.$toast.error("Registration failed!");
                    }
                })
                .catch(function (error) {
                    if (error.response) {
                        _this.errorMessage = error.response.data.message || "An error occurred.";
                    }
                });
        },
        async saveJob(job) {
            if (!this.isAuthenticated) {
                this.$router.push('/seekerlogin');
                return;
            }

            if (this.savedJobs.has(job.id)) {
                this.$toast.info('Job is already saved!');
                return;
            }

            try {
                const response = await axios.post('/api/saved', {
                    job_id: job.id
                });

                this.savedJobs.add(job.id);
                this.$toast.success('Job saved successfully!');
            } catch (error) {
                console.error('Error saving job:', error);
                this.$toast.error('Error saving job. Please try again.');
            }
        },

        loadSavedJobs() {
            axios.get('/api/saved')
                .then((response) => {
                    this.saveds = new Set(response.data.result.map(job => job.id));
                })
                .catch((error) => {
                    console.error('Error loading saved jobs:', error);
                });
        },
        // uploadImage : function (event, dataObject, dataModel, callback = false) {
        //     const _this = this;
        //
        //     var files = event.target.files[0];
        //     var form = new FormData();
        //
        //     form.append('file', files);
        //
        //     _this.httpReq('post', _this.urlGenaretor('api/upload'), form, {}, function (retData) {
        //         _this.$set(dataObject, dataModel, retData.result.name);
        //     })
        // },

        async authData() {
            try {
                const response = await axios.get('/api/frontend/seekerAuth');

                if (response.data.result && response.data.result.length > 0) {
                    this.seeker = response.data.result[0];
                    this.isAuthenticated = true;
                    this.fromData.name = this.seeker.name;
                    this.fromData.email = this.seeker.email;
                    this.fromData.phone = this.seeker.phone;
                    this.fromData.address = this.seeker.address;
                } else {
                    this.isAuthenticated = false;
                    this.seeker = {};
                }

            } catch (error) {
                this.isAuthenticated = false;
                this.seeker = {};
                console.error('Error fetching authentication data:', error);
            }
        }

    }

}
