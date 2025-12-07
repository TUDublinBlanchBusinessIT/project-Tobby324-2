drop database if exists task_manager;
create database task_manager;
use task_manager;

create table categories (
    id int auto_increment,
    name varchar(50),
    primary key(id)
);

create table tasks (
    id int auto_increment,
    title varchar(100),
    description text,
    status varchar(20),
    category_id int,
    created_at timestamp default current_timestamp,
    primary key(id),
    foreign key(category_id) references categories(id)
);

insert into categories (name) values ('Work');
insert into categories (name) values ('Personal');
insert into categories (name) values ('Urgent');
insert into categories (name) values ('Shopping');