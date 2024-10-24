import axios from 'axios';

export default {
    data() {
        return {}
    },

    methods: {

        can:function (permissionName) {
            const _this=this;
            var hasPermission=_this.permissions.includes(permissionName);
            if (hasPermission){
                return true
            }
            return false

        }
    },
    computed: {

        Config() {
            return this.$store.state.Config;
        },
        permissions() {
            return this.$store.state.permissions;
        }

    }

}
