import Dashboard from '../views/Dashboard.vue';
import CategoryComponent from "../views/jobCategory/CategoryComponent";
import JobPostCommponent from "../views/jobCategory/JobPostCommponent";
import CreateJopComponent from "../views/jobCategory/CreateJopComponent";


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
        component : CreateJopComponent,
        meta:{pagetitle:'Job Create Table',dataUrl:'api/createjob',
        }

    },
];
export default route;