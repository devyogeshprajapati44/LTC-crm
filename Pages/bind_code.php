
<?php
// Get the user id 
$user_id = $_REQUEST['user_id'];
  
// Database connection
//include 'connection.php';
$conn = new mysqli("localhost", "root", "", "adminpanel");
if ($user_id !== "") 
{      
    // Get corresponding first name and 
    // last name for that user id  
//  echo $sql="SELECT `us`.`Id`, `us`.`emp_name`,`us`.`father_name`, `us`.`emp_id`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`desig_id`,`desig`.`Designation`,`msd`.* FROM `employee` `us`
//  LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `master_salary_data` `msd` ON `us`.`Id`=`msd`.`user_id` 
//  WHERE `us`.`Id`='$user_id'";
//      $res=mysqli_query($conn,$sql);
//      print_r($res);
//      die;  
    //$query = mysqli_query($conn, "SELECT `us`.`Id`, `us`.`emp_name`,`us`.`father_name`, `us`.`emp_id`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`Designation` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` where `us`.`emp_id`='$user_id'");
    $query = mysqli_query($conn, "SELECT `unique_code`, `gp_code`, `gp_gd_code`, `gp_id`, `type_of_site`, `zone`, `district`, `ps`, `new_ps`, `gp_name` FROM `earthing_gp_codes` WHERE `Id`='$user_id'");
  
    $row = mysqli_fetch_array($query);
  
    $unique_code=$row['unique_code'];
    $gp_code=$row['gp_code'];
    $gp_gd_code=$row['gp_gd_code'];
    $gp_id=$row['gp_id'];
    $type_of_site=$row['type_of_site'];
    $zone=$row['zone'];
    $district=$row['district'];
    $ps=$row['ps'];
    $new_ps=$row['new_ps'];
    $gp_name=$row['gp_name'];

}
  
// Store it in a array
$result = array("$unique_code",
"$gp_code",
"$gp_gd_code",
"$gp_id",
"$type_of_site",
"$zone",
"$district",
"$ps",
"$new_ps",
"$gp_name");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>