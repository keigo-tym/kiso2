select title from categories where id = 2;

select * from categories where title like '%ing';

select * from categories order by id desc;

select upper(title) as u_title from categories;
select upper(title) u_title from categories;

select count(title) category_count from categories;
select count(*) category_count from categories;

select * from categories where id = (select max(id) from categories);

select ca.title category_title, co.title course_title from categories ca inner join courses co on ca.id = co.category_id;