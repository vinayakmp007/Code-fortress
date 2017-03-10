CREATE TABLE team
(
id int NOT NULL AUTO_INCREMENT,
tname varchar(255) NOT NULL UNIQUE,
cname varchar(255) NOT NULL,
email varchar(40) NOT NULL UNIQUE,
mno varchar(12) NOT NULL UNIQUE,
pass varchar(12) NOT NULL ,
lang varchar(10) NOT NULL,
status int NOT NULL,
lang varchar(10) NOT NULL , 
status int NOT NULL DEFAULT 1,
PRIMARY KEY (ID)
);


ALTER TABLE team AUTO_INCREMENT=1000; 
INSERT INTO team (tname,cname,email,mno,pass,lang) VALUES('ATM','TKM','name@gmail','7560881699','banana','cpp');

 ALTER TABLE login AUTO_INCREMENT=1000; 
INSERT INTO login (tname,cname,email,mno,pass,lang) VALUES('ATM','TKM','name@gmail','7560881699','banana','cpp');

 CREATE TRIGGER namecheck BEFORE INSERT ON login FOR EACH ROW 
BEGIN
		





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
status int NOT NULL,
time int(12) NOT NULL,
code BLOB,
lang varchar(10),
diff int NOT NULL,
PRIMARY KEY (tlevel,qno)
);


ALTER TABLE correct AUTO_INCREMENT=6000;
INSERT INTO correct (tlevel,qno,teamid,status,time,lang,code) values (1,1,1234,0,1234,"cpp","main(){}");



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
ALTER TABLE levelcontrol AUTO_INCREMENT=8000;
INSERT INTO levelcontrol (levels,status,totaltime) values (" ",1,12334);

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
ALTER TABLE pagecontrol AUTO_INCREMENT=8000;
INSERT INTO pagecontrol (page,status) values ('foof',1);




CREATE TABLE sublog
(
sublogid int NOT NULL AUTO_INCREMENT UNIQUE,
tlevel  int NOT NULL,
qno    int NOT NULL,
teamid   int NOT NULL,
code BLOB,
status int NOT NULL,
time int(12) NOT NULL,
lang varchar(12),
diff int NOT NULL,
PRIMARY KEY (sublogid)
);

ALTER TABLE sublogid AUTO_INCREMENT=9000;
INSERT INTO sublog (tlevel,qno,teamid,dat,time,lang) values ( 5,4,1020,'foo',22343,'cpp');





ALTER TABLE testcase AUTO_INCREMENT=5000;


INSERT INTO testcase (tlevel,qno,tinput,toutput) values(1,1,1,'aaaaa','bbbb');

GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY '1234' WITH GRANT OPTION;

CREATE TABLE testcase 
( 
testid int NOT NULL AUTO_INCREMENT UNIQUE, 
tlevel  int NOT NULL , 
qno    int NOT NULL, 
ncase int NOT NULL, 
tinput BLOB NOT NULL, 
toutput BLOB NOT NULL, 
PRIMARY KEY (tlevel,qno,ncases) 
); 



/*   to record the starting time of levels */

CREATE TABLE  levelstart
( 
logid int NOT NULL AUTO_INCREMENT UNIQUE, 
tlevel  int NOT NULL , 
teamid int NOT NULL,
startt int NOT NULL,
PRIMARY KEY (teamid,tlevel) 
); 

/* to enable and disable level*/
CREATE TABLE levels
( 
tlevel  int NOT NULL UNIQUE , 
qstns int NOT NULL,
status int NOT NULL,
type varchar(20),
totaltime int NOT NULL,
PRIMARY KEY (tlevel) 
); 

/*no of question of this level can be obtained from questions table
*/








ALTER TABLE testcase AUTO_INCREMENT=5000; 
 
CREATE TABLE  
teamname
tlevel
compiled
correct
 
INSERT INTO testcase (tlevel,qno,tinput,toutput) values(1,1,'aaaaa','bbbb'); 
 
GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY '1234' WITH GRANT OPTION; 
 



INSERT INTO questions (tlevel,qno,quest,dvalues,maxscore) values(2,3,"252525dgsds","5325",56);



INSERT INTO `answers` (teamid, stageid, questionid, ans,time) VALUES('{$_SESSION['teamid']}', '{$_SESSION['stage']}', '{$_SESSION['questionid']}', '" . $mysqli->real_escape_string ( $_POST ['ans'] ) . "','{$t}')
	ON DUPLICATE KEY UPDATE teamid = VALUES(teamid), stageid = VALUES(stageid), questionid = VALUES(questionid), ans = VALUES(ans), time = VALUES(time)" );
	
	
	
	
	
	
	
	
	
	
	
	
