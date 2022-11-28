create table categories(
    id integer primary key,
    title text
);

drop table categories;

insert into categories (id, title) values (1, 'Programming');
insert into categories (id, title) values (2, 'Design');
insert into categories (id, title) values (3, 'Marketing');

insert into categories (id, title) values (3, 'Music');

select * from categories;

select id, title from categories;
select id, title categories from categories where id >= 2;
select id, title categories from categories order by title;

update categories set title = 'PG' where id = 1;

update categories set id = 100, title = 'PG' where id = 1;
update categories set title = 'Test';

delete from categories where id = 1;
