<?php
//session_start();
class RoleController
{
    public $model;

    public function role_management()
    {
        $conn = new mysqli("localhost:8080", "root", "", "adminpanel"); 
        if(isset($_POST['roleadded']))
        {
            if(isset($_REQUEST['action']))
            {
                $role_name=$_POST["rolen"];
                $permission=$_POST["permission"];
                //$permission_for=$_POST["permissionfor1"]; 
               // $perm_for=implode(",",$permission_for);

                $permission_add=$_POST["permissionforadd"];
                $permission_edit=$_POST["permissionforedit"];
                $permission_view=$_POST["permissionforview"];
                $permission_del=$_POST["permissionfordel"];
                $SQL_Insert="INSERT INTO `roles`(`role_name`,`permission_for_add`, `permission_for_edit`, `permission_for_view`, `permission_for_delete`) 
                VALUES ('".$role_name."','".$permission_add."','".$permission_edit."','".$permission_view."','".$permission_del."')";
                $result=$conn->query($SQL_Insert);
                $last_id = $conn->insert_id;

                if(!empty($_POST["rolen"]))
                {
                    $SQL_Update="UPDATE `user` SET `role_id`='".$last_id."' WHERE emp_id='".$_POST["empid"]."'";
                    $result=$conn->query($SQL_Update);
                }

                if ($result > '0') 
                {
                echo "<script>alert('Role Added successfully.')</script>";
                //header("Location:index.php?function=EmployeeDetails&action=rolem");
                include('view/employee/view_role_management_system_details.php');
                exit();
                } 
                else 
                {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }

          }
        }

        if(isset($_POST['editrole']))
        {
            if(isset($_REQUEST['action']))
            {
                $role_id=$_POST["roleid"];
                $role_name=$_POST["roleedit"];
                $permission_add=$_POST["permissionforadd"];
                $permission_edit=$_POST["permissionforedit"];
                $permission_view=$_POST["permissionforview"];
                $permission_del=$_POST["permissionfordel"];

                $sql_update_role = "UPDATE `roles` SET `role_name`='".$role_name."',`permission_for_add`='".$permission_add."',`permission_for_edit`='".$permission_edit."',`permission_for_view`='".$permission_view."',`permission_for_delete`='".$permission_del."' WHERE `role_id`='".$role_id."'";
                $result=$conn->query($sql_update_role);
                if ($result > '0') 
                {
                echo "<script>alert('Role Updated successfully.')</script>";
                include('view/employee/view_role_management_system_details.php');
                exit();
                } 
                else 
                {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
       // return $result;
    }
}

?>