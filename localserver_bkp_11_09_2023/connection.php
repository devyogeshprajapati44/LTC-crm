<?php
$servername = "localhost:8080";
$username = "root";
//$username = "u227620396_ltscrm";
$password = "";
//$password = "LTS_crm0!!";
$dbname = "adminpanel";
//$dbname = "u227620396_ltscrm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>