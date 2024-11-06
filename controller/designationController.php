<?php
//session_start();
include 'config/connection.php';
class designationController
{
    public $model;

    public function add_designation()
    {  
        if(isset($_POST['savedesig']))
        {
            if(isset($_REQUEST['action']))
            {
                $sql_insert="INSERT INTO `designation`(`Designation`) VALUES ('".$_POST['designation']."')";
                if ($conn->query($sql_insert) === TRUE) 
                {
                  //echo "New Designation Added successfully.";
                  echo '<script>alert("New Designation Added successfully.")</script>';
                  exit;
                } 
                else 
                {
                  echo "Error: " . $sql_insert . "<br>" . $conn->error;
                }
            }
        }

        if(isset($_POST['Editsubmit']))
        {
          // echo"Hello Edit desgination";
          // die;
          if(isset($_REQUEST['action']))
          {
            $update_id=$_POST["dept_id"];
            $sql_insert="UPDATE `designation` SET `Designation`='".$_POST["desig_name_edit"]."' WHERE `desig_id`='".$update_id."'";
            if ($conn->query($sql_insert) === TRUE) 
            {
              echo '<script>alert("Designation Updated Successfully.")</script>';
              include('view/employee/view_designation_details.php');
              exit;
            } 
            else 
            {
              echo "Error: " . $sql_insert . "<br>" . $conn->error;
            }
         }
        }

        if(isset($_POST['delete']))
        {
          if(isset($_REQUEST['action']))
          {
            $update_id=$_POST["delete_id"];
            $sql_delete="UPDATE `user` SET `emp_status`='".$_POST['']."' WHERE `Id`='".$update_id."' ";
            if ($conn->query($sql_delete) === TRUE) 
            {
              echo '<script>alert("Action Done Successfully.")</script>';
              include('view/employee/view_designation_details.php');
              exit;
            } 
            else 
            {
              echo "Error: " . $sql_insert . "<br>" . $conn->error;
            }
         }
        }
    }
}
?>