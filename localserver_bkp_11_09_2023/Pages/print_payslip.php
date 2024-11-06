<?php
include 'connection.php';
$EmpID=$_REQUEST["EmpID"];
$EmpID=EDV($EmpID,2);
// echo $sql="SELECT `us`.`Id`, `us`.`emp_name`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`us`.`permanent_address`,`desig`.`Designation`,`addsal`.`location`,`addsal`.`basic`, `addsal`.`hra_no`, `addsal`.`cca`, `addsal`.`Provident_fund@ 12%`, `addsal`.`advance`, `addsal`.`esi@ 0.75%`, `addsal`.`special_all(SPL)`, `addsal`.`monthly_bonus`, `addsal`.`other_all`, `addsal`.`Professional_tax`, `addsal`.`lwa_amount`, `addsal`.`lop_amounts`, `addsal`.`total_earninig`, `addsal`.`total_deductions`, `addsal`.`salary_in_words`, `addsal`.`net_payble`, `addsal`.`Provident_funds@ 13%`, `addsal`.`working_day`, `addsal`.`esi_@ 3.25%`, `addsal`.`total_days`, `addsal`.`accident_insurance`, `addsal`.`leave_taken`, `addsal`.`loss_of_pay`,`addsal`.`total_contribution`, `addsal`.`ctc_wages`,`addsal`.`month`,`addsal`.`year`,`addsal`.`amount`,`addsal`.`total_payble`,`addsal`.`gross_salary`,`addsal`.`date_of_salary_transfer`,`addsal`.`salary_release_mode` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id` where `us`.`Id`='$EmpID'";
// echo"<br/>";
// echo $sql_2="SELECT `srm`.`Salary_mode` FROM `add_salary_slip` `addsal` LEFT JOIN `salary_release_mode` `srm` ON `addsal`.`salary_release_mode`=`srm`.`Id` where `addsal`.`user_id`='$EmpID'";
// echo $sql_insert="SELECT `us`.`Id`, `us`.`emp_name`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`us`.`permanent_address`,`desig`.`Designation`,`addsal`.`location`,`addsal`.`basic`, `addsal`.`hra_no`, `addsal`.`cca`, `addsal`.`Provident_fund@ 12%`, `addsal`.`advance`, `addsal`.`esi@ 0.75%`, `addsal`.`special_all(SPL)`, `addsal`.`monthly_bonus`, `addsal`.`other_all`, `addsal`.`Professional_tax`, `addsal`.`lwa_amount`, `addsal`.`lop_amounts`, `addsal`.`gross_earning`, `addsal`.`total_deductions`, `addsal`.`salary_in_words`, `addsal`.`net_payble`, `addsal`.`Provident_funds@ 13%`, `addsal`.`working_day`, `addsal`.`esi_@ 3.25%`, `addsal`.`total_days`, `addsal`.`accident_insurance`,`addsal`.`loss_of_pay`,`addsal`.`total_contribution`, `addsal`.`ctc_wages`,`addsal`.`month`,`addsal`.`year`,`addsal`.`amount`,`addsal`.`total_payble`,`addsal`.`gross_salary`,`addsal`.`date_of_salary_transfer`,`addsal`.`salary_release_mode` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id` where `us`.`Id`='$EmpID'";
// die;
//$fetch   = mysqli_query($conn, "SELECT `us`.`Id`, `us`.`emp_name`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`us`.`permanent_address`,`desig`.`Designation`,`addsal`.`location`,`addsal`.`basic`, `addsal`.`hra_no`, `addsal`.`cca`, `addsal`.`Provident_fund@ 12%`, `addsal`.`advance`, `addsal`.`esi@ 0.75%`, `addsal`.`special_all(SPL)`, `addsal`.`monthly_bonus`, `addsal`.`other_all`, `addsal`.`Professional_tax`, `addsal`.`lwa_amount`, `addsal`.`lop_amounts`, `addsal`.`gross_earning`, `addsal`.`total_deductions`, `addsal`.`salary_in_words`, `addsal`.`net_payble`, `addsal`.`Provident_funds@ 13%`, `addsal`.`working_day`, `addsal`.`esi_@ 3.25%`, `addsal`.`total_days`, `addsal`.`accident_insurance`,`addsal`.`loss_of_pay`,`addsal`.`total_contribution`, `addsal`.`ctc_wages`,`addsal`.`month`,`addsal`.`year`,`addsal`.`amount`,`addsal`.`total_payble`,`addsal`.`gross_salary`,`addsal`.`date_of_salary_transfer`,`addsal`.`salary_release_mode`,`addsal`.`deductions` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id` where `us`.`Id`='$EmpID'");
$fetch = mysqli_query($conn,"SELECT `us`.`Id`, `us`.`emp_name`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`us`.`permanent_address`,`desig`.`Designation`,`addsal`.`location`,`addsal`.`basic`, `addsal`.`hra_no`, `addsal`.`cca`, `addsal`.`Provident_fund@ 12%`, `addsal`.`advance`, `addsal`.`esi@ 0.75%`, `addsal`.`special_all(SPL)`, `addsal`.`monthly_bonus`, `addsal`.`other_all`, `addsal`.`Professional_tax`, `addsal`.`lwa_amount`, `addsal`.`lop_amounts`, `addsal`.`gross_earning`, `addsal`.`total_deductions`, `addsal`.`salary_in_words`, `addsal`.`net_payble`, `addsal`.`Provident_funds@ 13%`, `addsal`.`working_day`, `addsal`.`esi_@ 3.25%`, `addsal`.`total_days`, `addsal`.`accident_insurance`,`addsal`.`loss_of_pay`,`addsal`.`total_contribution`, `addsal`.`ctc_wages`,`addsal`.`month`,`addsal`.`year`,`addsal`.`amount`,`addsal`.`total_payble`,`addsal`.`gross_salary`,`addsal`.`date_of_salary_transfer`,`addsal`.`salary_release_mode`,`addsal`.`deductions`,`msd`.`total_benefit_monthly` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id` LEFT JOIN `master_salary_data` `msd` ON `us`.`Id`=`msd`.`user_id` where `us`.`Id`='$EmpID'");
$rowdata = mysqli_fetch_array($fetch);
$month=$rowdata["month"];

