
use tea_renaissance;

create table user(
	id int not null unique auto_increment,
    name varchar(255) not null,
    sex char(1),
    mobile char(13) not null unique,
    tea_age int,
    amount int not null,
    created timestamp DEFAULT CURRENT_TIMESTAMP,
    primary key(mobile)
    
)default charset='utf8';

desc user
show columns from user


alter table user add column tea_age_range_from tinyint(2);
alter table user add column tea_age_range_to tinyint(2);
alter table user add column wechat_name varchar(255);
alter table user add column wechat_id varchar(255);

select * from user
insert into user 

