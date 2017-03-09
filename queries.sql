CREATE TABLE team
(
id int NOT NULL AUTO_INCREMENT,
tname varchar(255) NOT NULL UNIQUE,
cname varchar(255) NOT NULL,
email varchar(40) NOT NULL UNIQUE,
mno varchar(12) NOT NULL UNIQUE,
pass varchar(12) NOT NULL UNIQUE,
lang varchar(10) NOT NULL,
status int NOT NULL,
PRIMARY KEY (ID)
);

<<<<<<< HEAD
ALTER TABLE team AUTO_INCREMENT=1000; 
INSERT INTO team (tname,cname,email,mno,pass,lang) VALUES('ATM','TKM','name@gmail','7560881699','banana','cpp');
=======
 ALTER TABLE login AUTO_INCREMENT=1000; 
INSERT INTO login (tname,cname,email,mno,pass,lang) VALUES('ATM','TKM','name@gmail','7560881699','banana','cpp');

 CREATE TRIGGER namecheck BEFORE INSERT ON login FOR EACH ROW 
BEGIN
		
>>>>>>> 1ab6e6e3b8d934535d5d53337e0cb425eb847ca1





CREATE TABLE questions
(
testid int NOT NULL AUTO_INCREMENT UNIQUE,
tlevel  int NOT NULL ,
qno    int NOT NULL,
quest BLOB NOT NULL,
dvalues BLOB ,
maxscore int NOT NULL,
PRIMARY KEY (tlevel,qno)
);


CREATE TABLE correct
(
subid int NOT NULL AUTO_INCREMENT UNIQUE,
tlevel  int NOT NULL,
qno    int NOT NULL,
teamid   int NOT NULL,
status int,
time int(12) NOT NULL,
code BLOB,
PRIMARY KEY (tlevel,qno)
);

/*compiled 1
executed succesfully 2
error or not submitted 0

*/



CREATE TABLE testcase
(
testid int NOT NULL AUTO_INCREMENT UNIQUE,
tlevel  int NOT NULL ,
qno    int NOT NULL,
ncase int NOT NULL,
tinput BLOB NOT NULL,
toutput BLOB NOT NULL,
PRIMARY KEY (tlevel,qno,ncase)
);

CREATE TABLE levelcontrol
(
pcontrolid int NOT NULL AUTO_INCREMENT UNIQUE,
levels  int NOT NULL UNIQUE,
status    int NOT NULL,
totaltime int(12),
PRIMARY KEY (levels)
);

/*status 

00  disabled
01  enabled



*/



CREATE TABLE pagecontrol
(
lcontrolid int NOT NULL AUTO_INCREMENT UNIQUE,
page  varchar(40) NOT NULL UNIQUE,
status   int NOT NULL,
PRIMARY KEY (page)
);




CREATE TABLE sublog
(
sublogid int NOT NULL AUTO_INCREMENT UNIQUE,
tlevel  int NOT NULL,
qno    int NOT NULL,
teamid   int NOT NULL,
dat BLOB,
time int(12) NOT NULL,
PRIMARY KEY (sublogid)
);





ALTER TABLE testcase AUTO_INCREMENT=5000;


INSERT INTO testcase (tlevel,qno,tinput,toutput) values(1,1,'aaaaa','bbbb');

GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY '1234' WITH GRANT OPTION;









