import Home from '../views/Home.vue';
import About from '../views/About.vue';
import Contact from '../views/Contact.vue';
import JobCat from "../views/JobCat";
import JobList from "../views/JobList";
import JobDetails from "../views/JobDetails";

const route = [
    {
        path : '/',
        name : 'home',
        component : Home
    },
    {
        path : '/about',
        name : 'about',
        component : About
    },
    {
        path : '/job-cat',
        name : 'category',
        component : JobCat
    },
    {
        path : '/job-list',
        name : 'List',
        component : JobList
    },
    {
        path : '/job-details',
        name : 'Details',
        component : JobDetails
    },
    {
        path : '/contact',
        name : 'contact',
        component : Contact
    }
];
export default route;