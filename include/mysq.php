<?php
 
$servername = "localhost:3306";
$username = "root";
$passworda = "voldermort";


// Create connection
$conn = new mysqli($servername, $username, $passworda,"hp");
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully ";

?>
