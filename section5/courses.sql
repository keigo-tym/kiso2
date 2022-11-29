create table courses(
    id integer primary key,
    title text,
    learning_time integer,
    category_id integer
);

insert into courses (id, title, learning_time, category_id) values (1, 'PHP Basic', 30, 1);
insert into courses (id, title, learning_time, category_id) values (2, 'PHP Database', 20, 1);
insert into courses (id, title, learning_time, category_id) values (3, 'Python Basic', 30, 1);
insert into courses (id, title, learning_time, category_id) values (4, 'Web Design', 50, 2);

select * from courses;
select id, title, learning_time, category_id from courses where id = 4;
select * from courses where id = 4;

update courses set learning_time = 100 where id = 4;

delete from courses where id = 4;