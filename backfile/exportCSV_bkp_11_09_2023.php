<?php
include '../connection.php';

$sql="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id`";
// Fetch records from database 
$query = $conn->query($sql); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "LTSattendance-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'Emp Name', 'Check In Time', 'Check In Date', 'Check Out Time', 'Check Out Date', 'Status', 'CreatedOn'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        //$status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['Id'], $row['emp_name'], $row['check_in_time'], $row['check_in_date'], $row['check_out_time'], $row['check_out_date'], $row['status'], $row['CreatedOn']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
?>