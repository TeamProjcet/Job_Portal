import axios from 'axios';

export default {
    data() {
        return {}
    },
    watch: {
        'errors': {
            handler: function (eachError, oldVal) {
                const _this = this;
                $(".validation_error").remove();
                $(".is-invalid").removeClass('is-invalid');
                $.each(eachError.items, function (index, eachField) {
                    var target = $("[name='" + eachField.field + "']");
                    $(target).parent().append("<span class='validation_error'>" + eachField.msg + "</span>")
                    $(target).addClass('is-invalid');
                });
            },
            deep: true
        }
    },
    methods: {
        openModal: function (modalId = false, fromData = {}, callback = false) {
            const _this = this;
            let modal_id = modalId ? modalId : 'myModal';
            $(`#${modal_id}`).modal('show');
            _this.$store.commit('fromData', fromData);

            // $.each(defaultObject,function (index ,value) {
            //     _this.$set(_this.fromData,index ,value)
            //
            // });
            if (typeof callback == 'function') {
                callback(true)
            }


        },
        openEditModal(data, id) {

            this.$store.commit('updateId', id);
            this.$store.commit('formType', 2);

            this.openModal(false, data)

        },

        openEdit(data, id) {

            const _this = this;
            this.$store.commit('updateId', id);
            this.$store.commit('formType', 2);
            _this.urlGenaretor('api/createjob')


        },

        closeModal: function (modalId = 'myModal', fromData = {}) {
            const _this = this;
            $(`#${modalId}`).modal('hide');
            _this.$store.commit('fromData', {});
            _this.$store.commit('updateId', '');
            _this.$store.commit('formType', 1);
        },
        urlGenaretor: function (customUrl = false) {
            const _this = this;
            if (customUrl) {
                return `${baseUrl}/${customUrl}`;

            }
            return `${baseUrl}/${_this.$route.meta.dataUrl}`

        },

        publicImage: function (imageName) {
            return `${window.publicPath}/${imageName}`;
        },

        // storageImage: function (imageName) {
        //     return `${window.uploadPath}/${imageName}`;
        // },

        clickFileField: function (filedName) {
            $(`#${filedName}`).click();
        },

        _show: function (object, colum, defaultData = '') {
            if (object !== undefined && object !== null && object[colum] !== undefined){
                return object[colum];
            }
            return defaultData;
        },

        isPDF(fileName) {
            return fileName && fileName.split('.').pop().toLowerCase() === 'pdf';
        },
        storageImage(imageName) {
            if (!imageName || typeof imageName !== 'string') {
                return 'https://i.ibb.co.com/pbhTkkr/images.png';
            }
            const lastDotIndex = imageName.lastIndexOf('.');
            const extension = lastDotIndex !== -1 ? imageName.substring(lastDotIndex + 1).toLowerCase() : '';
            const imagePath = `${window.uploadPath}/${imageName}`;

            // Return the image path or an icon based on the extension
            switch (extension) {
                case 'pdf':
                    return imagePath;
                case 'jpg':
                case 'jpeg':
                    return imagePath;
                case 'png':
                    return imagePath;
                case 'doc':
                case 'docx':
                    return imagePath;
                case 'xls':
                case 'xlsx':
                    return imagePath;
                default:
                    return 'https://i.ibb.co.com/pbhTkkr/images.png';
            }
        },

        DeleteToster: function (callback = false, confirmMessage = null, confirmTitle = null) {
            const _this = this;
            let message = confirmMessage || "You won't be able to revert this!";
            let title = confirmTitle || "Are you sure?";

            _this.$swal.fire({
                title: title,
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (typeof callback === 'function') {
                    if (result.isConfirmed) {
                        callback(true);
                    } else {
                        callback(false);
                    }
                }
            });
        },

    },



    computed: {
        fromData() {
            return this.$store.state.fromData;
        },
        dataList() {
            return this.$store.state.dataList;
        },
        requireData() {
            return this.$store.state.requireData;
        },
        updateId() {
            return this.$store.state.updateId;
        },
        formType() {
            return this.$store.state.formType;
        },
            parsedEducation() {
                try {
                    return JSON.parse(this.application.seeker.education);
                } catch (error) {
                    return [];
                }
            } ,
            parsedSkills() {
                try {
                    return JSON.parse(this.application.seeker.skills);
                } catch (error) {
                    return [];
                }
            }
        },


}
