
use tea_renaissance;

create table tea(
	prod_id varchar(128),
    prod_name varchar(128),
    prod_year year,
    technic enum('raw', 'ripe'),
    weight varchar(32),
    
    primary key(prod_id)
)default charset='utf8';

select * from tea
alter table tea add column brand varchar(32)
update tea set brand='陈升号' where prod_id='SN001'
s
create table price(
	prod_id varchar(128),
    price_year year,
    price decimal(10, 2),
    
    foreign key(prod_id) references tea(prod_id)
)default charset='utf8';

drop table price

select * from price where prod_id in ('SN001');
insert into tea values('SN001', '银班章', 2014, 'raw', '357')
insert into tea values('SN002', '金班章', 2014, 'raw', '357')

insert into price values('SN001', 2014, 780);
insert into price values('SN001', 2015, 880);
insert into price values('SN001', 2016, 900);
insert into price values('SN002', 2014, 980)

select * from tea inner join price on tea.prod_id=price.prod_id  group by tea.prod_id having price_year=max(price_year)

select prod_id, price, max(price_year) from price group by prod_id having max(price_year)

select *, max(price_year) from tea inner join price on tea.prod_id=price.prod_id group by tea.prod_id

select * from price group by prod_id

select * from tea left join price on tea.prod_id=price.prod_id and price_year=2016

create or replace view ordered_price_view as select * from price order by price_year desc
select * from ordered_price_view group by prod_id order by price_year

select count(price), prod_id, price from price group by prod_id having price>800
select * from price where price>800 group by prod_id 

select * from tea inner join ordered_price_view on tea.prod_id=ordered_price_view.prod_id  group by tea.prod_id

select * from tea left join price on tea.prod_id=price.prod_id and price_year=2016 where tea.prod_id="SN001"


create table tea_demo(
	prod_id varchar(128),
    prod_name varchar(128),
    prod_year year,
    technic enum('raw', 'ripe'),
    weight varchar(32),
    
    primary key(prod_id)
)default charset='utf8';
select * from tea_demo

create table teacopy like tea;
insert into teacopy select * from tea;

create table pricecopy like price;

load data local infile '/Users/albert/Downloads/t1.txt' into table tea character set utf8 fields terminated by '\t';
load data local infile '/Users/albert/Downloads/t2.txt' into table price character set utf8 fields terminated by '\t';

select * from tea
select * from pricecopy
delete from pricecopy

select * from mysql.user;
