# Task Manager

A web-based task management system using PHP, MySQL and Bootstrap.

## Description

This application allows users to manage tasks through a web interface with full CRUD operations. Tasks can be categorized, tracked by status, and managed efficiently.

## Features

- Add tasks with title, description, category and status
- View all tasks in a formatted table with alternating row colors
- Edit existing tasks including category changes
- Delete tasks with automatic redirect
- Category management with dropdown selection
- PHP sessions for secure data handling
- Object-oriented programming with Task class
- Navigation menu across all pages
- Form validation on all inputs
- Database relationships using foreign keys

## Technology Stack

- PHP (procedural and OOP)
- MySQL with foreign key relationships
- Bootstrap 3.4.1 for responsive design
- MySQLi for database operations
- HTML5 forms with validation

## Database Structure

**Tables:**
- `tasks` - stores task information with foreign key to categories
- `categories` - stores task categories

**Relationships:**
- One-to-many relationship (categories → tasks)
- Uses LEFT JOIN to display category names

## Setup Instructions

1. Import database: `sql/createDBV2.sql`
2. Update `dbcon.php` with your database credentials (default port 3306)
3. Access via `http://localhost/task-manager/taskForm.php`

## File Structure
```
task-manager/
├── dbcon.php           # Database connection
├── header.php           # Navigation menu
├── taskClass.php        # Task class definition
├── taskForm.php         # Add task form
├── processTask.php      # Form processing with sessions and class
├── viewTasks.php        # Display all tasks
├── editTask.php         # Edit task form
├── deleteTask.php       # Delete task handler
└── sql/
    ├── createDBV1.sql   # Initial database
    └── createDBV2.sql   # Database with categories
```

## Development Progress

- V1: Initial project setup with README
- V1: Add database setup and dbconuration
- V1: Add task insertion functionality
- V2: Update database connection
- V2: Add view all tasks functionality
- V3: Add edit task functionality
- V3: Add delete task functionality
- V4: Add categories table with foreign key relationship
- V4: Add category dropdown populated from database
- V5: Update edit functionality to include category selection
- V5: Add Task class for object-oriented processing
- V6: Add navigation menu across all pages
- V6: Add form validation, improve styling and user flow



