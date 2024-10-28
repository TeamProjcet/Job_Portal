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
import JobResults from "../views/Searching/JobResults";
import InterviewNoticeComponent from "../views/SeekerAuth/InterviewNoticeComponent";
import NotFoundPage from "../views/NotFoundPage";
import CookiesPolicy from "../views/Policy/CookiesPolicy";
import Help from "../views/Policy/Help";
import FQAs from "../views/Policy/FQAs";
import MessageComponent from "../views/Message/MessageComponent";

const route = [
    {
        path: '*',
        name: 'NotFoundPage',
        component: NotFoundPage

    },
    {
        path: '/',
        name: 'home',
        component: Home,
        meta:{dataUrl:'api/frontend/joblist'},

    },
    {
        path : '/about',
        name : 'about',
        component : About
    },
    {
        path : '/job-cat',
        name : 'category',
        component : JobCat,
        meta:{dataUrl:'api/frontend/joblist'},
    },
    {
        path : '/job-list',
        name : 'List',
        component : JobList,
        meta:{dataUrl:'api/frontend/joblist',
        },
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
        meta:{dataUrl:'api/frontend/joblist'},
    },
    {
        path: '/blog-details/:id',
        name: 'Blog-Details',
        component: BlogDetails,
        meta:{dataUrl:'api/frontend/blogcomment',
        },
        props: true
    },
    {
        path : '/contact',
        name : 'contact',
        component : Contact,
        meta:{pagetitle:'',dataUrl:'api/frontend/contact'},
    },
    {
        path: '/seekerlogin',
        name: 'seekerlogin',
        component: SeekerLogin,
        meta: { pagetitle: '', dataUrl: 'api/frontend/seekerlogin' },
        beforeEnter: (to, from, next) => {
            localStorage.setItem('redirectAfterLogin', from.fullPath);
            next();
        }
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
        meta:{pagetitle:'',dataUrl:'api/frontend/seeker/profile'
            
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

    },

    {
        path:'/cookies-policy',
        name:'CookiesPolicy',
        component:CookiesPolicy,
    } ,
    {
        path:'/help-policy',
        name:'Help',
        component:Help,
    },
    {
        path:'/fqas-policy',
        name:'FQAs',
        component:FQAs,
    } ,
    {
        path:'/suport/messages',
        name:'message',
        component:MessageComponent,
    }

];
export default route;