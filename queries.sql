
/**
The main tbale for storing team information
**/

CREATE TABLE team
(
id int NOT NULL AUTO_INCREMENT,
tname varchar(255) NOT NULL UNIQUE,
cname varchar(255) NOT NULL,
email varchar(40) NOT NULL UNIQUE,
mno varchar(12) NOT NULL UNIQUE,
pass varchar(12) NOT NULL ,
lang varchar(10) NOT NULL,
status int NOT NULL DEFAULT 1,
PRIMARY KEY (ID)
);


ALTER TABLE team AUTO_INCREMENT=1000;
/**
table team:
status 1 team enabled(default)
status 0 team disabled
status 2 team blocked

**/






/**
 EXAMPLE
 **/
INSERT INTO team (tname,cname,email,mno,pass,lang) VALUES('ATM','TKM','name@gmail','7560881699','banana','cpp');


/**
Table where the questions are stored
questions are in HTML format as a BLOB
each languge should have a question
**/

CREATE TABLE questions
(
testid int NOT NULL AUTO_INCREMENT UNIQUE,
tlevel  int NOT NULL ,
qno    int NOT NULL,
lang varchar(10) NOT NULL,
quest BLOB NOT NULL,
dvalues BLOB ,
maxscore int NOT NULL,
PRIMARY KEY (tlevel,qno,lang)
);

/**
maxscore contains maximum score allowed for the question

dvalues can be used as the default values that should be present inside code editor when question is opened for the first time .
it can also be the code that needs debugging
**/
 


/**
All the CORRECT(succesful) submissions by the team are recorded here
**/

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
PRIMARY KEY (tlevel,qno,teamid)
);

/**
time is time of submission in unix timestamp
diff contains the number of lines different from the default values in the corresponding question table and submitted code
the status will always be 2
 **/


/**
TODO the following table not yet impemented in php
**/

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




/**
this helps to control php pages
we can enable and disable pages here

**/


CREATE TABLE pagecontrol
(
lcontrolid int NOT NULL AUTO_INCREMENT UNIQUE,
page  varchar(40) NOT NULL UNIQUE,
status   int NOT NULL,
PRIMARY KEY (page)
);

/**
status 0 disabled
status 1 enabled
**/



/**
All submissions  by the team are recorded here
**/

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

/**
status 0 -Compilation error
status 1-Compiled sucessfully but failed to pass testcases
status 2 -Compiled sucessfully and passed all test cases a copy willl present inside the correct table
**/




ALTER TABLE testcase AUTO_INCREMENT=5000;




GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY '1234' WITH GRANT OPTION



/**   To record the starting time of levels 

whenever a user a starts a level it is recorded  here.
this starting time used for all time calculation related to the team for the current level.
IE whenever a submission is made the submission is compared with the starting time 
**/


CREATE TABLE  levelstart
( 
logid int NOT NULL AUTO_INCREMENT UNIQUE, 
tlevel  int NOT NULL , 
teamid int NOT NULL,
startt int NOT NULL,
PRIMARY KEY (teamid,tlevel) 
); 

/**
startt is  unix timestamp
**/





/** to enable and disable level    add rules
the following table allows to enable and disable levels
only if levels are then a team can start a level
**/
CREATE TABLE levels
( 
tlevel  int NOT NULL UNIQUE , 
qstns int NOT NULL,
status int NOT NULL,
type varchar(20),
totaltime int NOT NULL,
PRIMARY KEY (tlevel) 
); 

/**
type can be coding,debug
totalatime is in seconds

no of question of this level can be obtained from questions table


status 

00  disabled
01  enabled



**/





/** the following table contain data code used by the user(NOT SUBMITTED CODE)
IE code typed inside the online code editor is stored inside this table
this table is updated when user switches questions or at every 15 seconds
this helps in monitoring current code developments by the user
**/
CREATE TABLE  sync
( 
tlevel  int NOT NULL ,
qno int NOT NULL, 
teamid int NOT NULL,
dat BLOB,
PRIMARY KEY (teamid,tlevel,qno) 
); 


/**


                                                                        JUNK QUERIES

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
	
	
	
	
	
	
	
	
	
	**/
