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
