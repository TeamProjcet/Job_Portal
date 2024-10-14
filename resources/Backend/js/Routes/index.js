import Dashboard from '../views/Dashboard.vue';
import CategoryComponent from "../views/jobCategory/CategoryComponent";
import JobListCommponent from "../views/jobCategory/JobListCommponent";
import CreateJobComponent from "../views/jobCategory/CreateJobComponent.vue";
import CompanyComponent from "../views/jobCategory/CompanyComponent";
import BlogPostComponent from "../views/Blog/BlogPostComponent";
import EmployerForm from "../views/Employers/EmployerForm";
import EmployerProfile from "../views/Employers/EmployerProfile";
import Newsletter from "../views/Visitor/Newsletter";
import Contact from "../views/Visitor/Contact";
import ApplicationComponent from "../views/Application/ApplicationComponent";
import BlogCommentComponent from "../views/Blog/BlogCommentComponent";


const route = [
    {
        path : '/admin/dashboard',
        name : 'dashboard',
        component : Dashboard
    },
    {
        path : '/admin/jobcategory/category',
        name : 'category',
        component : CategoryComponent,
        meta:{pagetitle:'Job Category',dataUrl:'api/categories',
        }

    },
    {
        path : '/admin/jobcategory/joblist',
        name : 'joblist',
        component : JobListCommponent,
        meta:{pagetitle:'Job List Table',dataUrl:'api/joblist',
        }

    },
    {
        path : '/admin/jobcategory/createjob',
        name : 'createjob',
        component : CreateJobComponent,
        meta:{pagetitle:'Job Create Table',dataUrl:'api/createjob',
        }

    },

    {
        path : '/admin/jobcategory/company',
        name : 'company',
        component : CompanyComponent,
        meta:{pagetitle:'Job Company Table',dataUrl:'api/company',
        }

    },
    {
        path : '/admin/employer/employerfrom',
        name : 'employefrom',
        component :EmployerForm,
        meta:{pagetitle:' Employer Table',dataUrl:'api/employerfrom',
        }

    },
    {
        path : '/admin/blog/blogpost',
        name : 'blogpost',
        component : BlogPostComponent,
        meta:{pagetitle:'Blog Post Table',dataUrl:'api/blogpost',
        }

    },
    // {
    //     path : '/admin/blog/blogcomment',
    //     name : 'blogcomment',
    //     component : BlogCommentComponent,
    //     meta:{pagetitle:'Blog Comment Table',dataUrl:'api/frontend/blogcomment',
    //     }
    //
    // },
    {
        path : '/admin/employer/profile',
        name : 'employerprofile',
        component : EmployerProfile,
        meta:{pagetitle:'Blog Post Table',dataUrl:'api/employer',
        }

    },
    {
        path : '/admin/seeker/application',
        name : 'application',
        component : ApplicationComponent,
        meta:{pagetitle:'Application Table',dataUrl:'api/application',
        }

    },
    {
        path: '/admin/visitor/newsletter',
        name: 'newsletter',
        component: Newsletter,
        meta: { pagetitle: 'Newsletter Subscriptions', dataUrl: 'api/frontend/newsletter' },
    },
    {
        path: '/admin/visitor/contact',
        name: 'contact',
        component: Contact,
        meta: { pagetitle: 'Visitor Contact Info', dataUrl: 'api/frontend/contact' },
    }

];
export default route;