# Tasks for Today Management System

A database-backed task-management application created with CodeIgniter 4. The system separates tasks scheduled for the current day from the complete task list and also provides a demo user profile and developer information page.

## Pages

- `/` - Displays only tasks scheduled for today
- `/tasks` - Displays every task ordered by date
- `/profile` - Displays the single demo user
- `/about` - Identifies the developer and describes the project

## Features

- CodeIgniter 4 MVC structure
- MySQL database integration
- TaskModel and UserModel
- Date-based task filtering
- Complete task listing ordered by date
- Single demo user profile
- Responsive shared CSS design
- Four working routes

## Database

The application uses a MySQL database named:

```text
tasks_today_db
```

It contains:

- `tasks` - Eight task records spanning three dates
- `users` - One demo user record

The database export is available at:

```text
database/tasks_today_db.sql
```

## Requirements

- PHP 8.1 or newer
- Composer
- MySQL or XAMPP
- CodeIgniter 4

## Setup Instructions

1. Clone or download this repository.

2. Open the project folder in a terminal.

3. Install the required dependencies:

   ```bash
   composer install
   ```

4. Copy the `env` file and rename the copy to `.env`.

5. Create a MySQL database named:

   ```text
   tasks_today_db
   ```

6. Import:

   ```text
   database/tasks_today_db.sql
   ```

7. Configure the database section of `.env`:

   ```ini
   database.default.hostname = localhost
   database.default.database = tasks_today_db
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.DBPrefix =
   database.default.port = 3306
   ```

8. Set the environment:

   ```ini
   CI_ENVIRONMENT = development
   ```

9. Start the development server:

   ```bash
   php spark serve
   ```

10. Open:

    ```text
    http://localhost:8080
    ```

## Developer

Gian Carlo Sarmiento  
IT0049 - Web System Technologies

## Live Application

https://sarmiento-tasks.great-site.net

## GitHub Repository

https://github.com/inquiregian/IT0049-TSA1