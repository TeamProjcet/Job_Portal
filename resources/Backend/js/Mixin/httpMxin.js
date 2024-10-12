import axios from "axios";
import {Validator} from "vee-validate";
import {Toast} from "vue-toastification";


export default {
    data() {
        return {

        };
    },


    methods: {
        getDataList: function () {
            const _this = this;
            axios.get(_this.urlGenaretor())
                .then(function (res) {
                    if (parseInt(res.data.status) === 2000) {
                        _this.$store.commit("dataList", res.data.result);

                    }
                    if (parseInt(res.data.status) === 5000) {

                    }
                });
        },
        getRequiredData: function (array) {
            const _this = this;
            _this.httpReq('post', _this.urlGenaretor('api/required_data'), array, {}, function (retData) {
                $.each(retData.result, function (eachItem, value) {
                    _this.$set(_this.requireData, eachItem, value);
                });
            });
        },
        httpReq: function (method, url, data = {}, params = {}, callback = false) {

            axios({
                method: method,
                url: url,
                data: data,
                params: params
            }).then(function (res) {
                if (parseInt(res.data.result) === 5000) {
                    return;

                }
                if (parseInt(res.data.result) === 3000) {
                    return;

                }
                if (typeof callback === 'function') {
                    callback(res.data);
                }
            })

        },
        submitFromData: function (fromData = {}, optParms = {}, callback) {
            const _this = this;

            let method = (_this.formType === 2 && _this.updateId) ? 'put' : 'post';
            let url = (_this.formType === 2 && _this.updateId) ? `${_this.urlGenaretor()}/${_this.updateId}` : _this.urlGenaretor();

            _this.$validator.validateAll().then(valid => {
                if (valid) {
                    axios({
                        method: method,
                        url: url,
                        data: fromData

                    }).then(function (res) {
                        if (parseInt(res.data.status) === 2000) {

                            if (optParms.modalForm === undefined) {
                                _this.closeModal();
                            }
                            if (optParms.reloadList === undefined) {
                                _this.getDataList();
                            }
                            if (typeof callback === 'function') {
                                callback(res.data.result);
                            }
                            _this.$toast.success("data submitted successfully!");

                        } else if (parseInt(res.data.status) === 3000) {
                            $.each(res.data.result, function (index, errorValue) {
                                _this.$validator.errors.add({
                                    id: index,
                                    field: index,
                                    name: index,
                                    msg: errorValue[0],
                                });
                            })

                        } else {
                            _this.$toast.error("data submitted  Unsuccessfully!");

                        }
                    });
                }
            });
        },


        CategoryDatadelete: function(id , index) {
            const _this = this;

            // _this.DeleteToster(function (isConfirmedelete) {
                let url=`${_this.urlGenaretor()}/${id}`;
                _this.httpReq('delete',url,{},{},function (retData) {
                    _this.getDataList();
                    _this.$toast.success("Data Delete successfully!");


                })
            // })

        },

        uploadImage : function (event, dataObject, dataModel, callback = false) {
            const _this = this;

            var files = event.target.files[0];
            var form = new FormData();

            form.append('file', files);

            _this.httpReq('post', _this.urlGenaretor('api/upload'), form, {}, function (retData) {
                _this.$set(dataObject, dataModel, retData.result.name);
            })
        },


        async checkAuthentication() {
            try {
                const response = await axios.get('/userdata');

                // Check if the response contains valid seeker data
                if (response.data && response.data.result?.user) {
                    this.user = response.data.result.user;
                    this.isAuthenticated = true;

                    this.fromData.name = this.user.name;
                    this.fromData.email = this.user.email;



                    if (response.data.result.employer && Array.isArray(response.data.result.employer)) {
                        this.employer = response.data.result.employer.map(app => ({
                            id: app.id,
                            user_id: app.user_id,
                            company_website: app.company_website,
                            company_address:app.company_address,
                            contact_person: app.contact_person,
                            bio: app.bio,
                            image: app.image,
                            company_description: app.company_description ,
                        }));
                    } else {
                        this.employer = [];
                    }
                } else {
                    this.user = null;
                    this.isAuthenticated = false;
                }
            } catch (error) {
                this.isAuthenticated = false;
                console.error('Authentication check failed:', error.response ? error.response.data : error.message);
            }
        }



    }

}