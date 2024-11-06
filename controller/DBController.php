<?php
class DBController
{
public $servername="localhost:8080";
public $username="root";
public $password="";
public $dbname="adminpanel";
public $conn;

public function connect()
{
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
    {
    die("Connection failed: " . $conn->connect_error);
    }
    else
    {
    echo"Connected Successfully";
    }
      return $conn;
}

}
?>