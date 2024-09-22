<template>
    <div class="container">
    <div class="page-inner" >
        <div class="d-flex bg-light align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3 " style="margin-left: 20px">{{$route.meta.pagetitle}}</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <router-link to= "/admin/jobcategory/joblist" class="btn btn-primary btn-round">Back To Job List</router-link>
            </div>
        </div>
        <form>
            <div class="mb-3 ">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label  class="form-label">Title</label>
                <input type="text" class="form-control"  name="title">
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
               <select class="form-control">
                   <option>Select type</option>
                   <option value="1">Full Time</option>
                   <option value="2">Part Time</option>
               </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Details</label>
                <input type="text" class="form-control" name="details">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
</template>

<script>
    export default {
        name: "CreateJopComponent"
    }
</script>

<style scoped>

</style>