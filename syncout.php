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
$retval =mysqli_query($conn, "select status from pagecontrol where page='syncout'");
if(! $retval )
{
  die('ERROR:'.$retval->errorno);
}
if(mysqli_num_rows($retval)==1){                                                     //TODO also check if team is blocked
$row = mysqli_fetch_assoc($retval);
if($row['status']==0&&isset($_POST['OK'])&&isset($_SESSION['teamid'])){


if((!isset($_POST['level']))||(!isset($_POST['qstnno']))||(!isset($_POST['qry'])))die("ERR:142");



$level=$_POST['level'];
$team=$_SESSION['teamid'];
$qno=$_POST['qstnno'];
$dat=$_POST['qry'];


if($dat=="qs")
{

$qry="select quest from questions where tlevel=$level and qno=$qno"; 
//echo $qry;
$ret4 =mysqli_query($conn, $qry);

//echo $qry;
if(!$ret4)die("ERR:13");
if(mysqli_num_rows($ret4)==1){                         //gets question

$row = mysqli_fetch_assoc($ret4);
$blb=$row['quest'];
echo $blb;
die();
}
else if(mysqli_num_rows($ret4)==0){
die();
}

else die("ERR:14");



}
else if($dat=="dt"){


$qry="select dat from sync where tlevel=$level and qno=$qno and teamid=$team"; 
//echo $qry;
$ret4 =mysqli_query($conn, $qry);

//echo $qry;
if(!$ret4)die("ERR:113");
if(mysqli_num_rows($ret4)==1){                         //gets gets stired data

$row = mysqli_fetch_assoc($ret4);
$blb=$row['dat'];

if(isset($blb))echo $blb;
die();
}
else if(mysqli_num_rows($ret4)==0){
die();}
else die("ERR:114");


}
else if($dat=="df"){                                                   //default values


$qry="select dvalues from questions where tlevel=$level and qno=$qno"; 
//echo $qry;
$ret4 =mysqli_query($conn, $qry);

//echo $qry;
if(!$ret4)die("ERR:113");
if(mysqli_num_rows($ret4)==1){                         //gets default value

$row = mysqli_fetch_assoc($ret4);
$blb=$row['dvalues'];

if(isset($blb))echo $blb;
die();
}
else if(mysqli_num_rows($ret4)==0){
die();}
else die("ERR:114");


}

else die("ERR:451");



}
else die("ERR:213");


}
else die("ERR:47");


}

?>
