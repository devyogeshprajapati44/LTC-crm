<?php
error_reporting(0);
include '../connection.php';

//$conn = new mysqli("localhost:8080", "root", "", "adminpanel");
//$sql="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id`";
//$sql="SELECT `ea`.*,`us`.`emp_name`,COUNT(*) as count FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` GROUP BY ea.user_id, us.emp_name, ea.status
//ORDER BY ea.user_id, ea.status";
$sql="SELECT
e.Id,
e.emp_name,
MONTHNAME(a.check_in_date) AS attendance_month,
YEAR(a.check_in_date) AS attendance_year,
a.CreatedOn,
MAX(CASE WHEN a.status = 'P' THEN a.count END) AS P,
MAX(CASE WHEN a.status = 'W' THEN a.count END) AS WO,
MAX(CASE WHEN a.status = 'CO' THEN a.count END) AS CO,
MAX(CASE WHEN a.status = 'H' THEN a.count END) AS H,
MAX(CASE WHEN a.status = 'GH' THEN a.count END) AS GH,
MAX(CASE WHEN a.status = 'HD' THEN a.count END) AS HD,
MAX(CASE WHEN a.status = 'L' THEN a.count END) AS L
FROM (
SELECT
    user_id,
    status,
    COUNT(*) AS count,
    check_in_date,
    CreatedOn
FROM employee_attendence
GROUP BY user_id, status,check_in_date
) AS a
RIGHT JOIN employee AS e
ON a.user_id = e.Id
WHERE e.Id != 1
GROUP BY e.Id, attendance_month, attendance_year
ORDER BY e.Id, attendance_year, attendance_month";
// Fetch records from database 
$query = $conn->query($sql); 
 
if($query->num_rows > 0){ 
    //$delimiter = ","; 
    $delimiter = "\t";
    //$filename = "LTSattendance-data_" . date('Y-m-d'); 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'Employee Name', 'attendance_month', 'attendance_year','P(Present)','W(WeekOFF)','CO(Combo-Off)','H(Holiday)','GH(Gazetted Holiday)','HD(Half-Day)','L(Leave)'); 
    fputcsv($f, $fields, $delimiter); 
     $id=1;
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        //$status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($id++, $row['emp_name'], $row['attendance_month'], $row['attendance_year'], $row['P'], $row['WO'], $row['CO'],$row['H'],$row['GH'],$row['HD'],$row['L']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    //header('Content-Type: text/csv'); 
    //header('Content-Type: text/xls'); 
    //header('Content-Disposition: attachment; filename="' . $filename . '";'); 
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename=LTS-attendance-report.xls'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
    //readfile($filename);
} 
exit; 
?>