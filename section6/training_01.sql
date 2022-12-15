select title from categories where id = 2;

select * from categories where title like '%ing';

select * from categories order by id desc;

select upper(title) as u_title from categories;
select upper(title) u_title from categories;

select count(title) category_count from categories;
select count(*) category_count from categories;

select * from categories where id = (select max(id) from categories);

select ca.title category_title, co.title course_title from categories ca inner join courses co on ca.id = co.category_id;

select ca.title category_title, co.title course_title from categories ca inner join courses co on ca.id = co.category_id where ca.id = 1;

select ca.title category_title, co.title course_title from courses co left outer join categories ca on co.category_id = ca.id;

select ca.title, count(co.id) course_count from categories ca left outer join courses co on ca.id = co.category_id group by ca.title order by course_count desc;