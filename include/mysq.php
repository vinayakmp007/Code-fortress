<?php
 
$servername = "localhost:3306";        //mysql server address
$username = "";                                 //User name
$passworda = "";                               //mysql password
$databasename="";                               //name of the mysql data base

// Create connection
$conn = new mysqli($servername, $username, $passworda,$databasename);     
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully ";

?>
