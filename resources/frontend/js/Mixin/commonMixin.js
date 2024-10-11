import axios from 'axios';

export default {
    data(){
        return{}
    },
    methods:{
        openModal: function (modalId = false, fromData = {}, callback = false) {
            const _this = this;
            let modal_id = modalId ? modalId : 'myModal';
            $(`#${modal_id}`).modal('show');
            _this.$store.commit('fromData', fromData);

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

            const _this=this;
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
        _show: function (object, colum, defaultData = '') {
            if (object !== undefined && object !== null && object[colum] !== undefined){
                return object[colum];
            }
            return defaultData;
        },

        publicImage : function (imageName) {
            return `${window.publicPath}/${imageName}`;
        },

        storageImage : function (imageName) {
            return `${window.uploadPath}/${imageName}`;
        },
        clickFileField : function (filedName) {
            $(`#${filedName}`).click();
        }
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
        Config(){
            return this.$store.state.Config;
        },
        permissions(){
            return this.$store.state.permissions;
        }

    }
}