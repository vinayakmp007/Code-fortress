<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once ("include/mysq.php");                           //conatins connection information
require_once ("include/func.php"); 
require_once ("include/sign2.php");
require_once ("include/glob.php");
session_start(); 
if(!isset($conn)) die ("Unable to connect to mysql");                              //checks whether connection is possible
else {
$retval =mysqli_query($conn, "select status from pagecontrol where page='submit'");
if(! $retval )
{
  die('ERROR:'.$retval->errorno);
}
if(mysqli_num_rows($retval)==1){                                                     //TODO also check if team is blocked
$row = mysqli_fetch_assoc($retval);
if($row['status']==0&&isset($_POST['OK'])&&isset($_SESSION['teamid'])){                                              //if the page is enabled OK is send by ajax and whether time for team is not over

$code=$_POST['code'];
$qstno=$_POST['qstnno'];
$time=$_POST['time'];
$level=$_POST['level'];                                                           //TODO check level is enabled or check whether or it should be present in levelstart
$team=$_SESSION['teamid'];
$lan=$_SESSION['lang'];

//echo $code;
$time=0;                                                        //TODO remove this
$diff=-1;

$qry="select startt from levelstart where tlevel=$level and teamid=$team"; 
//echo $qry;
$ret4 =mysqli_query($conn, $qry);

//echo $qry;
if(!$ret4)die("ERR:13");
if(mysqli_num_rows($ret4)==1){                         //gets start time for that event

$row = mysqli_fetch_assoc($ret4);
$stime=$row['startt'];
}
else die("ERR:14");


$qry="select totaltime from levels where tlevel=$level"; 
$ret4 =mysqli_query($conn, $qry);

//echo $qry;
if(!$ret4)die("ERR:15");
if(mysqli_num_rows($ret4)==1){                         //gets total time for that level

$row = mysqli_fetch_assoc($ret4);
$tottime=$row['totaltime'];
$endtime=$tottime+$stime;
}
else die("ERR:16");
$ctime=time();
if($ctime>$endtime)die("TIMEEND");
if($ctime<$stime)die("TIMEERR");
$time=$ctime;


$ext="";

if($lan=='C'){
$compiler='gcc';
$ext="c";
}
else if($lan=='C++'||$lan=='cpp'){

$compiler='g++';
$ext="cpp";
}

$pathsub=$level."/".$qstno;                                                    //
$prog=$userd."/".$team."/".$pathsub;

$progcode=$prog."/prog.".$ext;
$progout=$prog."/pro.o";


//$compiler
$filnam=$progcode;
if(file_exists($progcode))unlink($progcode);                                                                   //this part write the code into file 
$handle = fopen($progcode, 'w') or die('Cannot create file: prog ');
fwrite($handle, $code);
fclose($handle);


$status=0;                                           //error status


$compiler=$compiler." ".$progcode." -w -o ".$progout;
//echo $compiler;
unset($reterr);
#$ret=shell_exec();
$reterr=shell_exec("chmod 777 -R ".$prog);
$reterr=shell_exec($compiler." 2>&1");                                                  //error to stdout

if(empty($reterr)){                                                                  //succesful compilation

$status=1;

$reterr2=shell_exec($runscript." ".$testcase."/".$level."/".$qstno." ".$prog." ".$progout." 2>&1 |wc -l");     //run the output program in test cases
//echo $reterr2;

//|wc -l
if($reterr2==0){
$reterr3=shell_exec($runscript2." ".$testcase."/".$level."/".$qstno." ".$prog." 2>&1");     //run the output program in test cases
//echo $reterr3;

if($reterr3==0){                                                                              //all ouput test case passed
$status=2;



$qry="select type from levels where tlevel=$level";                                                                                                          
$ret3 =mysqli_query($conn, $qry);
if(!$ret3)die("ERR:5");


if(mysqli_num_rows($ret3)==1){                         //compare with original code

$row = mysqli_fetch_assoc($ret3);
if($row['type']=='debug'){


$qry="select dvalues from questions where tlevel=$level and qno=$qstno"; 
$ret4 =mysqli_query($conn, $qry);

//echo $qry;
if(!$ret4)die("ERR:6");

if((mysqli_num_rows($ret4))==1){

$row = mysqli_fetch_assoc($ret4);
$dat=$row['dvalues'];
                                                                                     
$defcode=$testcase."/".$level."/".$qstno."/"."tcode.txt";                                                                                 
if(file_exists($defcode))unlink($defcode);                                                                   //this part write the code into file 
$handle = fopen($defcode, 'w') or die('Cannot create file: prog ');
fwrite($handle, $dat);
fclose($handle);

$diff=shell_exec("diff   -N ".$defcode." ".$progcode." | grep '^>' | wc -l ");
//echo("diff   -N ".$defcode." ".$progcode." | grep '^<' | wc -l ".$diff);

}

else  die('ERR:multiple questions'); 
}
//                                         put else here for 'coding'
}                                        
else  die('ERR:7'); 






$null=NULL;
$stmt = $conn->prepare("insert into correct(tlevel,qno,teamid,status,lang,time,code,diff) values(?,?,?,?,?,?,?,?)");
$stmt->bind_param("ddddsdbd",$level,$qstno,$team,$status,$lan,$time,$null,$diff);
$stmt->send_long_data(6, file_get_contents($filnam));

$stmt->execute();                   

if(!empty($stmt->error)){

$qry="select * from correct where tlevel=$level and qno=$qstno and teamid=$team";           //check wheither already submitted
//echo $qry;
$ret3 =mysqli_query($conn, $qry);
if(mysqli_num_rows($ret3)==1)$status=10;                                         
else  die($stmt->error);   

}


$stmt->close(); 



//$qry="insert into correct(tlevel,qno,teamid,status,lang,time,code,diff) values($level,$qstno,$team,$status,'$lan',$time,'{$code}',$diff)";           //check wheither already submitted
//echo $qry;
//$ret3 =mysqli_query($conn, $qry);
//if(! $ret3 )                                                      //unable to insert
//{


//$qry="select * from correct where tlevel=$level and qno=$qstno and teamid=$team";           //check wheither already submitted
//echo $qry;
//$ret3 =mysqli_query($conn, $qry);
//if(mysqli_num_rows($ret3)==1)$status= 10;                                         
//else  die('ERR:10');                                      
//}



$qry="select type from levels where tlevel=$level";                                                                                                           
$ret3 =mysqli_query($conn, $qry);
if(!$ret3)die("ERR:11");


if(mysqli_num_rows($ret3)==1){                         //compare with original code

$row = mysqli_fetch_assoc($ret3);
if($row['type']=='debug'){


$qry="select dvalues from questions where tlevel=$level and qno=$qstno"; 
$ret4 =mysqli_query($conn, $qry);

//echo $qry;
if(!$ret4)die("ERR:6");

if((mysqli_num_rows($ret4))==1){

$row = mysqli_fetch_assoc($ret4);
$dat=$row['dvalues'];
                                                                                     
$defcode=$testcase."/".$level."/".$qstno."/"."tcode.txt";                                                                                 
if(file_exists($defcode))unlink($defcode);                                                                   //this part write the code into file 
$handle = fopen($defcode, 'w') or die('ERR:20');
fwrite($handle, $dat);
fclose($handle);

$diff=shell_exec("diff   -N ".$defcode." ".$progcode." | grep '^>' | wc -l ");
//echo("diff   -N ".$defcode." ".$progcode." | grep '^<' | wc -l ".$diff);

}

else  die('ERR:multiple questions'); 
}
//                                         put else here for 'coding'
}                                        
else  die('ERR:7'); 

}
//echo $runscript2." ".$testcase."/".$level."/".$qstno." ".$prog."/".$level."/".$qstno;
//echo $reterr3;
}




}




$null=NULL;
$stmt = $conn->prepare("insert into sublog(tlevel,qno,teamid,status,lang,time,code,diff) values(?,?,?,?,?,?,?,?)");
$stmt->bind_param("ddddsdbd",$level,$qstno,$team,$status,$lan,$time,$null,$diff);
$stmt->send_long_data(6, file_get_contents($filnam));

$stmt->execute();                   //TODO          check whether error is empty
$stmt->close();                    

/*
//$qry="insert into sublog(tlevel,qno,teamid,status,lang,time,code,diff) values($level,$qstno,$team,$status,'$lan',$time,'{$code}',$diff)";
$qry="insert into sublog(tlevel,qno,teamid,status,lang,time,code,diff) values($level,$qstno,$team,$status,'$lan',$time,'{$code}',$diff)";  
unset($ret3);
//echo $qry;
$ret3 =mysqli_query($conn, $qry);
if(! $ret3 )
{
 echo("Error description: " . mysqli_error($conn));
  die('ERR:8');                                     
}
*/
echo ($status);
//echo $endtime." ".$ctime." ".$stime." ".$tottime;
//echo $endtime-$ctime;
die();                                                    //0 failed,1 compiled&&failed,2 passed,10 already passed








}
else 
{
echo "PS"; 
die();                        //try to redirect                                                   //if page is disabled
//header ( "Location: index.php" ) && die (); 
}


}
else die('ERROR:More entries found');
}

?>
