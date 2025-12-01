CREATE DATABASE IF NOT EXISTS task_manager;
USE task_manager;

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    status VARCHAR(20) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

INSERT INTO tasks (title, description, status) VALUES
('Setup Project', 'Initialize the task manager project', 'completed'),
('Create Database', 'Design and create database schema', 'completed'),
('Build Frontend', 'Create HTML forms and pages', 'pending');