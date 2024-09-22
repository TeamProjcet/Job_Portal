
<template>
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
        <div>
            <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a @click="openEditModal()" class="btn btn-primary btn-round"><i class="fas fa-plus"></i>Add</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PageTop"
    }
</script>

<style scoped>

</style>

