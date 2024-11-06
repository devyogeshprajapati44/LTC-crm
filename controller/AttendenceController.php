<?php
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
include 'config/connection.php';
class AttendenceController
{
    public $model;
    
    public function attendence()
 {  
    // if(isset($_POST['checkinn'])) 
    // {
    //     $checkin=date('h:i:sa');
    //     $ct=$_POST['checkin'];
    //     $ct=$checkin;
    //     $sql_insert="INSERT INTO `employee_attendence`(`Emp_ID`, `check_in_time`) VALUES ('".$_POST['empid']."','".$ct."')";
    //     $result=$conn->query($sql_insert);
    //     if ($result === TRUE) 
    //     {
    //         //echo "<script>alert('Check-in time record created successfully.')</script>";
    //         $newmessage='<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Check-in time record created successfully.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    //         include('view/employee/dashboard.php'); 
    //         exit();
    //     } 
    //     else 
    //     {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    // }
    // if(isset($_POST['checkoutt']))
    //         {
    //         //echo"Hello checkout";
    //         //die;
    //             if(isset($_REQUEST['action']))
    //             {
    //                 //For Start here ID
    //                 $sql_id ="SELECT * FROM `employee_attendence` WHERE `Emp_ID`='".$_SESSION["empid"]."' and  Date(`CreatedOn`)=Date(now()) order by Id desc";      
    //                 $result = mysqli_query($conn, $sql_id);  
    //                 $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    //                 $count  = mysqli_num_rows($result); 
    //                 $id     = $row["Id"];

    //                 $checkintime=$row["check_in_time"];
    //                 $_SESSION["ID"]=$id;
    //                 $_SESSION["checkin"]=$checkintime;
    //                 //For End here ID.
    //                 $checkout=date('h:i:sa');
    //                 $ctt=$_POST['checkout'];
    //                 $ctt=$checkout;
    //                 $checkin=$_SESSION["checkin"];
    //                 $checkout=$ctt;
    //                 $t1 = strtotime($_SESSION["checkin"]);
    //                 $t2 = strtotime($ctt);
    //                 $hours = ($t2 - $t1)/3600;  

    //                 $tootltime=floor($hours) . ':' . ( ($hours-floor($hours)) * 60 );
    //                 //$timediff=round($tootltime,2); 

    //                 //$sql_insert="INSERT INTO `employee_attendence`(`Emp_ID`, `check_in_time`, `check_out_time`,`Total_hours`) VALUES ('".$_POST['empid']."','".$checkin."','".$checkout."','".$tootltime."')";AND `Id`='".$_SESSION["ID"]."'
    //                 $sql_update="UPDATE `employee_attendence` SET `check_out_time`='".$checkout."',`Total_hours`='".$tootltime."' WHERE `Emp_ID`='".$_SESSION["empid"]."'";
    //                 $result=$conn->query($sql_update);
    //                 if(!$result)
    //                 {
    //                     echo "<script>alert('Check-Out time record created successfully.')</script>";
    //                     //$newmessage2='<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Check-Out time record created successfully.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    //                     include('view/employee/dashboard.php'); 
    //                     exit();
    //                 }
    //                 else
    //                 {
    //                     echo "Error: " . $sql_update . "<br>" . $conn->error;
    //                 }
    //             }
    //         }

           //Attendence Data.
            // if(isset($_POST['getreport']))
            // {
            //     // echo"Hello get report";
            //     // die;
            //     if(isset($_REQUEST['action']))
            //     {

            //         $emp_id_id=$_POST['emp_id'];
            //         $month=$_POST['month'];
            //         $year=$_POST['Year'];

            //         if(isset($emp_id_id) && isset($month) && isset($year))
            //         {
            //             //echo $sql_report="select * from `employee_attendence` where `Emp_ID`='$emp_id_id' and month(`CreatedOn`)='$month' and year(`CreatedOn`)='$year' order by Id desc";
            //             echo $sql_report="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `user` `us` ON `ea`.Id=`us`.attendence_id where `ea`.`Emp_ID`='$emp_id_id' and month(`ea`.`CreatedOn`)='$month' and year(`ea`.`CreatedOn`)='$year'";
                         
            //             $result = mysqli_query($conn,$sql_report);  
            //             $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            //             $count  = mysqli_num_rows($result); 

            //             //if ($result->num_rows > 0 && $result->num_rows) 
            //             // if ($result->num_rows > 0 || $result->num_rows) 
            //             // {
            //             //     while($row = $result->fetch_assoc()) 
            //             //   {
            //                 $emp_id =$row["Emp_ID"];
            //                 $emp_name =$row["emp_name"];
            //                 $check_in_time=$row["check_in_time"];
            //                 $check_out_time=$row["check_out_time"];
            //                 $date=$row["CreatedOn"];
    
            //                 $_SESSION["Emp_ID"]=$emp_id;
            //                 $_SESSION["Emp_name"]=$emp_name;
            //                 $_SESSION["check_in_time"]=$check_in_time;
            //                 $_SESSION["check_out_time"]=$check_out_time;
            //                 $_SESSION["CreatedOn"]  = $date;
            //             //   }
            //             // }

            //             if ($count < 1)
            //             {
            //                 echo "<script>alert('No Data Found')</script>";
            //                 include('view/employee/attence_emp.php');
            //             }
            //         }

            //     }
            // }
            //Attendence Data.

           // return $result;
}

}
?>