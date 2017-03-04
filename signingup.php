<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once ("include/mysq.php");                           //conatins connection information
require_once ("include/func.php"); 
require_once ("include/sign2.php");

if(!isset($conn)) die ("Unable to connect to mysql");                              //checks whether connection is possible
else {



if(isset($_POST['submit'])){                                                        //if a post request
$tname =$_POST['teamName'] ;
$cname=$_POST['collegeName'];
$pnumber=$_POST['pNumber'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$email=$_POST['userEmail'];
$lang=$_POST['lang'];

$tname=test_input($tname);
$cname=test_input($cname);
$pnumber=test_input($pnumber);
$password=test_input($password);                                              //can be avoided
$cpassword=test_input($cpassword);                                            //can be avoided
$email=test_input($email);
$lang=test_input($lang);
                                                             //TODO add validatiion of data here



$ins = "INSERT INTO team (tname,cname,email,mno,pass,lang) VALUES('".$tname."','".$cname."','".$email."','".$pnumber."','".$password."','".$lang."')";

$retval =mysqli_query($conn, $ins);
if(! $retval )
{
  die('Could not add your team '.$retval->errorno);
}




}
}
header ( "Location: index.php" ) && die ();

?>

