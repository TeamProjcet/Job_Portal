import axios from "axios";
import {Validator} from "vee-validate";
import {Toast} from "vue-toastification";


export default {
    data() {
        return {

        };
    },

methods:{
    fetchSettings() {
        axios.get('/api/setting').then(response => {
            this.settingvalue = response.data.result;
        });
    },


}
}