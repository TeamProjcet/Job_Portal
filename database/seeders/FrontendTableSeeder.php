<?php

namespace Database\Seeders;

use App\Http\Controllers\FrontendStaticContentController;
use App\Models\Frontendmanage;
use App\Models\FrontendStaticContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrontendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrFrontend=[
//            Contact Section
            'location'=>'631/5, TMSS Bhaban (5th floor), West Kazilpara, Mirpur-10, Dhaka-1216, Dhaka, Bangladesh',
            'email'=>'admin@tmss-ict.com',
            'phone'=>'018933******',
            'map'=>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d467269.85203977005!2d90.371239!3d23.799186!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d20d6ab031%3A0x9b156afb312d6fba!2sTMSS%20Head%20Office!5e0!3m2!1sen!2sus!4v1726932213993!5m2!1sen!2sus',
            'facebook'=>'https://www.facebook.com/tmssictdomain',
            'youtube'=>'https://www.youtube.com/@tmssict7109',
            'linkedin'=>'https://bd.linkedin.com/in/tmssict',
            'twitter'=>'https://bd/in/tmssict',
            //about Section
            'image'=>'/uploads/Screenshot from 2024-09-30 21-57-42.png',
            'title'=>'We Help To Get The Best Job And Find A Talent',
            'details'=>'At Job Portal, we specialize in connecting individuals with their ideal job opportunities and helping organizations find exceptional talent. Our dedicated team leverages industry insights, personalized coaching, and a vast network to ensure that job seekers not only find roles that align with their skills and passions but also thrive in their careers.Talent Sourcing and Screening Comprehensive Recruitment Solutions Employer Branding Services',

        ];
        $arrStatic=[
            [
                'key'=>'newsletter',
                'value'=>'Here\'s an improved footer design for your Vue.js application that maintains functionality while enhancing the visual appeal. This design focuses on a cleaner layout, responsive styling, and better alignment for the various sections.'
            ],
            [
                'key'=>'contlocation',
                'value'=>'631/5, TMSS Bhaban (5th floor), West Kazilpara, Mirpur-10, Dhaka-1216, Dhaka, Bangladesh'
            ],
            [
                'key'=>'contemail',
                'value'=>'jobportal@gmail.com'
            ],
            [
                'key'=>'contphone',
                'value'=>'0189333*****'
            ],
            [
                'key'=>'contmap',
                'value'=>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d467269.85203977005!2d90.371239!3d23.799186!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d20d6ab031%
                3A0x9b156afb312d6fba!2sTMSS%20Head%20Office!5e0!3m2!1sen!2sus!4v1726932213993!5m2!1sen!2sus'
            ],
            [
                'key'=>'aboutTitle',
                'value'=>'We Help To Get The Best Job And Find A Talent'
            ],
            [
                'key'=>'aboutDetails',
                'value'=>'At Job Portal, we specialize in connecting individuals with their ideal job 
                opportunities and helping organizations find exceptional talent. Our dedicated team 
                leverages industry insights, personalized coaching, and a vast network to ensure that 
                job seekers not only find roles that align with their skills and passions but also thrive in their careers.Talent
                 Sourcing and Screening Comprehensive Recruitment Solutions Employer Branding Services'
            ],
            [
                'key'=>'aboutimage1',
                'value'=>'https://img.freepik.com/free-vector/man-having-online-job-interview_52683-43379.jpg?t=st=1729759111~exp=1729762711~hmac=a73b8cb191213271c645bf782ee057a9c93324f49ebbdae27b0b172f270306fc&w=740'
            ],   [
                'key'=>'aboutimage2',
                'value'=>'https://img.freepik.com/premium-photo/recruiter-updating-companys-job-portal-highlighting-hiring-process_1266280-82495.jpg?w=1380'
            ],
            [
                'key'=>'aboutimage3',
                'value'=>'https://img.freepik.com/premium-photo/3d-job-search-portal-businesses_541443-6867.jpg?w=740'
            ],
            [
                'key'=>'aboutimage4',
                'value'=>'https://img.freepik.com/premium-photo/job-search-concept-find-your-career-business-man-looking-online-website_1241984-2900.jpg?w=1380'
            ],
        ];


        Frontendmanage::truncate();
        FrontendStaticContent::truncate();

        Frontendmanage::insert($arrFrontend);
        FrontendStaticContent::insert($arrStatic);
    }
}
