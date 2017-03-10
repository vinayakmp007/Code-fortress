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
$retval =mysqli_query($conn, "select status from pagecontrol where page='timeget'");
if(! $retval )
{
  die('ERROR:'.$retval->errorno);
}
if(mysqli_num_rows($retval)==1){                                                     //TODO also check if team is blocked
$row = mysqli_fetch_assoc($retval);
if($row['status']==0&&isset($_POST['OK'])&&isset($_SESSION['teamid'])){


$level=$_POST['level'];
$team=$_SESSION['teamid'];

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
$ctime=time();                                      //gets current time
if($ctime>$endtime)die("TIMEEND");
if($ctime<$stime)die("TIMEERR");
$time=$ctime;

echo $endtime-$ctime; 
die();
}
die('ERR:1');
}
}







?>

