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
$retval =mysqli_query($conn, "select status from pagecontrol where page='test'");
if(! $retval )
{
  die('ERROR:'.$retval->errorno);
}
if(mysqli_num_rows($retval)==1){                                                     //TODO also check if team is blocked
$row = mysqli_fetch_assoc($retval);
if($row['status']==0&&isset($_POST['OK'])&&isset($_SESSION['teamid'])){



}





$level=$_POST['level'];


$team=$_SESSION['teamid'];
$lan=$_SESSION['lang'];



}
else die("ERR:146");


}
else die("ERR:546");                                        //TODO add redirect here







?>
