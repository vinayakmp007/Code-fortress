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
$level=$_POST['level'];
$team=$_SESSION['teamid'];
$lan=$_SESSION['lang'];
$time=0;                                                        //TODO remove this
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

unlink($progcode);                                                                   //this part write the code into file 
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
echo $reterr2;

//|wc -l
if($reterr2==0){
$reterr3=shell_exec($runscript2." ".$testcase."/".$level."/".$qstno." ".$prog." 2>&1");     //run the output program in test cases


if($reterr3==0){                                                                              //all ouput test case passed
$status=2;

$qry="insert into correct";



                                            //TODO: insert into correct table









}
//echo $runscript2." ".$testcase."/".$level."/".$qstno." ".$prog."/".$level."/".$qstno;
echo $reterr3;
}




}

                                                    //TODO:insert into submission table



}
else 
{
echo "post not set";
//header ( "Location: index.php" ) && die (); 
}


}
else die('ERROR:More entries found');
}

?>
