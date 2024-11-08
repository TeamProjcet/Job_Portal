<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\JobPostModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrJob = [
            [
                'user_id' => 1,
                'category_id' => 1,
                'company_id' => 1,
                'position' => 'Senior Developer',
                'address' => 'Dhaka',
                'image' => '/uploads/dev1.png',
                'details' => 'Develop high-quality software',
                'salary' => 30000,
                'job_type' => 2,
                'date_time' => '2024-10-01',
                'status' => 1,
                'vacancy' => 5,
            ],
            [
                'user_id' => 2,
                'category_id' => 4,
                'company_id' => 2,
                'position' => 'Junior Developer',
                'address' => 'Chittagong',
                'image' => '/uploads/dev2.png',
                'details' => 'Assist in software development',
                'salary' => 20000,
                'job_type' => 1,
                'date_time' => '2024-10-02',
                'status' => 1,
                'vacancy' => 3,
            ],
            [
                'user_id' => 3,
                'category_id' => 3,
                'company_id' => 3,
                'position' => 'Marketing Manager',
                'address' => 'Sylhet',
                'image' => '/uploads/marketing1.png',
                'details' => 'Lead marketing campaigns',
                'salary' => 25000,
                'job_type' => 3,
                'date_time' => '2024-10-03',
                'status' => 1,
                'vacancy' => 7,
            ],
            [
                'user_id' => 1,
                'category_id' => 4,
                'company_id' => 1,
                'position' => 'Data Analyst',
                'address' => 'Khulna',
                'image' => '/uploads/data1.png',
                'details' => 'Analyze and interpret data',
                'salary' => 27000,
                'job_type' => 1,
                'date_time' => '2024-10-04',
                'status' => 1,
                'vacancy' => 4,
            ],
            [
                'user_id' => 2,
                'category_id' => 5,
                'company_id' => 3,
                'position' => 'Project Manager',
                'address' => 'Rajshahi',
                'image' => '/uploads/project1.png',
                'details' => 'Oversee project deliverables',
                'salary' => 40000,
                'job_type' => 2,
                'date_time' => '2024-10-05',
                'status' => 1,
                'vacancy' => 2,
            ],
            [
                'user_id' => 3,
                'category_id' => 6,
                'company_id' => 2,
                'position' => 'HR Manager',
                'address' => 'Barishal',
                'image' => '/uploads/hr1.png',
                'details' => 'Manage human resources',
                'salary' => 35000,
                'job_type' => 3,
                'date_time' => '2024-10-06',
                'status' => 1,
                'vacancy' => 6,
            ],
            [
                'user_id' => 1,
                'category_id' => 4,
                'company_id' => 1,
                'position' => 'Content Writer',
                'address' => 'Comilla',
                'image' => '/uploads/content1.png',
                'details' => 'Write and edit content',
                'salary' => 15000,
                'job_type' => 1,
                'date_time' => '2024-10-07',
                'status' => 1,
                'vacancy' => 10,
            ],
            [
                'user_id' => 2,
                'category_id' => 2,
                'company_id' => 3,
                'position' => 'Graphic Designer',
                'address' => 'Rangpur',
                'image' => '/uploads/graphic1.png',
                'details' => 'Design digital assets',
                'salary' => 22000,
                'job_type' => 2,
                'date_time' => '2024-10-08',
                'status' => 1,
                'vacancy' => 8,
            ],
            [
                'user_id' => 3,
                'category_id' => 4,
                'company_id' => 2,
                'position' => 'IT Support',
                'address' => 'Gazipur',
                'image' => '/uploads/it1.png',
                'details' => 'Provide technical support',
                'salary' => 18000,
                'job_type' => 1,
                'date_time' => '2024-10-09',
                'status' => 1,
                'vacancy' => 5,
            ],
            [
                'user_id' => 1,
                'category_id' => 3,
                'company_id' => 1,
                'position' => 'Sales Executive',
                'address' => 'Jessore',
                'image' => '/uploads/sales1.png',
                'details' => 'Lead sales initiatives',
                'salary' => 20000,
                'job_type' => 2,
                'date_time' => '2024-10-10',
                'status' => 1,
                'vacancy' => 15,
            ],
            [
                'user_id' => 2,
                'category_id' => 3,
                'company_id' => 2,
                'position' => 'Operations Manager',
                'address' => 'Bogura',
                'image' => '/uploads/operations1.png',
                'details' => 'Manage day-to-day operations',
                'salary' => 50000,
                'job_type' => 3,
                'date_time' => '2024-10-11',
                'status' => 1,
                'vacancy' => 3,
            ],
            [
                'user_id' => 3,
                'category_id' => 2,
                'company_id' => 3,
                'position' => 'UI/UX Designer',
                'address' => 'Narayanganj',
                'image' => '/uploads/uiux1.png',
                'details' => 'Design user interfaces and experiences',
                'salary' => 30000,
                'job_type' => 1,
                'date_time' => '2024-10-12',
                'status' => 1,
                'vacancy' => 7,
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'company_id' => 1,
                'position' => 'Backend Developer',
                'address' => 'Barishal',
                'image' => '/uploads/backend1.png',
                'details' => 'Develop and manage backend systems',
                'salary' => 35000,
                'job_type' => 2,
                'date_time' => '2024-10-13',
                'status' => 1,
                'vacancy' => 5,
            ],
            [
                'user_id' => 2,
                'category_id' => 3,
                'company_id' => 2,
                'position' => 'Front-end Developer',
                'address' => 'Mymensingh',
                'image' => '/uploads/frontend1.png',
                'details' => 'Create and maintain web interfaces',
                'salary' => 28000,
                'job_type' => 3,
                'date_time' => '2024-10-14',
                'status' => 1,
                'vacancy' => 6,
            ],
            [
                'user_id' => 3,
                'category_id' => 2,
                'company_id' => 3,
                'position' => 'SEO Specialist',
                'address' => 'Noakhali',
                'image' => '/uploads/seo1.png',
                'details' => 'Optimize websites for search engines',
                'salary' => 25000,
                'job_type' => 1,
                'date_time' => '2024-10-15',
                'status' => 1,
                'vacancy' => 9,
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'company_id' => 2,
                'position' => 'System Admin',
                'address' => 'Khulna',
                'image' => '/uploads/sysadmin1.png',
                'details' => 'Manage system infrastructures',
                'salary' => 37000,
                'job_type' => 2,
                'date_time' => '2024-10-16',
                'status' => 1,
                'vacancy' => 4,
            ],
//            zjcvlxv
            [
                'user_id' => 1,
                'category_id' => 7, // Content Writing
                'company_id' => 1,
                'position' => 'Content Strategist',
                'address' => 'Dhaka',
                'image' => '/uploads/content_strategist.png',
                'details' => 'Develop and implement content strategies. Requirements: Excellent writing skills, experience in content marketing, knowledge of SEO.',
                'salary' => 30000,
                'job_type' => 2,
                'date_time' => '2024-10-17',
                'status' => 1,
                'vacancy' => 2,
            ],
            [
                'user_id' => 2,
                'category_id' => 7,
                'company_id' => 2,
                'position' => 'Copywriter',
                'address' => 'Chittagong',
                'image' => '/uploads/copywriter.png',
                'details' => 'Write clear and persuasive copy for various mediums. Requirements: Strong writing skills, creativity, and attention to detail.',
                'salary' => 25000,
                'job_type' => 1,
                'date_time' => '2024-10-18',
                'status' => 1,
                'vacancy' => 3,
            ],
            [
                'user_id' => 3,
                'category_id' => 7,
                'company_id' => 3,
                'position' => 'Blog Writer',
                'address' => 'Sylhet',
                'image' => '/uploads/blog_writer.png',
                'details' => 'Create engaging blog posts on various topics. Requirements: Research skills, ability to write in a conversational tone, and knowledge of blogging best practices.',
                'salary' => 20000,
                'job_type' => 1,
                'date_time' => '2024-10-19',
                'status' => 1,
                'vacancy' => 4,
            ],
            [
                'user_id' => 1,
                'category_id' => 7,
                'company_id' => 1,
                'position' => 'Technical Writer',
                'address' => 'Rajshahi',
                'image' => '/uploads/technical_writer.png',
                'details' => 'Create manuals and documentation for technical products. Requirements: Strong technical knowledge, ability to write clearly, and experience with documentation tools.',
                'salary' => 32000,
                'job_type' => 2,
                'date_time' => '2024-10-20',
                'status' => 1,
                'vacancy' => 1,
            ],

            [
                'user_id' => 2,
                'category_id' => 8, // SEO
                'company_id' => 2,
                'position' => 'SEO Specialist',
                'address' => 'Chittagong',
                'image' => '/uploads/seo_specialist.png',
                'details' => 'Optimize website for search engines and improve rankings. Requirements: Knowledge of SEO tools, analytical skills, and experience with on-page and off-page SEO.',
                'salary' => 25000,
                'job_type' => 1,
                'date_time' => '2024-10-21',
                'status' => 1,
                'vacancy' => 3,
            ],
            [
                'user_id' => 3,
                'category_id' => 8,
                'company_id' => 1,
                'position' => 'SEO Analyst',
                'address' => 'Dhaka',
                'image' => '/uploads/seo_analyst.png',
                'details' => 'Analyze website data and SEO performance. Requirements: Strong analytical skills, knowledge of Google Analytics, and experience with SEO metrics.',
                'salary' => 28000,
                'job_type' => 2,
                'date_time' => '2024-10-22',
                'status' => 1,
                'vacancy' => 2,
            ],
            [
                'user_id' => 1,
                'category_id' => 8,
                'company_id' => 3,
                'position' => 'Link Building Specialist',
                'address' => 'Sylhet',
                'image' => '/uploads/link_building_specialist.png',
                'details' => 'Build and maintain backlinks for better SEO. Requirements: Strong networking skills, experience with link building strategies, and knowledge of SEO tools.',
                'salary' => 23000,
                'job_type' => 1,
                'date_time' => '2024-10-23',
                'status' => 1,
                'vacancy' => 4,
            ],
            [
                'user_id' => 2,
                'category_id' => 8,
                'company_id' => 2,
                'position' => 'Content SEO Specialist',
                'address' => 'Rajshahi',
                'image' => '/uploads/content_seo_specialist.png',
                'details' => 'Create SEO-friendly content and improve visibility. Requirements: Strong writing skills, knowledge of SEO principles, and ability to conduct keyword research.',
                'salary' => 30000,
                'job_type' => 2,
                'date_time' => '2024-10-24',
                'status' => 1,
                'vacancy' => 1,
            ],
            [
                'user_id' => 3,
                'category_id' => 8,
                'company_id' => 1,
                'position' => 'Local SEO Specialist',
                'address' => 'Khulna',
                'image' => '/uploads/local_seo_specialist.png',
                'details' => 'Optimize local search rankings for businesses. Requirements: Knowledge of local SEO strategies, experience with Google My Business, and strong communication skills.',
                'salary' => 27000,
                'job_type' => 1,
                'date_time' => '2024-10-25',
                'status' => 1,
                'vacancy' => 2,
            ],

            [
                'user_id' => 1,
                'category_id' => 9, // Sales
                'company_id' => 1,
                'position' => 'Sales Manager',
                'address' => 'Sylhet',
                'image' => '/uploads/sales_manager.png',
                'details' => 'Manage the sales team and develop sales strategies. Requirements: Strong leadership skills, experience in sales management, and excellent communication abilities.',
                'salary' => 40000,
                'job_type' => 2,
                'date_time' => '2024-10-26',
                'status' => 1, // Active
                'vacancy' => 5,
            ],
            [
                'user_id' => 2,
                'category_id' => 9,
                'company_id' => 2,
                'position' => 'Sales Executive',
                'address' => 'Dhaka',
                'image' => '/uploads/sales_executive.png',
                'details' => 'Generate leads and close sales. Requirements: Excellent communication skills, proven sales experience, and ability to work independently.',
                'salary' => 22000,
                'job_type' => 1,
                'date_time' => '2024-10-27',
                'status' => 1,
                'vacancy' => 3,
            ],
            [
                'user_id' => 3,
                'category_id' => 9,
                'company_id' => 3,
                'position' => 'Sales Coordinator',
                'address' => 'Chittagong',
                'image' => '/uploads/sales_coordinator.png',
                'details' => 'Coordinate sales activities and support the sales team. Requirements: Strong organizational skills, experience in sales support, and ability to multitask.',
                'salary' => 24000,
                'job_type' => 2,
                'date_time' => '2024-10-28',
                'status' => 1,
                'vacancy' => 2,
            ],

            [
                'user_id' => 1,
                'category_id' => 10, // IT Support
                'company_id' => 4,
                'position' => 'IT Technician',
                'address' => 'Rajshahi',
                'image' => '/uploads/it_technician.png',
                'details' => 'Provide technical support and troubleshooting. Requirements: Knowledge of hardware and software troubleshooting, excellent communication skills, and relevant certifications.',
                'salary' => 22000,
                'job_type' => 1,
                'date_time' => '2024-10-29',
                'status' => 1, // Active
                'vacancy' => 6,
            ],
            [
                'user_id' => 2,
                'category_id' => 10,
                'company_id' => 5,
                'position' => 'Help Desk Support',
                'address' => 'Khulna',
                'image' => '/uploads/help_desk_support.png',
                'details' => 'Assist users with technical issues and provide solutions. Requirements: Strong problem-solving skills, customer service experience, and knowledge of IT systems.',
                'salary' => 20000,
                'job_type' => 2,
                'date_time' => '2024-10-30',
                'status' => 1,
                'vacancy' => 4,
            ],
            [
                'user_id' => 3,
                'category_id' => 10,
                'company_id' => 6,
                'position' => 'System Administrator',
                'address' => 'Chittagong',
                'image' => '/uploads/system_administrator.png',
                'details' => 'Ensure system availability and security. Requirements: Strong knowledge of system administration, troubleshooting skills, and relevant certifications.',
                'salary' => 30000,
                'job_type' => 1,
                'date_time' => '2024-11-01',
                'status' => 1,
                'vacancy' => 3,
            ],
            [
                'user_id' => 2,
                'category_id' => 10,
                'company_id' => 4,
                'position' => 'Technical Support Engineer',
                'address' => 'Rajshahi',
                'image' => '/uploads/technical_support_engineer.png',
                'details' => 'Provide technical assistance and support to customers. Requirements: Excellent communication skills, experience in technical support, and ability to work under pressure.',
                'salary' => 25000,
                'job_type' => 2,
                'date_time' => '2024-11-02',
                'status' => 1,
                'vacancy' => 2,
            ],
            [
                'user_id' => 3,
                'category_id' => 10,
                'company_id' => 6,
                'position' => 'IT Support Specialist',
                'address' => 'Sylhet',
                'image' => '/uploads/it_support_specialist.png',
                'details' => 'Assist in IT-related issues and support. Requirements: Strong technical knowledge, customer service skills, and relevant experience.',
                'salary' => 27000,
                'job_type' => 1,
                'date_time' => '2024-11-03',
                'status' => 1,
                'vacancy' => 1,
            ],
        ];





        $arrcompany = [
            [
                'name' => 'Tech Innovations Ltd',
                'status' => 1,
            ],
            [
                'name' => 'Green Solutions Inc',
                'status' => 1,
            ],
            [
                'name' => 'Creative Designs Co',
                'status' => 1,
            ],
            [     'name' => 'IT Support Co.',
                'status' => 1,
            ],
            [
                'name' => 'SEO Masters',
                'status' => 1,
            ],
            [
                'name' => 'Sales Experts',
                'status' => 1,
            ],
        ];

        $arrcategory = [
            [
                'name' => 'Software Development',
                'image' => '/uploads/software_development.png',
            ],
            [
                'name' => 'Design',
                'image' => '/uploads/design.png',
            ],
            [
                'name' => 'Marketing',
                'image' => '/uploads/marketing.png',
            ],
            [
                'name' => 'Data Analysis',
                'image' => '/uploads/data_analysis.png',
            ],
            [
                'name' => 'Human Resources',
                'image' => '/uploads/human_resources.png',
            ],
            [
                'name' => 'Project Management',
                'image' => '/uploads/project_management.png',
            ],
            [
                'name' => 'Content Writing',
                'image' => '/uploads/content_writing.png',
            ],
            [
                'name' => 'SEO',
                'image' => '/uploads/seo.png',
            ],
            [
                'name' => 'Sales',
                'image' => '/uploads/sales.png',
            ],
            [
                'name' => 'IT Support',
                'image' => '/uploads/it_support.png',
            ],
        ];


        JobPostModel::truncate();
        Company::truncate();
        Category::truncate();
        Company::insert($arrcompany);
        Category::insert($arrcategory);
        JobPostModel::insert($arrJob);
    }
}
