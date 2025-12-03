drop database if exists task_manager;
create database task_manager;
use task_manager;
create table tasks (
    id int auto_increment,
    title varchar(100),
    description text,
    status varchar(20),
    created_at timestamp default current_timestamp,
    primary key(id)
);