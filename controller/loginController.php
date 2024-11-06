<?php
error_reporting(0);
session_start();
class loginController
{
    public $model;
    
    public function indexAction()
 {
    $conn = new mysqli("localhost:8080", "root", "", "adminpanel");   
    if(isset($_POST['submit']))
            {
                if(isset($_REQUEST['action']))
                {
                    $username=$_POST['username'];
                    $password=$_POST['password'];

                    $sql="SELECT * FROM `employee` WHERE `username`='".$username."' and `password`='".$password."'";
                    $result = mysqli_query($conn, $sql);  
                    $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                    $count  = mysqli_num_rows($result); 

                    $user_id =$row["Id"];
                    $emp_id =$row["emp_id"];
                    $newid  = session_create_id('LTS-');
                    $role_id =$row["role_id"];
                    
                    $_SESSION["roleid"]=$role_id;
                    $_SESSION["userid"]=$user_id;
                    $_SESSION["empid"]=$emp_id;
                    $_SESSION["session_id"]=$newid;
                    $_SESSION["page_name"]=basename($_SERVER['REQUEST_URI']);
       //role_id
        $Sql_role="SELECT r.* FROM `roles` r LEFT JOIN `user` u ON r.`role_id` = u.`role_id` where u.`emp_id`='".$_SESSION["empid"]."'";                        
        // die;
        $result  = mysqli_query($conn, $Sql_role);  
        $rows    = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 

       $role_id =$rows["role_id"];
       $perm_add=$rows["permission_for_add"];
       $perm_edit=$rows["permission_for_edit"];
       $perm_view=$rows["permission_for_view"];
       $perm_del=$rows["permission_for_delete"];

       $_SESSION["roleidd"]=$role_id;


       //$_SESSION["permission_foradd"]=$perm_add;
       $_SESSION["permission_foredit"]=$perm_edit;
       $_SESSION["permission_forview"]=$perm_view;
       $_SESSION["permission_fordelete"]=$perm_del;


                    if($count == 1)
                    {
                       include('view/employee/dashboard.php');
                       $Sql_insert="INSERT INTO `session_log`(`Session_ID`, `Page_Name`, `Emp_Id`) VALUES ('".$_SESSION["session_id"]."','".$_SESSION["page_name"]."','".$_SESSION["empid"]."')";
                       $conn->query($Sql_insert);
                       exit;
                    }
                    else
                    {
                        echo '<script>alert("Login failed. Invalid username or password.")</script>';
                        include('view/login.php');
                        exit;                      
                    }

                // return $result;
                }

            }

}

public function attendence()
{
    if(isset($_POST['checktimeout']))
            {
                if(isset($_REQUEST['action']))
                {
                    $t1 = strtotime($_POST['checkin']);
                    $t2 = strtotime($_POST['checkout']);
                    $hours = ($t2 - $t1)/3600;  

                    $tootltime=floor($hours) . ':' . ( ($hours-floor($hours)) * 60 ); 

                    $sql_insert="INSERT INTO `employee_attendence`(`Emp_ID`, `check_in_time`, `check_out_time`,`Total_hours`) VALUES ('".$_POST['empid']."','".$t1."','".$t2."','".$tootltime."')";
                    $result=$conn->query($sql_insert);
                }
            }
}

}
?>