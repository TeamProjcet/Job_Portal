<template>
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container text-center">
            <div class="row g-2 mb-3 justify-content-center">
                <div class="col-md-12">
                    <div class="row g-2 align-items-center justify-content-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0 search-input" placeholder="Keyword Search" />
                        </div>
                        <div class="col-md-2">
                            <select class="form-select border-0 select-input">
                                <option selected>Company</option>
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                                <option value="3">Category 3</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100 search-button">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Search"
    }
</script>

<style scoped>

    .search-input {
        padding: 10px;
        border-radius: 5px;
        transition: border-color 0.3s;
    }

    .search-input:focus {
        border-color: #ffc107;
        box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
    }

    .select-input {
        padding: 10px;
        border-radius: 5px;
    }

    .select-input:focus {
        border-color: #ffc107;
        box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
    }

    .search-button {
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .search-button:hover {
        background-color: #000;
    }
</style>
