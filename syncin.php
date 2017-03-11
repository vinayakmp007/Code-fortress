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
$retval =mysqli_query($conn, "select status from pagecontrol where page='syncin'");
if(! $retval )
{
  die('ERROR:'.$retval->errorno);
}
if(mysqli_num_rows($retval)==1){                                                     //TODO also check if team is blocked
$row = mysqli_fetch_assoc($retval);
if($row['status']==0&&isset($_POST['OK'])&&isset($_SESSION['teamid'])){

$level=$_POST['level'];
$team=$_SESSION['teamid'];
$qno=$_POST['qstnno'];
$dat=$_POST['dat'];


$null=NULL;
$stmt = $conn->prepare("update sync (tlevel,qno,teamid,dat) values(?,?,?,?) where tlevel=$level and teamid=$team and qno=$qno");
$stmt->bind_param("dddb",$level,$qno,$team,$null);
$stmt->send_long_data(3,$dat);

$stmt->execute();                   //TODO          check whether error is empty
$stmt->close(); 



}else die("ERR:85");

}
else die("ERR:96");

}

?>
