create database tea_renaissance;

use tea_renaissance;

create table activity(
	id int not null auto_increment,
    name varchar(255) not null,
    sex char(1),
    mobile char(13) not null unique,
    tea_age int,
    amount int not null,
    primary key(id)
    
)default charset='utf8';


alter table activity add created timestamp DEFAULT CURRENT_TIMESTAMP;
-- alter table activity add changed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAM;

insert into activity values (null, '嘎嘎', 'm', 13501778753, 2, 3, null);


select * from activity

-- LOAD DATA INFILE 'data.txt' INTO TABLE baidu_news.tst;
LOAD DATA LOCAL INFILE '/Users/albert/Downloads/test.xml.html.csv'
INTO TABLE baidu_news.tst
FIELDS TERMINATED BY ','
    ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(uniqName, uniqCity, uniqComments)
