<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once ("include/mysq.php");                           //conatins connection information
require_once ("include/func.php");

session_set_cookie_params(3600*3,"/");
session_start(); 
if(!isset($_SESSION['teamid'])||!isset($_SESSION['password'])){
if(isset($_POST['submit1'])){

$tname =$_POST['teamname1'] ;
$password=$_POST['password1'];

$tname=test_input($tname);
$password=test_input($password);                                   //can be avoided




$sql="SELECT id,pass,lang from team where tname='".$tname."' and pass='".$password."'";



$retval =mysqli_query($conn, $sql);
if(! $retval )
{
        
  die('NO');
}

else{

if(mysqli_num_rows($retval)==1){



 while($row = mysqli_fetch_assoc($retval)) {
       
$_SESSION ['teamname'] = $tname;
$_SESSION ['status'] = 'OK';
$_SESSION ['password'] = $row['pass'];
$_SESSION ['teamid'] = $row ['id'];
$_SESSION ['lang'] = $row ['lang'];


die('YES');
}



}


else 
{

die('NO');
}



}


}
else echo 'INV';
}

else {
//print_r($_SESSION);
echo 'AL';                                                             //alreadt logged in

}
?>
