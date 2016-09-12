
use tea_renaissance;

create table activity(
	id int not null auto_increment,
    name varchar(255) not null,
    sex char(1),
    mobile char(13) not null unique,
    tea_age int,
    amount int not null,
    created timestamp DEFAULT CURRENT_TIMESTAMP,
    primary key(id)
    
)default charset='utf8';

select * from activity;


insert into activity values (null, 'test', 'm', 13501111112, 2, 3, "", "");

update activity set created=CURRENT_TIMESTAMP where id>0;

select CONVERT_TZ(CURRENT_TIMESTAMP, '+00:00', '+08:00');


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

insert into user select * from activity;

select * from user;


insert into user values (null, 'test', 'm', 13501111114, 2, 3, CURRENT_TIMESTAMP);


create table tea_activity (
	mobile char(13),
    reg_date datetime,
    activity_date datetime,
    amount int not null,
    tea varchar(255),
    
    foreign key(mobile) REFERENCES user(mobile)
)default charset='utf8';

insert into tea_activity(mobile, reg_date, amount) select mobile, created, amount from user;
select * from tea_activity;

select DATE(NOW())=CURDATE();


select * from tea_activity where mobile=13501777753 order by reg_date desc;

select * from tea_activity where DATE(activity_date)="2016-07-18" and mobile=13501777753;

select * from tea_activity where activity_date>"2016-07-19";

insert into tea_activity values(13501777753, "2016-07-15 09:54:13", "2016-07-18 09:54:13", 2, null);

delete from tea_activity where mobile=13501777753 and Date(activity_date)=Date(NOW());


select name, a.mobile, amount, tea_age, Date(activity_date) as dt from tea_activity as a left join user as u on a.mobile=u.mobile where activity_date>=NOW() order by activity_date;

select * from tea_activity as a, user as u where u.mobile=a.mobile and activity_date>=NOW() order by activity_date;

select * from tea_activity;
delete from tea_activity where activity_date='0000-00-00 00:00:00';

select * from tea_activity as a left join user as u on a.mobile=u.mobile order by activity_date;


update user set name='火娃' where mobile=