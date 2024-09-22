import axios from 'axios';

export default {
    data(){
        return{}
    },
    methods:{
        modalHideshow(id, status) {
            $('#' + id).modal(status);

        },
        openEditModal(data) {
            this.formData = { ...data };
            this.modalHideshow('modalId', 'show');
        },
    }
}