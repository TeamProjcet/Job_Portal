<template>
    <div class="container mt-5">
        <div class="card" v-for="(employer, index) in dataList" :key="index">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img class="card-img" :src="employer.company_logo" alt="Employer Logo" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ employer.company_name }}</h5>
                        <p class="card-text"><strong>Industry:</strong> {{ employer.user_id }}</p>
                        <p class="card-text"><strong>Industry:</strong> {{ employer.industry }}</p>
                        <p class="card-text"><strong>Location:</strong> {{ employer.company_address }}</p>
                        <p class="card-text"><strong>Contact Person:</strong> {{ employer.contact_person }}</p>
                        <p class="card-text">{{ employer.company_description }}</p>
                        <div class="contact-info">
                            <p><strong>Contact:</strong> {{ employer.contact_person }}</p>
                            <p><strong>Website:</strong> <a :href="employer.company_website" target="_blank">{{ employer.company_website }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                name: "EmployerList",

                // employer: {
                //     logo: 'https://via.placeholder.com/150', // Placeholder for logo
                //     name: 'Example Company',
                //     industry: 'Technology',
                //     location: 'San Francisco, CA',
                //     founded: '2010',
                //     description: 'Example Company is a leading firm in technology innovation.',
                //     contact: {
                //         name: 'John Doe',
                //         email: 'john@example.com',
                //     },
                //     website: 'https://example.com',
                // },
            };
        },
        mounted(){
          this.getDataList();
        },
        methods: {
            // sendMessage() {
            //     // Implement your messaging logic here
            //     alert('Message sent!');
            // },
        },
    };
</script>

<style scoped>
    .card-img {
        width: 100%;
        height: auto;
    }
</style>
