drop table if exists categories;
create table categories(
  id integer primary key,
  title text
);

insert into categories (id, title) values (1, 'Programming');
insert into categories (id, title) values (2, 'Design');
insert into categories (id, title) values (3, 'Marketing');


drop table if exists courses;
create table courses(
  id integer primary key,
  title text,
  learning_time integer,
  category_id integer
);

insert into courses (id, title, learning_time, category_id) values (1, 'PHP Basic', 30, 1);
insert into courses (id, title, learning_time, category_id) values (2, 'PHP Database', 50, 1);
insert into courses (id, title, learning_time, category_id) values (3, 'Python Basic', 40,  1);
insert into courses (id, title, learning_time, category_id) values (4, 'Web Design', 50, 2);
insert into courses (id, title, learning_time, category_id) values (5, 'Japan''s History', 100, null);

select id, title, learning_time from courses;
select title, learning_time, id from courses;
select title as course_title, learning_time from courses;
select * from courses;

select * from courses where learning_time = 50;
select * from courses where learning_time = 50 and category_id = 1;
select * from courses where learning_time = 50 or category_id = 1;
select * from courses where not learning_time = 50;

select * from courses where learning_time in (30, 50, 100);
select * from courses where learning_time = 30 or learning_time = 50 or learning_time = 100;

select * from courses where learning_time between 30 and 50;
select * from courses where learning_time >= 30 and learning_time <= 50;

select * from courses where category_id is null;
select * from courses where category_id = null;

select * from courses where title like 'PHP%';
select * from courses where title like '%Basic';
select * from courses where title like '____D%';

select * from courses order by learning_time;
select * from courses order by learning_time desc;
select * from courses order by learning_time asc;
select * from courses order by learning_time desc, id desc;
select * from courses where learning_time >= 50 order by id desc;