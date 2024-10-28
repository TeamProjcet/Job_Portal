import axios from "axios";
import {Validator} from "vee-validate";
import {Toast} from "vue-toastification";


export default {
    data() {
        return {
            editableKey: '',
            editableText: '',
            canOpenModal: false,

        };
    },


    methods: {
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
                        if(_this.$route.query.next_url !== undefined){
                            _this.$router.push(`/seekerlogin?next_url=${_this.$route.query.next_url}`);
                        }else{
                            _this.$router.push(`/seekerlogin`);
                        }
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
                this.$router.push(`/seekerlogin?next_url=${this.$route.fullPath}`);
                return;
            }
            if (this.saveds.includes(job.id)) {
                this.$toast.warning('Job is already saved!');
                return;
            }
            try {
                const response = await axios.post('/api/frontend/saved', {
                    job_id: job.id
                });
                this.saveds.push(job.id);
                this.$toast.success('Job saved successfully!');
            } catch (error) {
                console.error('Error saving job:', error);
                this.$toast.error('Error saving job. Please try again.');
            }
        },

        loadSavedJobs() {
            axios.get('/api/frontend/saved')
                .then((response) => {
                    if (response.data && response.data.result) {
                        this.saveds = response.data.result.map(job => job.job_id);

                    }else {
                        this.saveds = [];
                        // console.error('No saved jobs found');
                    }
                })
                .catch((error) => {
                    console.error('Error loading saved jobs:', error);
                });
        },
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
                    this.fromData.experience = this.seeker.experience;
                    this.fromData.bio = this.seeker.bio;
                    this.fromData.profile_picture = this.seeker.profile_picture;
                } else {
                    this.isAuthenticated = false;
                    this.seeker = {};
                }

            } catch (error) {
                this.isAuthenticated = false;
                this.seeker = {};
                console.error('Error fetching authentication data:', error);
            }
        },
        updateCountdown(endTime) {
            const now = new Date().getTime();
            const distance = endTime - now;

            if (distance <= 0) {
                clearInterval(this.timer);
                this.countdownTime = "Time is up!";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            this.countdownTime = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        },
        beforeDestroy() {
            clearInterval(this.timer);
        },

        submitText() {
            const url = this.editableKey ? `/api/staticContents/${this.editableKey}` : '/api/staticContents';
            const method = this.editableKey ? 'put' : 'post';
            axios({
                method: method,
                url: url,
                data: {
                    key: this.editableKey,
                    value: this.editableText
                }
            })
                .then(response => {
                    if (method === 'post') {
                        this.staticText[this.editableKey] = this.editableText;
                    } else {
                        this.staticText[this.editableKey] = response.data.result;
                    }
                    this.isModalOpen = false;
                })
                .catch(error => {
                    console.error('Error updating static text:', error);
                });
        },
        fetchStaticTexts() {
            axios.get('/api/staticContents').then(response => {
                this.staticText = response.data.result;
            });
        },

        async checkUserRole() {
            try {
                const response = await axios.get('/api/frontend/superadmin');
                const user = response.data.result;

                if (user && user.role_id === 1) {
                    this.canOpenModal = true;
                } else {
                    this.canOpenModal = false;
                }
            } catch (error) {
                console.error('Error fetching user data:', error);
                this.canOpenModal = false;
            }
        },


        openTextModal(key) {
            this.editableKey = key;
            this.editableText = this.staticText[key];
            if (this.canOpenModal) {
                this.isModalOpen = true;
            }
        }

    }

}
