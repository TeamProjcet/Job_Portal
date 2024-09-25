import Dashboard from '../views/Dashboard.vue';
import CategoryComponent from "../views/jobCategory/CategoryComponent";
import JobPostCommponent from "../views/jobCategory/JobPostCommponent";
import CreateJobComponent from "../views/jobCategory/CreateJobComponent.vue";
import CompanyComponent from "../views/jobCategory/CompanyComponent";
import EmployerList from "../views/Employers/EmployerList";


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
        component : JobPostCommponent,
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
        path : '/admin/jobcategory/employer',
        name : 'employer',
        component :EmployerList,
        meta:{pagetitle:' Employer Table',dataUrl:'api/employer',
        }

    },
];
export default route;