//Salary Mode
$fetch_salary_mode   = mysqli_query($conn, "SELECT `addsal`.`salary_release_mode` FROM `add_salary_slip` `addsal` LEFT JOIN `salary_release_mode` `srm` ON `addsal`.`salary_release_mode`=`srm`.`Id` where `addsal`.`user_id`='$EmpID'");
$salary_data = mysqli_fetch_array($fetch_salary_mode);
$salarymode=$salary_data["salary_release_mode"];
//Salary Mode
?>
<style>
#outerdiv
{
  width: 63%;
  height: 1000px;
  margin-left: 202px;
  border:1px solid black;
}
#table1
{
  
  width: 852px;
  margin-left: 24px;
}
#table2
{
  width: 852px;
  margin-left: 24px;
}
#table3
{
  width: 852px;
  margin-left: 24px;
}
.mm
{
  width:150px;
}
.text
{
  text-align: center;
}
.textt
{
  text-align: right;
}
.h-text
{
  text-align: center;
  color:solid black;
}
#sublogo
{
  font-size: 10px;
  margin-left:57px;
  margin-top:-14px;
}
#images
{
  width:60px;
  height:40px;
  margin-top:7px;
}

  @page {
      size: A4;
      margin: 0;
  }
  @media print {
      html, body {
          width: 210mm;
          height: 297mm;
      }
      .h-text {
        text-align: center;
      }
    /* #sublogo
      {
        font-size: 10px;
        margin-left:62px;
        margin-top:-16px;
      } */
  
      #images
  {
    width:60px;
    height:40px;
    margin-top:7px;
  }
}
</style>
<main id="main" class="main">
<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
       <div class="full graph_head">
       <form action="#" method="GET">
          <a class="btn btn-primary" href="PFC.php?PageName=add_salary_slip" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;float:right;" role="button">Back</a>
        </form>
           <div class="pagetitle">
            <h1><u>Employee Pay Slip:-</u></h1>
           </div>
          </div> 
          <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
                <div class="card-body">
                <div id="outerdiv">
                  <div id="tableContainer">
                  <center><h5 class="card-title text-center"><img id="images" src="assets/img/latech.jfif" alt="LatechLogo">&nbsp;LATECH SOLUTIONS<br/><p id="sublogo">Solutions For Everyone</p></h5></center></br>
                 <table  class="table table-bordered border-dark" border="2"  id="table1" width="100%">
                 <thead>
                  <tr>
                    <!-- <th scope="col" colspan="5" class="h-text">Payslip for the Month of May 2023</th> -->
                    <th scope="col" colspan="5" class="h-text">Payslip for the Month of <?php $salary_month=$rowdata["month"]; $months = array(1 => 'January',2 => 'February',3=> 'March',4 => 'April',5 => 'May',6 => 'June',7 => 'July',8 => 'August',9 => 'September',10 => 'October',11 => 'November',12 => 'December'); echo $months[$salary_month].' '.$rowdata["year"];?></th>
                  </tr>
               </thead>
        <tbody>
    
        <tr>
          <th scope="col" class="mm">EMP Code</th>
          <td class="text"><?php echo $rowdata["emp_code"];?></td>
          <th scope="row" class="mm">Aadhar Number</th>
          <td class="text"><?php echo $rowdata["aadhar_no"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">EmpName</th>
          <td class="text"><?php echo $rowdata["emp_name"];?></td>
          <th scope="row" class="mm">Pan Number</th>
          <td class="text"><?php echo $rowdata["pan_no"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">Date Of Joining</th>
          <td class="text"><?php  echo $rowdata["joining_date"];?></td>
          <th scope="row" class="mm">UAN Number</th>
          <td class="text"><?php echo $rowdata["uan_no"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">Designation</th>
          <td class="text"><?php echo $rowdata["Designation"];?></td>
          <th scope="row" class="mm">PF Number</th>
          <td class="text"><?php echo $rowdata["pf_no"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">Project</th>
          <td class="text"><?php echo $rowdata["project_name"];?></td>
          <th scope="row" class="mm">ESI Number</th>
          <td class="text"><?php echo $rowdata["esi_no"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">Address</th>
          <td class="text"><?php echo $rowdata["permanent_address"];?></td>
          <th scope="row" class="mm">Account Number</th>
          <td class="text"><?php echo $rowdata["account_number"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">Month</th>
          <!-- <td class="text"><?php //echo $first_date = date('F',strtotime('first day of this month')) ?></td> -->
          <td class="text"><?php $salary_mo=$rowdata["month"]; $month = array(1 => 'January',2 => 'February',3=> 'March',4 => 'April',5 => 'May',6 => 'June',7 => 'July',8 => 'August',9 => 'September',10 => 'October',11 => 'November',12 => 'December'); echo $month[$salary_mo];?></td>
          
          <th scope="row" class="mm">Year</th>
          <td class="text"><?php echo $rowdata["year"];?></td>
        </tr>
    </tbody>
   </table><br>
   <table class="table table-bordered border-dark" id="table2"  border="2" width="100%">
      <thead>
        <tr>
            <th scope="col" colspan="2" class="h-text">EARNING</th>
            <th scope="col" colspan="2" class="h-text">DEDUCTIONS</th>
        </tr>
      </thead>
  <tbody>
        <tr>
          <th scope="row" class="mm">Basic</th>
          <td class="textt"><?php echo $rowdata["basic"];?></td>
          <th scope="row" class="mm">Provident Fund@12%</th>
          <td class="textt"><?php echo $rowdata["Provident_fund@ 12%"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">HRA</th>
          <td class="textt"><?php echo $rowdata["hra_no"];?></td>
          <th scope="row" class="mm">Advance</th>
          <td class="textt"><?php echo $rowdata["advance"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">CCA</th>
          <td class="textt"><?php echo $rowdata["cca"];?></td>
          <th scope="row" class="mm">ESI@0.75%</th>
          <td class="textt"><?php echo $rowdata["esi@ 0.75%"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">Special Allowance</th>
          <td class="textt"><?php echo $rowdata["special_all(SPL)"];?></td>
          <th scope="row" class="mm">Professional Tax</th>
          <td class="textt"><?php echo $rowdata["Professional_tax"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">Monthly Bonus</th>
          <td class="textt"><?php echo $rowdata["monthly_bonus"];?></td>
          <th scope="row" class="mm">LWF</th>
          <td class="textt"><?php echo $rowdata["lwa_amount"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">Other Allowance</th>
          <td class="textt"><?php echo $rowdata["other_all"];?></td>
          <th scope="row" class="mm">LOP</th>
          <td class="textt"><?php echo $rowdata["lop_amounts"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">GROSS EARNINGS</th>
          <td class="textt"><?php echo $rowdata["gross_earning"];?></td><!--total_earninig is now gross_earning	--->
          <th scope="row" class="mm">TOTAL DEDUCTION</th>
          <td class="textt"><?php echo $rowdata["deductions"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">(salary in words)</th>
          <td class="textt"><?php echo $rowdata["salary_in_words"];?></td>
          <th scope="row" class="mm">NET PAYABLE</th>
          <td class="textt"><?php echo $rowdata["total_payble"];?></td><!--Net Payable is total_payble--->
        </tr>
  </tbody>
</table><br>
<table class="table table-bordered border-dark" id="table3"  border="2" width="100%">
  <thead>
    <tr>
      <th scope="col"  colspan="2" class="h-text">EMPLOYEE'S CONTRIBUTION</th>
      <th scope="col" colspan="2" class="h-text">LEAVE DETAILS</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <th scope="row" class="mm">Provident Fund@13%</th>
          <td class="textt"><?php echo $rowdata["Provident_funds@ 13%"];?></td>
          <th scope="row" class="mm">Working Days</th>
          <td class="textt"><?php echo $rowdata["working_day"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">ESI@3.25%</th>
          <td class="textt"><?php echo $rowdata["esi_@ 3.25%"];?></td>
          <th scope="row" class="mm">Days Payable</th>
          <td class="textt"><?php echo $rowdata["total_days"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">Accidental Insurance</th>
          <td class="textt"><?php echo $rowdata["accident_insurance"];?></td>
          <th scope="row" class="mm">Leave Taken</th>
          <td class="textt"><?php echo $rowdata["leave_taken"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm"></th>
          <td class="textt"></td>
          <th scope="row" class="mm">Loss of Pay</th>
          <td class="textt"><?php echo $rowdata["loss_of_pay"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">TOTAL CONTRIBUTION</th>
          <td class="textt"><?php echo $rowdata["total_contribution"];?></td>
          <th scope="row" class="mm">MONTHLY CTC</th>
          <td class="textt"><?php echo $rowdata["total_benefit_monthly"];?></td>
        </tr>
        <tr>
          <th scope="row" class="mm">Date of Salary Transfer</th>
          <td class="textt"><?php echo $rowdata["date_of_salary_transfer"];?></td>
          <th scope="row" class="mm">Salary Release Mode</th>
          <td class="textt"><?php echo $salarymode;?></td>
        </tr>
  </tbody>
</table><br>
<center><div class="h-text"><b>Note: This is System Generated PaySlip,Sign Not Required.</b></div></center>
</div>
</div>
<br/>
<button onclick="printDiv('outerdiv')" class="btn btn-primary">Print Pay Slip</button>
</div>
</div>

</div>

</div>
</div>
</div>
</main>
<script type="text/Javascript">
  function printDiv(divId) {
    var divToPrint = document.getElementById(divId);
    var newWin = window.open('', 'Print-Window');
    newWin.document.open();
   
    newWin.document.write('<html><head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"><style>.table-bordered{border:2px solid black;}th, td {padding:8px;text-align:left;border-bottom:1px solid #ddd;}.mm{width:150px;font-size:12px;}.text{text-align:center;font-size: 12px;}.textt{text-align:right;}.h-text{text-align:center;color:solid black;} #sublogo{font-size:12px;margin-left:127px;margin-top:-43px;} #images{width:120px;height:100px;margin-top:7px;}@page{size: portrait;margin:20px;margin-top: 20px;}@media print { html,body { width:1050px;height:2000px;} #outerdiv{width:72%;height:1000px;margin-left:202px;border:2px solid black;}#table1{width:100%;margin-left:15px;}#table2{width:100%;margin-left:15px;}#table3{width:100%;margin-left:15px;}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
    //document.write(divToPrint);
    //return false;
    newWin.document.close();
    setTimeout(function () {
        newWin.close();
    }, 10);
}
</script>