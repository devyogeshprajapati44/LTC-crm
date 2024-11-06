<?php
//error_reporting(0);
include '../connection.php';

if (isset($_GET['month']) && isset($_GET['year'])) 
{
$year  = $_GET['year'];
$month = $_GET['month'];

//$sql = "SELECT `check_in_date`,user_id FROM employee_attendence WHERE  MONTH(`check_in_date`) = '$month' AND YEAR(`check_in_date`) = '$year'";
$sql = "SELECT `ea`.`user_id`,`emp`.`emp_name`,COUNT(*) AS `attendance_count` FROM `employee_attendence` `ea` LEFT JOIN `employee` `emp` ON `ea`.`user_id`=`emp`.`Id` WHERE MONTH(`ea`.`check_in_date`) = '$month' AND YEAR(`ea`.`check_in_date`) = '$year' AND `ea`.`check_in_time`!='00:00' GROUP BY `ea`.`user_id`,`emp`.`emp_name`";
 //echo $sql;
// die;
$result = mysqli_query($conn,$sql);
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode($data);
}
else {
    // Handle the case when parameters are not set
    echo "Error: Missing parameters.";
}
?>
