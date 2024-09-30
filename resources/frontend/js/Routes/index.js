import Home from '../views/Home.vue';
import About from '../views/About.vue';
import Contact from '../views/Contact.vue';
import JobCat from "../views/JobCat";
import JobList from "../views/JobList";
import JobDetails from "../views/JobDetails";
import BlogDetails from "../views/BlogDetails";
import BlogPost from "../views/BlogPost";

const route = [
    {
        path: '/',
        name: 'home',
        component: Home

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
        path : '/job-details/:id',
        name : 'Details',
        component : JobDetails,
        props: true
    },
    {
        path: '/blog-post',
        name: 'Blog-Post',
        component: BlogPost
    },
    {
        path: '/blog-details/:id',
        name: 'Blog-Details',
        component: BlogDetails,
        props: true
    },
    {
        path : '/contact',
        name : 'contact',
        component : Contact
    }
];
export default route;