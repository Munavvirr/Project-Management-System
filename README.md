# Project-Management-System

Note: This web application was developed for a client. I'm sharing this code since this application was taken down.

Project Management System is a comprehensive web application designed to streamline assignment management and collaboration among various user roles. The system caters to four primary user types: Admin, Inspector, Employees, and Customers. The platform facilitates seamless assignment submission, tracking, completion, and interaction between these user categories.

# Basic Concept:

The platform revolves around the core concept of facilitating the assignment lifecycle. Customers upload their assignments, which are then accessible to employees, admins, and inspectors for review and action. Once the assignments are completed, employees upload the solutions, and customers can download the resolved files. Admins and inspectors have additional functionalities to manage projects, customers, and employees effectively.

# Application Screenshot:

![image](https://github.com/Munavvirr/Project-Management-System/assets/72682848/afc3f89d-87c6-4932-8a0b-1d6a4fef6e73)


#Pages and Functionality

Registration and Login
1. Registration Page: New users can register by providing essential details, including username, phone number, email address, and password.
2. Customer Login: Existing customers can log in to access their accounts.
3. Employee Registration: New employees can register their profiles.
4. Admin & Inspector Login: Admins and inspectors have a dedicated login page.
5. Employee Login: Employees can log in to access their accounts.

User Dashboards
1. Home Page:
- Tracks assignment progress.
- Displays upload status:
  - No uploaded assignment (prompts users to upload).
  - Assignment in progress.
  - Completed project.
- Directs to the "Upload Assignment" page if no assignment is uploaded.
2. Upload Assignment:
- Allows users to provide assignment details.
- Fields include username, phone number, school/university name, project name, subject name.
- Enables file upload for the assignment.

Admin Dashboard
1. Home Page:
- Assigns customer assignments to employees.
- Shows assigned assignments and work in progress.
- Displays revenue analytics using charts.
- Lists projects currently in progress.
2. Admin Panel:
- Displays project database with project details.
- Allows admin to edit project details.
- Filters the database based on date range for reporting.

Employee Dashboard
1. Home Page:
- Lists pending assignments assigned by admin/inspector.
- Provides project details and files.
- Enables file upload after completion.

Inspector Dashboard
1. Home Page:
- Assigns assignments to employees.
- Shows assigned assignments.
- Manages employees.
- Provides an overview of company progress.

Project Features
- Streamlined registration and login process for different user roles.
- Intuitive dashboards tailored to each user type for efficient task management.
- Assignment progress tracking and status updates.
- Assignment submission and resolution through secure file uploads.
- Admin capabilities for assignment allocation and revenue tracking.
- Data visualization for revenue analytics.
- Inspector role for assignment delegation and company oversight.

Future Enhancements
- Real-time collaboration features for employees and customers.
- Enhanced data analytics and visualization for better decision-making.
- Automated assignment notifications and reminders.
- Integration with third-party tools for seamless workflow.

Technologies Used:
Frontend: HTML, CSS, JavaScript
Backend: PHP
Database: SQL (SQLite)
Data Visualization: Chart.js

Note: This is a summarized overview of the project. Detailed documentation, code, and instructions can be found in the respective project repositories
