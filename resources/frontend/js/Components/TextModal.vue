<!--<template>-->
<!--    <div class="modal fade" :id="modalId" tabindex="-1" role="dialog" v-if="isModalOpen" @click.self="isModalOpen = false">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title">Edit Text</h5>-->
<!--                    <button type="button" class="close" @click="isModalOpen = false">-->
<!--                        <span>&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <slot/>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-secondary" @click="isModalOpen = false">Close</button>-->
<!--                    <button type="submit" class="btn btn-primary" @click="submitText">Submit</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<!--</template>-->
<template>
    <div class="modal fade " :class="{ show: isModalOpen }" tabindex="-1" role="dialog" @click.self="closeModal">
        <div class="modal-dialog modal-lg">
            <form @submit.prevent="submit">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Text</h5>
                        <button type="button" class="btn-close" @click="closeModal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <slot></slot>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TextModal",
        props: {
            isModalOpen: {
                type: Boolean,
                required: true
            }
        },
        data(){
            return{
                // canOpenModal: false,
            }
        },
        methods: {
            submit() {
                this.$emit("submit");
            },
            closeModal() {
                this.$emit("close");
            },


        }
    }
</script>

<style scoped>
    .modal.show {
        display: block;
    }
    .form-control {
        border: 3px solid #ced4da;
        border-radius: 0.25rem;
    }
    .modal.fade {
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>
