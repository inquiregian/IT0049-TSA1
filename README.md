# Tasks for Today Management System

A database-backed task-management application built with CodeIgniter 4. The application provides public task information and authenticated task-management functions with validation, sessions, CSRF protection, and soft deletion.

## Public Pages

- `/` - Displays active tasks scheduled for today
- `/tasks` - Displays all active tasks in chronological order
- `/profile` - Displays the demo user profile
- `/about` - Displays project and developer information
- `/login` - Displays the authentication form

## Protected Task Management

The following functions require a logged-in user:

- Create a new task
- Edit an existing task
- Update task information
- Archive a task
- Log out of the application

Logged-out users who access a protected route are redirected to the login page.

## Features

- CodeIgniter 4 MVC architecture
- MySQL database integration
- User authentication with sessions
- Secure password hashing and verification
- CSRF protection for submitted forms
- Server-side form validation
- Complete task CRUD workflows
- Soft deletion using `is_archived`
- Archived-task exclusion from public pages
- Public read-only pages
- Responsive shared CSS design
- Reusable navigation partial
- Database migration for TSA2 fields

## Demo Login

```text
Username: gcsarmiento
Password: Tsa2Demo123!