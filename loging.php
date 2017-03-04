<?php




if(isset($_POST['submit'])){
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once ("include/mysq.php");                           //conatins connection information
require_once ("include/func.php");
$tname =$_POST['teamname'] ;
$password=$_POST['password'];

$tname=test_input($tname);
$password=test_input($password);                                   //can be avoided
echo $tname;
$sql="SELECT id,pass from team where tname='".$tname."'";


echo $sql;
$retval =mysqli_query($conn, $sql);
if(! $retval )
{
        
  die('NO');
}

else{

if(mysqli_num_rows($retval)==1){


die('YES');


}


else 
{

die('NO');}



}


}
?>
