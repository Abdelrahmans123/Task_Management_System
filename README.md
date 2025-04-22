# Task Management System
## Overview
This web-based Task Management System is designed to streamline project and employee management within organizations. It includes modules for project/task management and employee assignments, featuring full CRUD operations, progress tracking, and a dynamic dashboard.
# Features 
- **Secure Authentication:** Users can securely log in with email verification.
- **Role-Based Access Control (RBAC):** Controlled access based on user roles.
- **Project and Task Management:** Create, update, delete projects and tasks.
- **Employee Assignments:** Assign tasks to employees and track assignments.
- **Dynamic Dashboard:** Provides an overview of project and task statuses.
- **Custom Error Handling:** Enhances user experience with informative error messages.
# Technologies Used
- **Backend:** Laravel PHP Framework
- **Frontend:** HTML, CSS, JavaScript,Blade, Bootstrap
- **Database:** MySQL
# Installation
1. Clone the repository
```bash
git clone https://github.com/Abdelrahmans123/Task_Management_System.git
```
2. Install dependencies
```bash
composer install
```
3. Set up your .env file. You can copy the .env.example to .env
```bash
copy .env.example .env
```
4. Set up your database connection in the .env file by updating the database settings
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management_db
DB_USERNAME=root
DB_PASSWORD=
```
5. Generate the application key
```bash
php artisan key:generate
```
6. Run database migrations to create the necessary tables
```bash
php artisan migrate
```
7. Start the Laravel development server
```bash
php artisan serve
```
This will start the server at http://127.0.0.1:8000.
# Contributing
Contributions are welcome! Please fork the repository and submit a pull request with your changes.
# License
This project is licensed under the MIT License.
# Support
For support or inquiries, please contact [sabdelrahman110@gmail.com](mailto:sabdelrahman110@gmail.com).
 

