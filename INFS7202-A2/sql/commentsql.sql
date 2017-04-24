CREATE TABLE comments(
	cid int(10) not null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(150) not null,
    date datetime not null,
    message TEXT not null
);