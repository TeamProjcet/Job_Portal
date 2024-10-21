
<template>
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
        <div>
            <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a v-if="storePermission" @click="openEditModal()" class="btn btn-custom btn-round"><i class="fas fa-plus"></i>Add</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PageTop",
        props:{
            storePermission:{
                type: Boolean,
                default: false
            }
        },
        methods:{

        }
    }
</script>

<style scoped>
    .btn-custom {
        background-color: rgba(26, 26, 26, 0.84);
        color: white;
        border: none;
    }

    .btn-custom:hover {
        background-color: #218838;
    }
</style>

