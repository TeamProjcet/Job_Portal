<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="container bg-light p-4 rounded">
                    <div class="row align-items-center pt-4 pb-4">
                        <div class="col-md-6">
                            <h3 class="fw-bold mb-3 ms-3">{{$route.meta.pagetitle}}</h3>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <router-link to="/admin/role/rolepermissions" class="btn btn-secondary btn-round">
                                Back To User And Role Page
                            </router-link>
                        </div>
                    </div>
                </div>

                <form @submit.prevent="submitFromData(fromData)" class="pt-5">
                    <div class="mb-3">
                        <label  class="form-label">Name:</label>
                        <input type="text" v-validate="'required'" v-model="fromData.name"  name="name" class="form-control"  />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" v-validate="'required'" v-model="fromData.email" name="email" class="form-control"  />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" v-validate="'required'" v-model="fromData.password" name="password" class="form-control"  />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company Name</label>
                        <select v-model="fromData.company_id" v-validate="'required'" name="company_id" class="form-control">
                            <option value="" disabled>Select company name</option>
                            <template v-for="(item, index) in requireData.company">
                                <option :value="item.id">{{item.name}}</option>
                            </template>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Role Name</label>
                        <select  v-validate="'required'" v-model="fromData.role_id" name="role_id" class="form-control" >
                            <option value="" disabled>Select Role name</option>
                            <template v-for="(item, index) in requireData.roles">
                                <option :value="item.id">{{item.name}}</option>
                            </template>
                        </select>
                    </div>

                    <div class="d-grid mb-3 pt-4">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>


<script>
    import axios from 'axios';
    export default {
        name: "UserRegisComponenet",

        mounted() {
            this.getRequiredData(['company','roles'])
        },
        methods:{

        }
    }
</script>

<style scoped>

</style>