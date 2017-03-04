CREATE TABLE team
(
id int NOT NULL AUTO_INCREMENT,
tname varchar(255) NOT NULL,
cname varchar(255) NOT NULL,
email varchar(40) NOT NULL,
mno varchar(12) NOT NULL,
pass varchar(12) NOT NULL,
lang varchar(10) NOT NULL,
PRIMARY KEY (ID)
);

 ALTER TABLE login AUTO_INCREMENT=1000; 
INSERT INTO login (tname,cname,email,mno,pass,lang) VALUES('ATM','TKM','name@gmail','7560881699','banana','cpp');
