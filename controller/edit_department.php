<?php
session_start();
include 'config/connection.php';
    if($_REQUEST['action']=='edit')
    {
        $sql="UPDATE `department` SET `department`='".$_POST['department_name']."' WHERE `dept_id`='".$_POST['dept_id']."'";
    if ($conn->query($sql) === TRUE) 
    {
        echo '<script>alert("Record updated successfully.")</script>';
        exit;
    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }
}
?>