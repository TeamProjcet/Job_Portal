import Dashboard from '../views/Dashboard.vue';
import CategoryComponent from "../views/jobCategory/CategoryComponent";
import JobListCommponent from "../views/jobCategory/JobListCommponent";
import CreateJobComponent from "../views/jobCategory/CreateJobComponent.vue";
import CompanyComponent from "../views/jobCategory/CompanyComponent";
import BlogPostComponent from "../views/Blog/BlogPostComponent";
import EmployerForm from "../views/Employers/EmployerForm";


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
        name : 'employefromr',
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
    {
        path : '/admin/employer/profile',
        name : 'blogpost',
        component : EmployerProfile,
        meta:{pagetitle:'Blog Post Table',dataUrl:'api/employer',
        }

    },

];
export default route;