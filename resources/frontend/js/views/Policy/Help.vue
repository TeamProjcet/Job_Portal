<template>
    <div class="container mt-5">
        <h1 class="mb-4">Help & Support</h1>

        <p>If you have any questions or need assistance, you've come to the right place! Below are some common topics and questions.</p>

        <h3>Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        How do I create an account?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        To create an account, click on the <a href="/seekerregis">"Sign Up"</a> button on the homepage and fill in the required details.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        How do I reset my password?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Click on "Forgot Password?" on the login page and follow the instructions to reset your password.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        How can I contact customer support?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        You can reach out to our support team at <strong>info@jobportal.com</strong> or through the contact form on our website.
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-4">Need More Help?</h3>
        <p>If you need further assistance, feel free to reach out to us directly.</p>
        <p>Email: <strong>info@jobportal.com</strong></p>
        <p>Phone: <strong>+88 0255073530</strong></p>
    </div>
</template>

<script>
    export default {
        name: "Help"
    }
</script>

<style scoped>
    /* Add any custom styles here */
</style>
