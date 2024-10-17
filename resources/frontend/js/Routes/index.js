import Home from '../views/Home.vue';
import About from '../views/About.vue';
import Contact from '../views/Contact.vue';
import JobCat from "../views/JobCat";
import JobList from "../views/JobList";
import JobDetails from "../views/JobDetails";
import SeekerLogin from "../views/SeekerAuth/SeekerLogin";
import SeekerRegis from "../views/SeekerAuth/SeekerRegis";
import BlogDetails from "../views/Blog/BlogDetails";
import BlogPost from "../views/Blog/BlogPost";
import SeekerProfile from "../views/SeekerAuth/SeekerProfile";
import JobCategory from "../views/JobCategory";
import JobCompany from "../views/JobCompany";
import JobResults from "../views/JobResults";
import InterviewNoticeComponent from "../views/SeekerAuth/InterviewNoticeComponent";

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
        component: BlogPost,
    },
    {
        path: '/blog-details/:id',
        name: 'Blog-Details',
        component: BlogDetails,
        meta:{dataUrl:'api/blog-comment',
        },
        props: true
    },
    {
        path : '/contact',
        name : 'contact',
        component : Contact
    },
    {
        path : '/seekerlogin',
        name : 'seekerlogin',
        component : SeekerLogin,
        meta:{pagetitle:'',dataUrl:'api/frontend/seekerlogin'},
    },
    {
        path : '/seekerregis',
        name : 'registration',
        component : SeekerRegis,
        meta:{pagetitle:'',dataUrl:'api/frontend/seekerregis'},
    },
    {
        path : '/seekerprofile',
        name : 'seekerprofile',
        component : SeekerProfile,
        meta:{pagetitle:'',dataUrl:'api/frontend/seekerprofile'
            
        },
    },
    {
        path: '/jobcategory/:category_id',
        name: 'jobcategory',
        component: JobCategory,
        props: true
    },
    {
        path: '/jobcompany/:company_id',
        name: 'jobcompany',
        component: JobCompany,
        props: true
    },

    {
        path: '/results',
        name: 'JobResults',
        component: JobResults,
        props: route => ({ jobs: JSON.parse(route.query.jobs) })
    },

    {
        path:'/seeker/interviewtable/:id',
        name:'interviewtable',
        component:InterviewNoticeComponent,
        meta:{pagetitle:'Interview Notice Table'},
        props: true

    }
];
export default route;