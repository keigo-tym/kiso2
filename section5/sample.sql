create table categories(
    id integer primary key,
    title text
);

insert into categories (id, title) values (1, 'programming');

select * from categories;

update categories set title = 'PG' where id = 1;