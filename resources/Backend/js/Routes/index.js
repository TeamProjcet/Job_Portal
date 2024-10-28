import Dashboard from '../views/Dashboard.vue';
import CategoryComponent from "../views/jobCategory/CategoryComponent";
import JobListCommponent from "../views/jobCategory/JobListCommponent";
import CreateJobComponent from "../views/jobCategory/CreateJobComponent.vue";
import CompanyComponent from "../views/jobCategory/CompanyComponent";
import BlogPostComponent from "../views/Blog/BlogPostComponent";
import EmployerForm from "../views/Employers/EmployeeList";
import EmployerProfile from "../views/Employers/EmployerProfile";
import Newsletter from "../views/Visitor/Newsletter";
import Contact from "../views/Visitor/Contact";
import ApplicationComponent from "../views/Application/ApplicationComponent";
import BlogCommentComponent from "../views/Blog/BlogCommentComponent";
import ApplicationView from "../views/Application/ApplicationView";
import PermissionComponent from "../views/RolePermission/PermissionComponent";
import RolePermissionComponent from "../views/RolePermission/RolePermissionComponent";
import RoleComponent from "../views/RolePermission/RoleComponent";
import UserRegisComponenet from "../views/RolePermission/UserRegisComponenet";
import InterviewComponent from "../views/Interview/InterviewComponent";
import Partnership from "../views/Partnership/Partnership";
import ViewBlgoComment from "../views/Blog/ViewBlgoComment";
import FrontendManage from "../views/FrontendManagement/FrontendManage";
import NotFoundPage from "../views/NotFoundPage";
import SubscribeEmails from "../views/Emails/SubscribeEmails";
import SliderComponent from "../views/FrontendManagement/SliderComponent";
import SettingComponent from "../views/Configurations/SettingComponent";
import MessageComponent from "../views/Messages/MessageComponent";
import MessageTable from "../views/Messages/MessageTable";


const route = [
    {
        path: '*',
        name: 'NotFoundPage',
        component: NotFoundPage,
        meta: { pagetitle: 'Frontend Management Table', },
    },
    {
        path: '/admin/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: { dataUrl: 'api/Counting'},
    },
    {
        path: '/admin/jobcategory/category',
        name: 'category',
        component: CategoryComponent,
        meta: {
            pagetitle: 'Job Category', dataUrl: 'api/categories',
        }

    },
    {
        path: '/admin/jobcategory/joblist',
        name: 'joblist',
        component: JobListCommponent,
        meta: {
            pagetitle: 'Job List Table', dataUrl: 'api/joblist',
        }

    },
    {
        path: '/admin/jobcategory/createjob',
        name: 'createjob',
        component: CreateJobComponent,
        meta: {
            pagetitle: 'Job Create Table', dataUrl: 'api/joblist',
        }

    },

    {
        path: '/admin/jobcategory/company',
        name: 'company',
        component: CompanyComponent,
        meta: {
            pagetitle: 'Job Company Table', dataUrl: 'api/company',
        }

    },
    {
        path: '/admin/employer/profile',
        name: 'employer_profile',
        component: EmployerProfile,
        meta: {
            pagetitle: 'Profile Update', dataUrl: 'api/employer',
        }

    },
    {
        path: '/admin/employer/employerlist',
        name: 'employer',
        component: EmployerForm,
        meta: {
            pagetitle: ' Employer Table', dataUrl: 'api/employer',
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
        path : '/admin/blog/blogcomment',
        name : 'blogcomment',
        component : BlogCommentComponent,
        meta:{pagetitle:'Blog Comment Table',dataUrl:'api/blogcomment',
        }

    },
    {
        path : '/admin/blog/viewblogcomment/:id',
        name : 'viewblogcomment',
        component : ViewBlgoComment,
        meta:{pagetitle:'View Blog Comment Table',dataUrl:'api/blogcomment',}

    },
    {
        path : '/admin/client/partnership',
        name : 'partnership',
        component : Partnership,
        meta:{pagetitle:'Client Partnership Table',dataUrl:'api/partnership',
        }

    },
    {
        path: '/admin/seeker/application',
        name: 'application',
        component: ApplicationComponent,
        meta: {
            pagetitle: 'Application Table', dataUrl: 'api/application',
            
        }

    },
    {
        path: '/admin/role/permissions',
        name: 'Permission',
        component: PermissionComponent,
        meta: {
            pagetitle: 'Permission Table', dataUrl: 'api/permissions',
        }

    },
    {
        path: '/admin/role/rolepermissions',
        name: 'RolePermission',
        component: RolePermissionComponent,
        meta: {
            pagetitle: 'Users Table', dataUrl: 'api/users',
        }

    },
    {
        path: '/admin/role/role',
        name: 'RoleComponent',
        component: RoleComponent,
        meta: {
            pagetitle: 'Role Table', dataUrl: 'api/roles',
        }

    },

    {
        path: '/admin/seeker/application-view/:id',
        name: 'ApplicationView',
        component: ApplicationView,
        meta: {pagetitle: 'Job Application', dataUrl: 'api/application',},
        props: true
    },
    {
        path: '/admin/user/registration',
        name: 'UserRegisComponenet',
        component: UserRegisComponenet,
        meta: {pagetitle: 'User Registration Form', dataUrl: 'api/users',},
        props: true
    },
    {
        path: '/admin/interview',
        name: 'InterviewComponent',
        component: InterviewComponent,
        meta: {pagetitle: 'Interview Schedule', dataUrl: 'api/interview',},
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
    },
    {
        path: '/admin/frontend/manage',
        name: 'frontendmanage',
        component: FrontendManage,
        meta: { pagetitle: 'Frontend Management Table', dataUrl: 'api/frontmanage' },
    } ,
    {
        path: '/admin/frontend/slider',
        name: 'SliderComponent',
        component: SliderComponent,
        meta: { pagetitle: 'Frontend Slider Table', dataUrl: 'api/slider' },
    } ,
    {
        path: '/admin/subscribe/emails',
        name: 'SubscribeEmails',
        component: SubscribeEmails,
        meta: { pagetitle: 'Subscriber SendMail Table', dataUrl: '' },
    } ,
    {
        path: '/admin/soft/setting',
        name: 'setting',
        component: SettingComponent,
        meta: { pagetitle: 'Setting SendMail Table', dataUrl: '/api/setting' },
    } ,
    {
        path: '/admin/seeker/messagetable',
        name: 'MessageTable',
        component: MessageTable,

    } ,
    {
        path: '/admin/seeker/message',
        name: 'MessageComponent',
        component: MessageComponent,

    } ,

];
export default route;