<?php
//session_start();
include 'config/connection.php';
class departmentController
{
    public $model;

    public function add_department()
    { 
        if(isset($_POST['savedepartment']))
        {
            if(isset($_REQUEST['action']))
            {
                $sql_insert="INSERT INTO `department`(`department`) VALUES ('".$_POST['department']."')";
                if ($conn->query($sql_insert) === TRUE) 
                {
                  echo '<script>alert("New Department Added successfully.")</script>';
                  include('view/employee/view_department_details.php');
                  exit;
                } 
                else 
                {
                  echo "Error: " . $sql_insert . "<br>" . $conn->error;
                }
            }
        }

          if(isset($_POST['editdepartment']))
          {
              if(isset($_REQUEST['action']))
              {
                $depart_id=$_POST['dept_id'];
                $depart_name=$_POST['Edit_department_name'];
                $sql="UPDATE `department` SET `department`='".$depart_name."' WHERE `dept_id`='".$depart_id."'";
                if ($conn->query($sql) === TRUE) 
                {
                    echo '<script>alert("Record updated successfully.")</script>';
                    include('view/employee/view_department_details.php');
                    exit;
                } 
                else 
                {
                echo "Error updating record: " . $conn->error;
                }
              }
        }
    }
}
?> 