<template>
    <div class="card-body">
        <table class="table  mt-4">
            <thead>
            <tr>
                <template v-for="heading in tableHeading">
                    <th >{{ heading }}</th>
                </template>
            </tr>
            </thead>
            <tbody>


            <slot></slot>

            </tbody>
        </table>
    </div>

</template>

<script>
    export default {
        name: "DataTable",
        props :{
            tableHeading : {
                type : [Array, Object],
                default (){
                    return [];
                }
            }
        }
    }
</script>

<style scoped>
    table thead th {
        background-color: rgba(26, 26, 26, 0.84);
        color: white;
        text-align: center;
        padding: 10px;
        border-bottom: 2px solid #dee2e6;
    }

    table thead th:first-child {
        border-top-left-radius: 10px;
    }

    table thead th:last-child {
        border-top-right-radius: 10px;
    }
</style>

