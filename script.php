<?php
include 'connection.php';
function empLoadData($id) 
{
    $empID = $id;
    /** @var TYPE_NAME $connection */
    $run=mysqli_query($conn ,"SELECT * FROM `employee` where `Id`='$id'");
    $data=mysqli_fetch_assoc($run);
    
    $Id            = $data['Id'];
    $empCode       = $data['emp_code'];
    $empName       = $data['emp_name'];
    $fatherName    = $data['father_name'];
    $joining_date  = $data['joining_date'];
    $empStatus     = $data['emp_status'];
    $createdby     = $data['CreatedBy'];

    $phone            = $data['phone'];
    $alernate_number  = $data['alernate_number'];
    $father_mobile    = $data['father_mobile'];
    $current_address  = $data['current_address'];
    $country          = $data['country'];
    $state            = $data['state'];
    $city             = $data['city'];

    $empBasicSalary=$data['basic_salary'];
    $empBasicSalaryReal=$data['basic_salary_real'];
    $empHRA=$data['hra'];
    $empCA=$data['ca'];
    $empSpecialAollwance=$data['special_allowance'];
    //emp leave
    $empCL=$data['cl'];
    $empML=$data['ml'];

    $empTDS=$data['tds'];
    $empPF=$data['pf'];
    if($empPF==2){
        $empPF="YES";
    }
    else{
        $empPF="NO";
    }
    $empESI=$data['esi'];
    if($empESI==2){
        $empESI="YES";
    }
    else{
        $empESI="NO";
    }

    return array($empCode, $empName, $empGender, $empPhone1, $empPhone2, $empEmail1, $empEmail2, $empAddress, $empDob, $empDepartment, $empRank, $empJobDec, $empJoningDate, $empStatus, $empAccNoP, $empAccNameP, $empAccIFSCp, $empAccNoO, $empAccNameO, $empAccIFSCO, $empBasicSalary, $empHRA, $empCA, $empSpecialAollwance, $empCL, $empML, $empID, $empTDS, $empESI, $empPF, $empBasicSalaryReal);
    mysqli_close($conn);

}
?>