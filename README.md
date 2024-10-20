# Job Portal Site

Welcome to the Job Portal Site! This application provides a comprehensive platform for job seekers to find and apply for jobs, manage their profiles, and engage with our blog. Employers can manage job postings and applications efficiently through the backend.

## Features

### Frontend

- **User Registration and Login**: Users must register and log in to apply for jobs and comment on blogs.
- **Job Application**: Users can apply for any available job listings after logging in.
- **Job Search**: Search for jobs, companies, and keywords with filtering options.
- **Job Categories**: Explore job listings by categories for better organization.
- **Client Section**: Information about clients and partnerships.
- **Blog Section**: Anyone can view blogs, but only registered users can comment.
- **Contact Us**: Users can contact us via email without needing to log in.
- **Footer Links**: Includes company information, important links, contact details, and a newsletter subscription.
- **User Profile**: Users can update their profile, including image, address, and email. They can view their saved jobs, apply for jobs, and see the status of their applications (pending, approved, rejected) and interview details.

### Menus

- Home
- About
- Contact
- Job Listings
- Login

### Backend

- **Job Management**: Admins can create, edit, delete, and update job categories, companies, and job postings.
- **Blog Management**: Admins can create blog posts and view comments made by users.
- **Application Management**: Admins can view job applications and manage the status (approve or reject) based on education, skills, experience, or CV format.
- **Role-Permission System**: Admins can manage user roles and permissions for secure access.
- **Visitor Management**:
  - **Contact Management**: Manage user inquiries submitted through the contact form.
  - **Newsletter Management**: View, delete, or manage newsletter subscriptions and inquiries related to the newsletter.
- **Partnerships Management**: Manage client partnerships, including posting, updating, or deleting client information.

## Prerequisites 🔒

Before you begin, ensure you have met the following requirements:

- PHP (8.0 - 8.3)
- Laravel 9
- Vue 2
- MySQL
- Mix
- Axios
- TinyMCE
- SweetAlert2
- Toastr
- Bootstrap
- NPM (Node.js)
- Vee-Validate
- Vuex
- Vue Router

## Default Login Credentials 🔑

- **Superadmin**:
  - **Email**: superadmin@gmail.com
  - **Password**: 1234

- **Admin**:
  - **Email**: admin@gmail.com
  - **Password**: 1234

- **Editor**:
  - **Email**: edior@gmail.com
  - **Password**: 1234
 

</br></br></br></br>
## Getting Started 🚀

To get started with the Job Portal Site, follow these instructions:

### Installation
------------------


1. Clone the Project.
- **Make Folder Location:**
    
    ```jsx
    git clone <repository-url>
   cd job-portal
    ```
    
</br></br>
- **env file create from .env.example:**
    ````jsx
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=job_portal
    DB_USERNAME=root
    DB_PASSWORD=root
    ````
</br>

-  **Check your PHP version**
    
    ```jsx
    php -v
    ```
    
</br></br>

- **Local PHP and project PHP file check, make to same**:
    - Check the PHP version required by the project (usually in the `composer.json` file under `platform` or `require`):
        
        ```jsx
           sudo apt install php8.1  # Replace with the version you need
        ```
        
        ```jsx
           sudo apt update
        ```
        
 </br></br>
- **Composer update:**
    - Run this to update your dependencies:
    
    ```bash
    
    composer update

     ```
  </br>  
    - If you don’t have Composer installed:
    
    ```bash
    
    sudo apt install composer
    ```
    
</br></br>
- Key generate:
    
    ```jsx
    php artisan key:generate
    ```



</br></br>   
2. Install the frontend dependencies:
    ```bash
    
    cd frontend
    npm install

</br></br>
3. Set up the backend:
    Configure your .env file with the database settings.
    Run the migrations:
        ```bash
   
        php artisan migrate

</br></br>
4. Start the servers:
    Frontend:
        ```bash
        
        npm run serve
</br></br>
 5. Backend:
        ````bash
   
        php artisan serve

        
Contributing
Contributions are welcome! Please submit a pull request or open an issue to discuss changes.
