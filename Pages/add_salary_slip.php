<?php
//error_reporting(0);
//session_start();
//error_reporting (E_ALL);
include 'connection.php';
include('pagi_script.php');
?>
<?php
 if(isset($_POST['Add'])) 
 {
  $emp_name = CF($_POST['emp_name'],$conn);
  //$emp_name = CF($_POST['em_id'],$conn);
  $desig_id = CF($_POST['desg_idd'],$conn);
  $depart_id = CF($_POST['dept_id'],$conn);
  //$depart_id='';
  $project_name = CF($_POST['project_name'],$conn);
  $aadhar_no = CF($_POST['aadhar_no'],$conn);
  $pan_no = CF($_POST['pan_no'],$conn);
  $Esi_no = CF($_POST['Esi_no'],$conn);
  $pf_no = CF($_POST['pf_no'],$conn);
  $joining_date = CF($_POST['joining_date'],$conn);
  $father_name = CF($_POST['father_name'],$conn);
  $location = CF($_POST['location'],$conn);
  $account_number = CF($_POST['account_number'],$conn);
  $bank_name = CF($_POST['bank_name'],$conn);
  $branch_name = CF($_POST['branch_name'],$conn);
  $ifsc_code = CF($_POST['ifsc_code'],$conn);
  $basic = CF($_POST['basic'],$conn);
  $hra_no = CF($_POST['hra_no'],$conn);
  $cca = CF($_POST['cca'],$conn);
  $Provident_fund = CF($_POST['Provident_fund'],$conn);
  $advance = CF($_POST['advance'],$conn);
  $esi_amount = CF($_POST['esi_amount'],$conn);
  $special_all = CF($_POST['special_all'],$conn);
  $monthly_bonus = CF($_POST['monthly_bonus'],$conn);
  $other_all = CF($_POST['other_all'],$conn);
  $Professional_tax = CF($_POST['Professional_tax'],$conn);
  $lwa_amount = CF($_POST['lwa_amount'],$conn);
  $lop_amounts = CF($_POST['lop_amounts'],$conn);
  $gross_earning = CF($_POST['gross_earning'],$conn);
  $total_deductions = CF($_POST['total_deductions'],$conn);
  $salary_in_words = CF($_POST['salary_in_words'],$conn);
  $net_payble = CF($_POST['net_payble'],$conn);
  $Provident_funds = CF($_POST['Provident_funds'],$conn);
  $working_dayys = CF($_POST['working_days'],$conn);
  $esi_amounts = CF($_POST['esi_amounts'],$conn);
  $total_days = CF($_POST['total_days'],$conn);
  $accident_insurance = CF($_POST['accident_insurance'],$conn);
  $leave_taken = CF($_POST['leave_taken'],$conn);
  $loss_of_pay = CF($_POST['loss_of_pay'],$conn);
  $total_contribution = CF($_POST['total_contribution'],$conn);
  $ctc_wages = CF($_POST['monthly_ctc'],$conn);
  // $date = date("Y-m-d h:i:s A");
  // $month=date("m");
  // $year=date("Y");
  $month=CF($_POST['month'],$conn);
  $year=CF($_POST['year'],$conn);
  $amount=CF($_POST["amount"],$conn);
  $gross_salary=CF($_POST["gross_salary"],$conn);
  $total_payble=CF($_POST["total_payble"],$conn);
  $dateofsalarytrans=CF($_POST["dateofsalarytrans"],$conn);
  $salary_mode=CF($_POST["salary_mode"],$conn);
  $over_time = CF($_POST['overtime'],$conn);//new added
  $expenses = CF($_POST['expenses'],$conn);//new added on 24-08-2023
  $deductions = CF($_POST['deductions'],$conn);//new added on 24-08-2023
  //expenses
 echo  $sql_insert="INSERT INTO `add_salary_slip`(`user_id`, `desig_id`, `dept_id`, `project_name`, `location`, `account_number`, `bank_name`, `branch_name`, `ifsc_code`, `basic`, `hra_no`, `cca`, `Provident_fund@ 12%`, `advance`, `esi@ 0.75%`, `special_all(SPL)`, `monthly_bonus`, `other_all`, `Professional_tax`, `lwa_amount`, `lop_amounts`, `gross_earning`, `total_deductions`, `salary_in_words`, `net_payble`, `Provident_funds@ 13%`, `working_day`, `esi_@ 3.25%`, `total_days`, `accident_insurance`, `leave_taken`, `loss_of_pay`, `total_contribution`, `ctc_wages`, `month`, `year`, `amount`, `gross_salary`, `total_payble`, `date_of_salary_transfer`, `salary_release_mode`,`overtime`,`expenses`,`deductions`) 
 VALUES ('$emp_name',
 '$desig_id',
 '$depart_id',
 '$project_name',
 '$location',
 '$account_number',
 '$bank_name',
 '$branch_name',
 '$ifsc_code',
 '$basic',
 '$hra_no',
 '$cca',
 '$Provident_fund',
 '$advance',
 '$esi_amount',
 '$special_all',
 '$monthly_bonus',
 '$other_all',
 '$Professional_tax',
 '$lwa_amount',
 '$lop_amounts',
 '$gross_earning',
 '$total_deductions',
 '$salary_in_words',
 '$net_payble',
 '$Provident_funds',
 '$working_dayys',
 '$esi_amounts',
 '$total_days',
 '$accident_insurance',
 '$leave_taken',
 '$loss_of_pay',
 '$total_contribution',
 '$ctc_wages',
 '$month',
 '$year',
 '$amount',
 '$gross_salary',
 '$total_payble',
 '$dateofsalarytrans',
 '$salary_mode',
 '$over_time','$expenses','$deductions')";
  //  echo $sql_insert;
  // die;
$a=mysqli_query($conn,$sql_insert);
header("location:PFC.php?PageName=add_salary_slip");
  // if ($a == true) {
  //   header('location:view_salary_slip.php');
  //   echo "<script>alert('New Add Salary created successfully');</script>";
  //   } else {
  //   echo "<script>alert('Error: " . $arr . "<br>" . $a->error."');</script>";
  //   }
}

?>
<main id="main" class="main">



<!-- <h5><u><b>Add Salary Slip:-</b></u></h5><br/><br/> -->
<!-- Start dashboard inner -->
<section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
          <div class="card-header"> 
          <nav class="navbar navbar-light bg-light">
          <form method="POST">
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="float:right;margin-right: -1249px;margin-top: 1px;display:none;" id="addsalary">+ Add Salary</button>
                 <input type="text" name="searchvalue" style="height:39px;padding:6px;width:300px;margin-left: 4px;"  placeholder="Search Here...." value="">&nbsp;&nbsp;
                 <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                </form>  
                 <h2 style="color:#012970;margin-right:37px;margin-top: -2px;"><b>VIEW SALARY SLIP</b></h2>      
                   </nav><br><br>
            <div class="card-body">
              <!-- Default Accordion -->
              <?php              
                    $months = array(1 => 'January',2 => 'February',3=> 'March',4 => 'April',5 => 'May',6 => 'June',7 => 'July',8 => 'August',9 => 'September',10 => 'October',11 => 'November',12 => 'December');
                    foreach($months as $monthNum => $monthName) 
                    {?> 
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $monthNum;?>" aria-expanded="true" aria-controls="collapseOne<?php echo $monthNum;?>">
                     <?php echo $monthName.' '.$_SESSION["YEAR"];?>
                    </button>
                  </h2>
                  <div id="collapseOne<?php echo $monthNum;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
<!--Data table--->
                  <!-- <nav class="navbar navbar-light bg-light">
                      <form method="POST">
                          <a class="btn btn-warning text-black" href="" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;" role="button">Back</a>&nbsp;&nbsp;
                            <input type="text" name="searchvalue" style="margin:-25;height:39px;padding:6px;width:300px;"  placeholder="Search Here...." value="">&nbsp;&nbsp;
                            <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                        </form>  -->
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="margin:right;" id="addsalary">+ Add Salary</button> -->
                          </div>   
                        <!--table start-->
                        <div class="card-body">
                            <table id="myTabless11" class="table" style="width:100%">
                            <thead class="thead-pink">
                              <tr>
                                <th>S.No</th>
                                <th>Emp_Code</th>
                                <th>Emp Name</th>
                                <th>Paid Salary</th>
                                <th>Month/Year</th> 
                                <th>Designation/Department</th>   
                                <th style="text-align: center;"><b> Action</b></th>
                              </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $pfc_uid=$_SESSION['PFC_UID'];
                                  if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5))
                                  {
                                     $sql = "SELECT `asal`.*, `us`.`Id`,`us`.`emp_code`,`us`.`emp_name`,CONCAT(DATE_FORMAT(CONCAT(`asal`.`year`, '-', `asal`.`month`, '-01'), '%M'), ' ', year) AS `month_and_year`,`asal`.`month`,`asal`.`year`,concat(`desig`.`Designation`, ' / ' ,`depart`.`department`) as `Desig_n_Depart`FROM `add_salary_slip` `asal` LEFT JOIN `employee` `us` ON `asal`.`user_id`=`us`.`Id` LEFT JOIN `designation` `desig` ON `asal`.`desig_id`=`desig`.`desig_id` LEFT JOIN `department` `depart` ON `asal`.`dept_id`=`depart`.`dept_id` where `us`.`emp_status`='1' AND `month`='$monthNum' order by `us`.Id";
                                  }
                                  elseif(($_SESSION['PFC_EmpRole']!=1) || ($_SESSION['PFC_EmpRole']!=5))
                                  {
                                    $sql = "SELECT `asal`.*, `us`.`Id`,`us`.`emp_code`,`us`.`emp_name`,CONCAT(DATE_FORMAT(CONCAT(`asal`.`year`, '-', `asal`.`month`, '-01'), '%M'), ' ', year) AS `month_and_year`,`asal`.`month`,`asal`.`year`,concat(`desig`.`Designation`, ' / ' ,`depart`.`department`) as `Desig_n_Depart`FROM `add_salary_slip` `asal` LEFT JOIN `employee` `us` ON `asal`.`user_id`=`us`.`Id` LEFT JOIN `designation` `desig` ON `asal`.`desig_id`=`desig`.`desig_id` LEFT JOIN `department` `depart` ON `asal`.`dept_id`=`depart`.`dept_id` where `us`.`emp_status`='1' AND `month`='$monthNum' AND `us`.`Id`='".$_SESSION['PFC_UID']."' order by `us`.Id desc";
                                  }

                                  if(isset($_POST['submitsearch']))
                                  {
                                    if(($_SESSION['PFC_EmpRole']!=1) || ($_SESSION['PFC_EmpRole']!=5))
                                    {
                                      $filtervalue=strtoupper($_REQUEST['searchvalue']);
                                      $sql = "SELECT `us`.`Id`,`us`.`emp_code`,`us`.`emp_name`,CONCAT(DATE_FORMAT(CONCAT(`asal`.`year`, '-', `asal`.`month`, '-01'), '%M'), ' ', year) AS `month_and_year`,`asal`.`month`,`asal`.`year`,concat(`desig`.`Designation`, ' / ' ,`depart`.`department`) as `Desig_n_Depart` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `department` `depart` ON `us`.`dept_id`=`depart`.`dept_id` where `us`.`emp_status`='1' AND `us`.`Id`='$pfc_uid' AND `us`.`emp_name` LIKE '%$filtervalue%' AND `month`='$monthNum' order by `us`.Id desc";
                                    }
                                    if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5))
                                    {
                                      $filtervalue=strtoupper($_REQUEST['searchvalue']);
                                      $sql = "SELECT `asal`.*, `us`.`Id`,`us`.`emp_code`,`us`.`emp_name`,CONCAT(DATE_FORMAT(CONCAT(`asal`.`year`, '-', `asal`.`month`, '-01'), '%M'), ' ', year) AS `month_and_year`,`asal`.`month`,`asal`.`year`,concat(`desig`.`Designation`, ' / ' ,`depart`.`department`) as `Desig_n_Depart`FROM `add_salary_slip` `asal` LEFT JOIN `employee` `us` ON `asal`.`user_id`=`us`.`Id` LEFT JOIN `designation` `desig` ON `asal`.`desig_id`=`desig`.`desig_id` LEFT JOIN `department` `depart` ON `asal`.`dept_id`=`depart`.`dept_id` where `us`.`emp_status`='1' AND `us`.`Id`='$pfc_uid' AND `us`.`emp_name` LIKE '%$filtervalue' OR `us`.`emp_name` LIKE '$filtervalue%' OR `us`.`emp_name` LIKE '%$filtervalue%' AND `month`='$monthNum' order by `us`.Id";
                                    }
                                  }
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) 
                                  {
                                    $cnt=1;
                                      while($row = $result->fetch_assoc()) 
                                    {
                                      ?>
                                    <tr>
                                    <td><?php echo $cnt++;?></td>
                                      <td><?php echo $row["emp_code"];?></td>
                                      <td><?php echo $row["emp_name"];?></td>
                                      <td><?php echo $row["total_payble"];?></td>
                                      <td><?php echo $row["month_and_year"];?></td>
                                      <td><?php echo $row["Desig_n_Depart"];?></td>
                                      <td>
                                      <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Action
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <form method="POST">
                                        <?php if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5)) {?>
                                        <button id="singlebutton" name="empView" value="<?php echo $row["Id"]; ?>" data-bs-toggle='modal' class='btn btn-primary showbtn' onclick="PaySlip(this.value)">PaySlip</button>
                                        <button id="singlebuttonedit" name="empEdit" value="<?php echo $row["Id"]; ?>" data-bs-toggle='modal' class='btn btn-success editbtn'>Edit</button>
                                        <input type="hidden" name="month_salary_month" id="month_salary_month" value="<?php echo $row["month"];?>">
                                        <input type="hidden" name="year_salary_year" id="year_salary_year" value="<?php echo $row["year"];?>">
                                        <?php } else {?>
                                          <button id="singlebutton" name="empView" value="<?php echo $row["Id"]; ?>" data-bs-toggle='modal' class='btn btn-primary showbtn' onclick="PaySlip(this.value)">PaySlip</button>
                                          <input type="hidden" name="month_salary_month" id="month_salary_month" value="<?php echo $row["month"];?>">
                                        <input type="hidden" name="year_salary_year" id="year_salary_year" value="<?php echo $row["year"];?>">
                                          <?php } ?>
                                        <input type="hidden" name="pfc_role" id="pfc_role" value="<?php echo $_SESSION['PFC_EmpRole'];?>">
                                     </form>
                                         </div>
                                        </div>
                                     </td>
                                      </tr>
                                    <?php
                                    }
                                  }
                                  ?>
                              
                                </tbody>
                            </table>
                            <?php
                              //  $sql1="SELECT * from `add_salary_slip`";
                              //   echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
                            ?>
                          </div>
                          </div>
                          </div>
                          <?php } ?>
                        <!--table End-->
      <!-- Modal -->
      
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <Form  method="POST" >
        <div class="modal-header">
              <legend class="card-title"  id="myModalLabel"><u style="color:blue;">Add Salary :-</u></legend>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              <legend class="scheduler-border mt-2">&nbsp;&nbsp;<u style="color:blue;">EMPLOYEE DETAILS:-</u></legend>
                 <div class="modal-body">
                          <div class="form-group">
                          <div class="row">
                          <div class="col-4">
                                        <label for="emp_id" class="form-label">Select Employee * </label>
                                        <select name="emp_name"  class="fstdropdown-select form-control emp_name" id="emp_name" data-live-search="true"  data-size="8" tabindex="null">
                                            <option value="NA">Select Employee</option>
                                            <?php 
                                                $sql="SELECT * FROM `employee` where `Id`!='1'";
                                                $result = mysqli_query($conn,$sql);
                                                while( $row = mysqli_fetch_array($result))
                                                {
                                             ?>
                                            <option value="<?php echo $row["Id"];?>"><?php echo $row["emp_name"];?></option>
                                          <?php } ?>
                                    </select>
                                    <input type="hidden" name="em_id" id="em_id">
                                    </div>
                                      <div class="col-4">
                                        <label for="text" class="form-label">Month <span style="color: red">*</span></label>
                                        <select class="month form-control" name="month" id="month" required>
                                        <!-- onchange="salary_month()" -->
                                        <option value="NA">--SELECT MONTH--</option>
                                        <?php
                                        $months = array(1 => 'January',2 => 'February',3 => 'March',4 => 'April',5 => 'May',6 => 'June',7 => 'July',8 => 'August',9 => 'September',10 => 'October',11 => 'November',12 => 'December');
                                        foreach($months as $monthNum => $monthName) { ?>
                                          <option value="<?php echo $monthNum; ?>"><?php echo $monthName; ?></option>
                                        <?php } ?>
                                      </select>
                                      </div>
                                      <div class=" col-4">
                                        <label for="text" class="form-label">Year <span style="color: red">*</span></label>
                                        <select class="year form-control" name="year" id="year" required>
                                        <option value="NA">--SELECT YEAR--</option>
                                        <?php
                                            for($n=2022;$n<=2050;$n++)
                                            {
                                        ?>
                                      <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                                      <?php
                                            }
                                      ?>
                                      </select>
                                      </div>
                                      </div>
                                      </br><!-- </br> -->
                                 <div class="row">
                                 <div class="col-6">
                                                <label for="text" class="form-label">Days Payable <span style="color: red">*</span></label>
                                                <input type="text" class="total_days form-control" name="total_days" id="total_days" required>
                                                <input type="hidden" class="total_days form-control" name="salarymonth" id="salarymonth">
                                  </div>
                                 <div class="col-6">
                                              <label for="text" class="form-label">OT(Over Time in Hours) <span style="color: red">*</span></label>
                                              <input type="text" class="working_day form-control" name="overtime" id="overtime" onkeyup="over_time_cal()">
                                 </div>
                                </div><br/>
                                <div class="row">
                                 <div class="col-12">
                                                <label for="text" class="form-label">Expenses <span style="color: red">*</span></label>
                                                <input type="text" class="total_days form-control" name="expenses" id="expenses" required>
                                            </div>
                                </div><br><br>
                              <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">Large Modal</button> -->
                               <center> <button type="button" class="btn btn-success" name="salary_mode" id="salary_mode" onclick="GetDetail()">Calculation </button></center>
                                <br><!-- <hr> -->
                                  <div class="row">
                                  <div class="col-4">
                                        <label for="desig_id" class="form-label"> Designation </label>
                                        <input type="text" name="desig_id"  class="desig_id form-control" id="desig_id" readonly>
                                        <input type="hidden" name="desg_idd"  class="desg_idd form-control" id="desg_idd">
                                        <input type="hidden" name="dept_id"  class="dept_id form-control" id="dept_id">
                                    </div>
                                  <div class="col-4">
                                        <label for="project_name" class="form-label">Project Name <span style="color: red">*</span></label>
                                        <input type="text" class="project_name form-control" name="project_name" id="project_name" readonly>
                                    </div>
                                      <div class="col-4">
                                          <label for="aadhar_no" class="form-label">Aadhar No<span style="color: red">*</span></label>
                                          <input type="text" class="aadhar_no form-control" name="aadhar_no" id="aadhar_no"  placeholder="Enter Aadhar No" readonly>
                                      </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-4">
                                          <label for="text" class="form-label">PAN No <span style="color: red">*</span></label>
                                          <input type="text"  class="pan_no form-control"  placeholder="Enter PAN No "  maxlength="10" name="pan_no" id="pan_no" readonly>
                                      </div>
                                    <div class="col-4">
                                          <label for="uan_no" class="form-label">UAN No <span style="color: red">*</span></label>
                                          <input type="text"  class="uan_no form-control"   placeholder="Enter UAN No " name="uan_no" id="uan_no" readonly>
                                      </div>
                                        <div class="col-4">
                                            <label for="Esi_no" class="form-label">ESI No <span style="color: red">*</span></label>
                                            <input type="text" class="Esi_no form-control" name="Esi_no" maxlength="10" placeholder="Enter ESI No" id="Esi_no" readonly>
                                        </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                  <div class="col-4">
                                            <label for="pf_no" class="form-label">PF No <span style="color: red">*</span></label>
                                            <input type="text"  class="pf_no form-control"  placeholder="Enter PF No "name="pf_no" id="pf_no" readonly>
                                        </div>
                                  <div class="col-4">
                                        <label for="text" class="form-label">Date Of Joining <span style="color: red">*</span></label>
                                        <input type="text" name="joining_date" class="joining_date  form-control"  id="joining_date" readonly>
                                    </div>
                                      <div class="col-4">
                                          <label for="text" class="form-label">Father Name <span style="color: red">*</span></label>
                                          <input type="text" name="father_name" class="father_name  form-control"  id="father_name" readonly>
                                      </div>
                                  </div>
                                <br>
                                  <div class="row">
                                  <div class="col-4">
                                          <label for="text" class="form-label">Location <span style="color: red">*</span></label>
                                          <input type="text" name="location" class="location   form-control"  id="location" readonly>
                                      </div>
                                  <div class=" col-4">
                                        <label for="text" class="form-label">Account Number <span style="color: red">*</span></label>
                                        <input type="text" class="account_number form-control" name="account_number" id="account_number" readonly>
                                    </div>
                                      <div class="col-4">
                                        <label for="text" class="form-label">Bank Name <span style="color: red">*</span></label>
                                        <input type="text" class="bank_name form-control" name="bank_name" id="bank_name" readonly>
                                      </div>
                                      </div><br>
                                      <div class="row">
                                      <div class="col-6">
                                        <label for="text" class="form-label">Branch Name <span style="color: red">*</span></label>
                                        <input type="text" class="branch_name form-control" name="branch_name" id="branch_name" readonly>
                                      </div>
                                      <div class="col-6">
                                        <label for="text" class="form-label">IFSC Code <span style="color: red">*</span></label>
                                        <input type="text" class="ifsc_code form-control" name="ifsc_code" id="ifsc_code" readonly>
                                      </div>
                                      </div><br>
 <br>                                                                        
          <!--Bank Details Start-->
                              <fieldset class="scheduler-border">
                                  <!-- <legend class="scheduler-border mt-2">EARNINGS & DEDUCTIONS</legend> -->
                                  <legend class="scheduler-border mt-2"><u style="color:blue;">EMPLOYEE SALARY:-</u></legend>
                                  <div class="row">
                                      <div class="col mt-3">
                                          <div class="row">
                                              <div class="col-4">
                                                  <label for="text" class="form-label">BASIC<span style="color: red">*</span></label>
                                                  <input type="text" class="basic form-control" name="basic" id="basic" placeholder="Enter basic" onclick="count_salary()" readonly>
                                                  <input type="hidden" class="basic form-control" name="basic1" id="basic1"  placeholder="Enter basic" readonly>
                                                  <!-- onclick="count_salary()" -->
                                                </div>
                                              <div class="col-4">
                                                  <label for="text" class="form-label">HRA <span style="color: red">*</span></label>
                                                  <input type="text" class="hra_no form-control" name="hra_no"  id="hra_no" readonly>
                                                  <input type="hidden" class="hra_no form-control" name="hra_no1"  id="hra_no1">
                                              </div>
                                              <div class="col-4">
                                                <label for="text" class="form-label">Special Allowance<span style="color: red">*</span></label>
                                                <input type="text" class="special_all form-control" name="special_all"  id="special_all" readonly>
                                            </div>
                                              <div class="col-4">
                                                <!-- <label for="text" class="form-label">CCA <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="cca form-control" name="cca" id="cca" value="0" readonly>
                                            </div>
                                          </div><br>
                                          <div class="row">
                                          <div class="col-6">
                                                <label for="text" class="form-label">Other Allowance <span style="color: red">*</span></label>
                                                <input type="text" class="other_all form-control" name="other_all"  id="other_all" readonly>
                                            </div>
                                           
                                            <div class="col-6">
                                                <label for="text" class="form-label" style="color: red"><b>Gross Earning </b><span style="color: red">*</span></label>
                                                <input type="text" class="gross_earning form-control" name="gross_earning" id="gross_earning" >
                                            </div>
                                              <div class="col-4">
                                                  <!-- <label for="text" class="form-label">Advance <span style="color: red">*</span></label> -->
                                                  <input type="hidden" class="advance form-control" name="advance" id="advance" value="0" readonly>
                                              </div>
                                          </div><br>
                                          <div class="row">
                                            <!-- <div class="col-4">
                                                <label for="text" class="form-label">Special Allowance<span style="color: red">*</span></label>
                                                <input type="text" class="special_all form-control" name="special_all"  id="special_all" readonly>
                                            </div> -->
                                            <!-- <div class="col-4">
                                                <label for="text" class="form-label">Gross Earning<span style="color: red">*</span></label>
                                                <input type="text" class="gross_earning form-control" name="gross_earning" id="gross_earning" >
                                            </div> -->
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Monthly Bonus <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="monthly_bonus form-control" name="monthly_bonus" id="monthly_bonus" value="0" readonly>
                                            </div>
                                            <!-- <div class="col-4">
                                                <label for="text" class="form-label">Other Allowance <span style="color: red">*</span></label>
                                                <input type="text" class="other_all form-control" name="other_all"  id="other_all" readonly>
                                            </div> -->
                                          </div><br>
          
                                          <div class="row">
                                              <div class="col-4">
                                                  <!-- <label for="text" class="form-label">Professional Tax<span style="color: red">*</span></label> -->
                                                  <input type="hidden" class="Professional_tax form-control" name="Professional_tax" id="Professional_tax" value="0" readonly>
                                              </div>
          
                                              <div class="col-4">
                                                  <!-- <label for="text" class="form-label">LWF <span style="color: red">*</span></label> -->
                                                  <input type="hidden" class="lwa_amount form-control" name="lwa_amount" id="lwa_amount" value="0" readonly>
                                              </div>
          
                                              <div class="col-4">
                                                  <!-- <label for="text" class="form-label">LOP <span style="color: red">*</span></label> -->
                                                  <input type="hidden" class="lop_amounts form-control" name="lop_amounts" id="lop_amounts"  value="0" readonly>
                                              </div>
                                          </div><br>
                                          <div class="row">
                                            <!-- <div class="col-3">
                                                <label for="text" class="form-label">TOTAL EARNINGS<span style="color: red">*</span></label>
                                                <input type="text" class="gross_earning form-control" name="gross_earning" id="gross_earning" >
                                            </div> -->
        
                                            <div class="col-3">
                                                <!-- <label for="text" class="form-label">TOTAL DEDUCATIONS <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="total_deductions form-control" name="total_deductions" id="total_deductions" value="0">
                                            </div>
        
                                            <!-- <div class="col-3"> -->
                                                <!-- <label for="text" class="form-label">Salary in words<span style="color: red">*</span></label> -->
                                                <!-- <input type="hidden" class="salary_in_words form-control" name="salary_in_words"  id="salary_in_words" value="0">
                                            </div> -->
                                            <div class="col-3">
                                                <!-- <label for="text" class="form-label">NET PAYABLE <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="net_payble form-control" name="net_payble"  id="net_payble" value="0">
                                            </div>
                                        </div>
                                      </div>

                                  </div>
                              </fieldset>

                              <fieldset class="scheduler-border">
                                <!-- <legend class="scheduler-border mt-2">EMPLOYER'S CONTRIBUTION  & LEAVE DETAILS</legend> -->
                                <legend class="scheduler-border mt-2"><u style="color:blue;">EMPLOYER CONTRIBUTION:-</u></legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <div class="row">
                                        <div class="col-6">
                                                  <label for="text" class="form-label">ESI@ 0.75% <span style="color: red">*</span></label>
                                                  <input type="text" class="esi_amount form-control" name="esi_amount"   id="esi_amounttt" readonly>
                                              </div>
                                              <div class="col-6">
                                                  <label for="text" class="form-label">Provident_fund@12%<span style="color: red">*</span></label>
                                                  <input type="text" class="Provident_fund form-control" name="Provident_fund" id="Provident_fund" readonly>
                                              </div>
                                              </div><br>
                                              <div class="row">
                                            <div class="col-6">
                                              <label for="text" class="form-label">Working Days <span style="color: red">*</span></label>
                                              <input type="text" class="working_days form-control" name="working_days" id="working_days">
                                          </div>
                                        </div>
                                        <!-- <br>-->
                                        <div class="row">
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Accident Insurance<span style="color: red">*</span></label> -->
                                                <input type="hidden" class="accident_insurance form-control" name="accident_insurance" id="accident_insurance" value="0" readonly>
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Leave Taken <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="leave_taken form-control" name="leave_taken" id="leave_taken" value="0" readonly>
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Loss of Pay <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="loss_of_pay form-control" name="loss_of_pay" value="0" readonly>
                                            </div>
                                        </div><!-- <br>-->
                                        <div class="row">
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">TOTAL CONTRIBUTION <span style="color: red">*</span></label> -->
                                                <!-- <input type="hidden" class="total_contribution form-control" name="total_contribution" id="total_contribution" value="0"> -->
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">MONTHLY CTC <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="monthly_ctc form-control" name="monthly_ctc" id="monthly_ctc" value="0">
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Amount <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="amount form-control" name="amount" value="0">
                                            </div>
                                        </div><!-- <br><br>-->
                                        <div class="row">
                                            <div class="col-6">
                                                <!-- <label for="text" class="form-label">Gross_Salary <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="gross_salary form-control" name="gross_salary" id="gross_salary" value="0">
                                            </div>
                                            <!-- <div class="col-6">
                                                <label for="text" class="form-label">Total_Payble <span style="color: red">*</span></label>
                                                <input type="text" class="total_payble form-control" name="total_payble" id="total_payble" onkeyup="emp_contri()">
                                            </div> -->
                                        </div><!-- <br><br>-->
                                        <!-- <div class="row"> -->
                                            <!-- <div class="col-6">
                                                <label for="text" class="form-label">Date Of Salary Transfer<span style="color: red">*</span></label>
                                                <input type="date" class="dateofsalarytrans form-control" name="dateofsalarytrans" id="dateofsalarytrans" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Salary Release Mode <span style="color: red">*</span></label>
                                                <select class="salary_mode form-control" name="salary_mode" id="salary_mode" required>
                                                 <option value="NA">--SELECT--</option>
                                                 <option value="CASH">CASH</option>
                                                 <option value="NEFT">NEFT</option>
                                                 <option value="CHEQUE">CHEQUE</option>
                                                </select>
                                            </div> -->
                                        <!-- </div>   -->
                                        <!-- <br><br>-->
                                    </div>
                                </div>
                            </fieldset><br/>
                              <!-- <br> -->
                              <fieldset class="scheduler-border">
                                <!-- <legend class="scheduler-border mt-2">EMPLOYER'S CONTRIBUTION  & LEAVE DETAILS</legend> -->
                                <legend class="scheduler-border mt-2"><u style="color:blue;">EMPLOYER'S CONTRIBUTION:-</u></legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <div class="row">
                                          <div class="col-6">
                                                <label for="text" class="form-label">ESI@ 3.25% <span style="color: red">*</span></label>
                                                <input type="text" class="esi_amounts form-control" name="esi_amounts" id="esi_amounts" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Provident_funds@ 13%<span style="color: red">*</span></label>
                                                <input type="text" class="Provident_funds form-control" name="Provident_funds" id="Provident_funds" readonly>
                                            </div>
                                            <div class="col-4">
                                              <!-- <label for="text" class="form-label">Working Days <span style="color: red">*</span></label> -->
                                              <input type="hidden" class="working_day form-control" name="working_day" id="working_day" value="0" readonly>
                                          </div>
                                        </div>
                                        <!-- <br>-->
                                        <div class="row">
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Accident Insurance<span style="color: red">*</span></label> -->
                                                <input type="hidden" class="accident_insurance form-control" name="accident_insurance" id="accident_insurance" value="0" readonly>
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Leave Taken <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="leave_taken form-control" name="leave_taken" id="leave_taken" value="0" readonly>
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Loss of Pay <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="loss_of_pay form-control" name="loss_of_pay" value="0" readonly>
                                            </div>
                                        </div><!-- <br>-->
                                        <div class="row">
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">TOTAL CONTRIBUTION <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="total_contribution form-control" name="total_contribution" id="total_contribution" value="0">
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">MONTHLY CTC <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="monthly_ctc form-control" name="monthly_ctc" id="monthly_ctc" value="0">
                                            </div>
                                            <div class="col-4">
                                                <!-- <label for="text" class="form-label">Amount <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="amount form-control" name="amount" value="0">
                                            </div>
                                        </div><!-- <br><br>-->
                                        <div class="row">
                                            <div class="col-6">
                                                <!-- <label for="text" class="form-label">Gross_Salary <span style="color: red">*</span></label> -->
                                                <input type="hidden" class="gross_salary form-control" name="gross_salary" id="gross_salary" value="0">
                                            </div>
                                            <!-- <div class="col-6">
                                                <label for="text" class="form-label">Total_Payble <span style="color: red">*</span></label>
                                                <input type="text" class="total_payble form-control" name="total_payble" id="total_payble" onkeyup="emp_contri()">
                                            </div> -->
                                        </div><!-- <br><br>-->
                                        <!-- <div class="row"> -->
                                            <!-- <div class="col-6">
                                                <label for="text" class="form-label">Date Of Salary Transfer<span style="color: red">*</span></label>
                                                <input type="date" class="dateofsalarytrans form-control" name="dateofsalarytrans" id="dateofsalarytrans" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Salary Release Mode <span style="color: red">*</span></label>
                                                <select class="salary_mode form-control" name="salary_mode" id="salary_mode" required>
                                                 <option value="NA">--SELECT--</option>
                                                 <option value="CASH">CASH</option>
                                                 <option value="NEFT">NEFT</option>
                                                 <option value="CHEQUE">CHEQUE</option>
                                                </select>
                                            </div> -->
                                        <!-- </div>   -->
                                        <!-- <br><br>-->
                                    </div>
                                </div>
                            </fieldset><br/>
                            
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border mt-2"><u style="color:blue;">DEDUCTIONS:-</u></legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <!-- <br> -->
                                        <div class="row">
                                        <div class="col-12">
                                                <label for="text" class="form-label" style="color: red"><b>Deductions</b> <span style="color: red">*</span></label>
                                                <input type="text" class="deductions form-control" name="deductions" id="deductions">
                                                <!-- onkeyup="emp_contri()" -->
                                            </div>
                                        </div>
                                        <!-- <br><br> -->
                                    </div>
                                </div>
                            </fieldset><br/>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border mt-2"><u style="color:blue;">NET PAYABLE:-</u></legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <!-- <br> -->
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="text" class="form-label" style="color: red"><b>Total_Payble </b><span style="color: red">*</span></label>
                                                <input type="text" class="total_payble form-control" name="total_payble" id="total_payble" onclick="emp_contri()">
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Total_Payble in words<span style="color: red">*</span></label>
                                                <input type="text" class="salary_in_words form-control" name="salary_in_words"  id="salary_in_words" placeholder="Total_Payble in words" value="0">
                                            </div>
                                        </div>
                                        <!-- <br><br> -->
                                    </div>
                                </div>
                            </fieldset><br/>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border mt-2"><u style="color:blue;">TRANSFER DETAILS:-</u></legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <br>
                                        <div class="row">
                                        <div class="col-6">
                                                <label for="text" class="form-label">Date Of Salary Transfer<span style="color: red">*</span></label>
                                                <input type="date" class="dateofsalarytrans form-control" name="dateofsalarytrans" id="dateofsalarytrans" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Salary Release Mode <span style="color: red">*</span></label>
                                                <select class="salary_mode form-control" name="salary_mode" id="salary_mode"  required>
                                                 <option value="NA">--SELECT--</option>
                                                 <option value="CASH">CASH</option>
                                                 <option value="NEFT">NEFT</option>
                                                 <option value="CHEQUE">CHEQUE</option>
                                                </select>
                                            </div>
                                        </div><br><br>
                                    </div>
                                </div>
                            </fieldset>
                          </div>
                       <div class="modal-footer">
                      <input type="button" class="btn btn-primary" data-bs-dismiss="modal" value="Cancel">
                      <!-- <input type="reset" class="btn btn-primary" value="Reset"> -->
                      <input type="submit" id="submit"  name="Add" class="btn btn-primary add_desig" value="Add">
                  </div>
              </form>
           </div>
        </div>                 
        <!--Data table--->                
        </div>    
       </div>
      </div>
     </div>
    </div>
   </div><!-- End Default Accordion Example -->
     <br/><br/><br/><br/><br/><br/>
             <div class="modal fade" id="largeModal" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:cornsilk;">
                        <h5 class="modal-title" style="color:blue;">Need To Select</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                         <div class="modal-body" style="color:blue;">
                           OTT(Over-Time),Expense Feild Should be blank.
                         </div>
                         <div class="modal-footer" style="background-color:cornsilk;">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                       </div>
                     </div>
                   </div>
                 </div><!-- End Large Modal-->
               </div>
             </div>
          </div>
        </section>

            
</main><!-- End #main -->
  <!-- ======= End Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <?php
        if(isset($_POST["empEdit"]))
        {
          $id=$_REQUEST["empEdit"];  
          $monthss=$_REQUEST["month_salary_month"]; 
          $Years=$_REQUEST["year_salary_year"]; 
          $EID=EDV($id,1);
          $MONTHID=EDV($monthss,1);
          $YEARID=EDV($Years,1);
          header("location:PFC.php?PageName=Edit_Salary&EmpID=".$EID."&month=".$MONTHID."&year=".$YEARID);
        }

        if(isset($_POST["empView"]))
        {
          $id=$_REQUEST["empView"]; 
          $monthss=$_REQUEST["month_salary_month"]; 
          $Years=$_REQUEST["year_salary_year"]; 
          $EID=EDV($id,1);
          $MONTHID=EDV($monthss,1);
          $YEARID=EDV($Years,1);
          header("location:PFC.php?PageName=print_payslip&EmpID=".$EID."&month=".$MONTHID."&year=".$YEARID);
        }
?>  
<script>
   function addsalary1()
   {
     var basic,hra_no,cca,Provident_funt,advance, esi_amount,special_all,monthly_bonus,other_all,Professional_tax,lwa_amount,lop_amounts,gross_earning
        ,total_deductions,net_payble;
        basic=document.getElementById("basic").value;
        hra_no=basic*50/100;
        cca=basic*0/100;
        Provident_funt=basic*8/100;
        advance=basic*0/100;
        esi_amount=basic*5/100;
        special_all=basic*11/100;
        monthly_bonus=basic*11/100;
        other_all=basic*0/100;
        Professional_tax=basic*0/100;
        lwa_amount=basic*0/100;
        lop_amounts=basic*0/100;
        gross_earning=basic*40/100;
        total_deductions=basic*3/100;
        net_payble=basic*50/100;
         net=parseInt(basic)+parseInt(hra_no)-parseInt(Provident_funt)+parseInt(cca)+parseInt(advance)+parseInt(esi_amount)+parseInt(special_all)+parseInt(monthly_bonus)
         +parseInt(other_all)+parseInt(Professional_tax)+parseInt(lwa_amount)+parseInt(lop_amounts)+parseInt(gross_earning)+parseInt(total_deductions)+parseInt(net_payble)
        document.getElementById('hra_no').value=hra_no;
        document.getElementById('cca').value=cca; 
        document.getElementById('Provident_fund').value=Provident_funt;
        document.getElementById('advance').value=advance;
        document.getElementById('esi_amount').value=esi_amount;
        document.getElementById('special_all').value=special_all;
        document.getElementById('monthly_bonus').value=monthly_bonus;
        document.getElementById('other_all').value=other_all;
        document.getElementById('Professional_tax').value=Professional_tax;
        document.getElementById('lwa_amount').value=lwa_amount;
        document.getElementById('lop_amounts').value=lop_amounts;
        document.getElementById('gross_earning').value=gross_earning;
        document.getElementById('total_deductions').value=total_deductions;
        document.getElementById('net_payble').value=net_payble-total_deductions;
   }
</script>
</script>
<script type="text/Javascript">
  function GetDetail() {
    //alert(str);str
    var str=document.getElementById("emp_name").value;//Taking Employee user_id here.
    var overtime=document.getElementById("overtime").value;
    var expenses=document.getElementById("expenses").value;
    var dateofsalarytrans=document.getElementById("dateofsalarytrans").value;
    if(overtime!='' && expenses!='')
    {

    if (str.length == 0) 
      {
          document.getElementById("project_name").value = "";
          document.getElementById("aadhar_no").value = "";
          return;
      }
      else {
          // Creates a new XMLHttpRequest object
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {

              // Defines a function to be called when
              // the readyState property changes
              if (this.readyState == 4 && this.status == 200) 
              {      
                  var myObj = JSON.parse(this.responseText);
                  console.log(myObj);       
                  document.getElementById("project_name").value = myObj[0];
                  document.getElementById("aadhar_no").value = myObj[1];
                  document.getElementById("pan_no").value = myObj[2];
                  document.getElementById("uan_no").value = myObj[3];
                  document.getElementById("Esi_no").value = myObj[4];
                  document.getElementById("pf_no").value = myObj[5];
                  document.getElementById("joining_date").value = myObj[6];
                  document.getElementById("father_name").value = myObj[7];
                  document.getElementById("location").value = myObj[8];
                  document.getElementById("account_number").value = myObj[9];
                  document.getElementById("bank_name").value = myObj[10];
                  document.getElementById("branch_name").value = myObj[11];
                  document.getElementById("ifsc_code").value = myObj[12];
                  document.getElementById("desig_id").value = myObj[13];
                  document.getElementById("em_id").value = myObj[14];
                  document.getElementById("desg_idd").value = myObj[15];

                  document.getElementById("basic").value = myObj[16];
                  document.getElementById("hra_no").value = myObj[17];
                  document.getElementById("special_all").value = myObj[18];
                  document.getElementById("other_all").value = myObj[19];
                  document.getElementById("gross_earning").value = myObj[20];
                  document.getElementById("Provident_fund").value = myObj[21];//Employee Contribution.
                  document.getElementById("esi_amounttt").value = myObj[22];//Employee Contribution.

                  document.getElementById("esi_amounts").value = myObj[23];//Employer Contribution.
                  document.getElementById("Provident_funds").value = myObj[24];//Employer Contribution.
                
                  //document.getElementById("total_deductions").value = myObj[25];
                  document.getElementById("deductions").value = myObj[25];
                  //document.getElementById("total_payble").value = myObj[20];//Net payable is total payable.
                  document.getElementById("total_payble").value = myObj[27];//Net payable or net monthly(after substracting deduction) is total payable.
                  document.getElementById("dept_id").value = myObj[26];
                
                  //document.getElementById("gross_salary").value = myObj[29];
//Calculating total contribution.
document.getElementById("total_contribution").value=parseInt(myObj[24]) + parseInt(myObj[23]);
//Calculating total contribution.
                  
                                   //Salary in words
    function numberToWords(number) {
      //number=document.getElementById("total_payble").value;
  const units = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"];
  const teens = ["", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
  const tens = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];

  function convertChunk(num) {
    if (num < 10) {
      return units[num];
    } else if (num < 20) {
      return teens[num - 10];
    } else {
      const ten = Math.floor(num / 10);
      const unit = num % 10;
      return tens[ten] + (unit !== 0 ? ` ${units[unit]}` : '');
    }
  }

  function convertToWordsHelper(num, chunkName) {
    const chunk = Math.floor(num / 100);
    const remainder = num % 100;
    let result = '';

    if (chunk > 0) {
      result += `${units[chunk]} Hundred`;
      if (remainder !== 0) {
        result += ' and ';
      }
    }

    if (remainder !== 0) {
      result += convertChunk(remainder);
    }

    if (chunkName) {
      result += ` ${chunkName}`;
    }

    return result;
  }

  if (number === 0) {
    return "Zero";
  }

  const billion = Math.floor(number / 1e9);
  const million = Math.floor((number % 1e9) / 1e6);
  const thousand = Math.floor((number % 1e6) / 1e3);
  const remainder = number % 1e3;

  let result = '';

  if (billion > 0) {
    result += convertToWordsHelper(billion, 'Billion');
  }

  if (million > 0) {
    if (result !== '') {
      result += ' ';
    }
    result += convertToWordsHelper(million, 'Million');
  }

  if (thousand > 0) {
    if (result !== '') {
      result += ' ';
    }
    result += convertToWordsHelper(thousand, 'Thousand');
  }

  if (remainder > 0) {
    if (result !== '') {
      result += ' ';
    }
    result += convertToWordsHelper(remainder, '');
  }

  return result;
}

// Example usage:
//const number = document.getElementById("total_payble").value;
var totalPayableElement = document.getElementById("total_payble").value;
if(totalPayableElement)
{
   // var value = totalPayableElement.value;  
    const numberInWords = numberToWords(totalPayableElement);
    document.getElementById("salary_in_words").value=numberInWords;
    console.log(numberInWords); // Outputs: "One Hundred Twenty-Three Million Four Hundred Fifty-Six Thousand Seven Hundred Eighty-Nine"
    console.log(totalPayableElement); 
}
// const numberInWords = numberToWords(number);
// document.getElementById("salary_in_words").value=numberInWords;
// console.log(numberInWords); // Outputs: "One Hundred Twenty-Three Million Four Hundred Fifty-Six Thousand Seven Hundred Eighty-Nine"
// console.log(number); 
    //salary in words

              }


          };

          //xhttp.open("GET", "filename", true);
          xmlhttp.open("GET", "Pages/bind_value.php?user_id=" + str, true);
            
          //Sends the request to the server
          xmlhttp.send();
      }

    }//closing if statement of overtime!='' && expenses!='' && dateofsalarytrans!=''.
    else
    {
      //alert("Date of salary transfer,OTT(Over-Time),Expense Feild Should be blank.After Select Salary Release Mode.");
      // alert('<div class="modal fade" id="largeModal" tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Large Modal</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body">Date of salary transfer,OTT(Over-Time),Expense Feild Should be blank.After Select Salary Release Mode."</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button></div></div></div></div>');
      $('#largeModal').modal('show');
      return false;
      
    }
  }
</script>
<script type="text/javascript">
$(document).ready(function()
{
var emp_role=$("#pfc_role").val();

if(emp_role==2)
   {
        $("#singlebuttonedit").hide();
        $("#addsalary").hide();
   }

if(emp_role==1 || emp_role==5)
   {
        $("#singlebuttonedit").show();
        $("#addsalary").show();
   }

   if(emp_role==3 || emp_role==4)
   {
        $("#singlebuttonedit").hide();
        $("#addsalary").hide();
   }

});
</script>
<script type="text/Javascript">
  function count_salary()
  {

    var total_month_days=document.getElementById("salarymonth").value;

    var Total_payable; 
    var cal_hra; 
    var cal_over_time;
    var round_off_cost;

    var ED_basic=document.getElementById("basic").value; 
    var hra=document.getElementById("hra_no").value; 
    var ECLD_days_payable=document.getElementById("total_days").value; 
    var working_days=document.getElementById("working_day").value; 
    //var Gross_salary=document.getElementById("gross_salary").value; 
    var overtime_hours=document.getElementById("overtime").value;
   
    
    if(ECLD_days_payable!='')
    {
        Total_payable=((ED_basic/total_month_days) * ECLD_days_payable);
        console.log(ED_basic+'/'+total_month_days+'*'+ECLD_days_payable)
        round_off_basic=Math.round(Total_payable);
        console.log(round_off_basic);
        document.getElementById("basic1").value=round_off_basic;
        document.getElementById("basic").value=document.getElementById("basic1").value;
      
      //Count HRA.
        cal_hra=(hra/total_month_days) * ECLD_days_payable;
        round_off_hra=Math.round(cal_hra);
        document.getElementById("hra_no1").value=round_off_hra;
        document.getElementById("hra_no").value=document.getElementById("hra_no1").value;
      //Count HRA.
    }

    //LEAVE TAKEN CALCULATION
      var total_no_days = document.getElementById("month").value;
      var daysInput     = document.getElementById("total_days").value;

      //var leavesDays = parseInt(total_no_days) - parseInt(daysInput);
      //document.getElementById('leave_taken').value=leavesDays;
      

  const dropdown = document.getElementById("month");
  const selectedMonth = parseInt(dropdown.value, 10);


  const currentYear = new Date().getFullYear();


  const date = new Date(currentYear, selectedMonth, 1);


  date.setMonth(date.getMonth() + 1);
  date.setDate(date.getDate() - 1);


  const numberOfDays = date.getDate();

  const leave_taken=parseInt(numberOfDays)-parseInt(daysInput);
  document.getElementById("leave_taken").value=leave_taken;
  //console.log(numberOfDays);

  //LEAVE TAKEN CALCULATION

  }

  function emp_contri()
  {
    var total_pay=document.getElementById("total_payble").value;
    var gross_pay=document.getElementById("total_payble").value;
    var pf_12_percen=document.getElementById("Provident_fund").value;
    var esic_075_percen=document.getElementById("esi_amounttt").value;
    var total_deduct=document.getElementById("total_deductions").value;
    var expenses=document.getElementById("expenses").value;
    var ec_esic_amt=0.75;
    var esic_amt2=3.25;
    var ec_pf_amt=12;
    var ec_pf_amt2=13;
    var ec_pf_total;

//TOTAL EARNING IS TOTAL PAYABLE.
document.getElementById("gross_earning").value=total_pay;
//TOTAL EARNING IS TOTAL PAYABLE.


//Esic Calculation 0.75% EMPLOYEE CONTRIBUTION
    var esic_cal = total_pay * ec_esic_amt / 100;
    var roundoff_esic = Math.round(esic_cal);
    document.getElementById("esi_amounttt").value=roundoff_esic;
//Esic Calculation 0.75% EMPLOYEE CONTRIBUTION

//PF Calculation 12% EMPLOYEE CONTRIBUTION.
    //var ec_pf_total = total_pay * ec_pf_amt / 100;
    var ec_pf_total = gross_pay * ec_pf_amt / 100;
    var roundoff_pf = Math.round(ec_pf_total);
    document.getElementById("Provident_fund").value=roundoff_pf;
//PF Calculation 12% EMPLOYEE CONTRIBUTION.

//Esic Calculation 3.25% ON EMPLOYER'S CONTRIBUTION & LEAVE DETAILS SECTION.
    var esic2 = (total_pay * esic_amt2) / 100;
    var roundoff_esic_2 = Math.round(esic2);
    document.getElementById("esi_amounts").value=roundoff_esic_2;
//Esic Calculation 3.25% ON EMPLOYER'S CONTRIBUTION & LEAVE DETAILS SECTION.

//PF Calculation 13% 
    var ec_pf_total2 = (total_pay * ec_pf_amt2) / 100;
    var roundoff_pf2 = Math.round(ec_pf_total2);
    document.getElementById("Provident_funds").value=roundoff_pf2;
//PF Calculation 13%

//TOTAL DEDUCTION CALCULATION.
    var total_deduction = parseInt(esic_075_percen) + parseInt(pf_12_percen);
    document.getElementById("deductions").value=total_deduction;
//TOTAL DEDUCTION CALCULATION.

//NET PAYABLE CALCULATION.
  const net_payable = parseInt(total_pay) - parseInt(total_deduct);
  document.getElementById("net_payble").value=net_payable;
//NET PAYABLE CALCULATION.

//Expense addition
const expense_emp = parseInt(total_pay) + parseInt(expenses);
  document.getElementById("total_payble").value=expense_emp;
//Expense addition
}

</script>
<script>
  //Calculating over time.
  function over_time_cal()
  {
    //var totl_months_day=30;
    var totl_months_day=document.getElementById("salarymonth").value;
    var overtime_hours=document.getElementById("overtime").value;
    var cal_over_time;  
    var Gross_sal=document.getElementById("gross_earning").value; 

    cal_over_time=((Gross_sal/totl_months_day) * 8 ) * overtime_hours;//over-time  according to gross salary.
    //document.getElementById("monthly_ctc").value=Math.round(cal_over_time);
    document.getElementById("total_payble").value=Math.round(cal_over_time);
  }  
</script>
<script>
//Calculating total days in a month.
function salary_month() 
{
  // Get the selected month value from the dropdown
  const dropdown = document.getElementById("month");
  const selectedMonth = parseInt(dropdown.value, 10);

  // Get the current year
  const currentYear = new Date().getFullYear();

  // Create a new Date object with the selected year and month
  const date = new Date(currentYear, selectedMonth, 1);

  // Move to the next month and subtract 1 day to get the last day of the specified month
  date.setMonth(date.getMonth() + 1);
  date.setDate(date.getDate() - 1);

  // Return the day component of the last date
  const numberOfDays = date.getDate();
  document.getElementById("salarymonth").value=numberOfDays;
  console.log(numberOfDays);
}
</script>
<script type="text/Javascript">
  // function deduction_cal()//Calculating deduction.
  // {
  //   var deduction=document.getElementById("deductions").value;//taking value of deduction field.
  //   var total_payable_amt=document.getElementById("total_payble").value;//taking value of total_payable field.
  //   var Provident_fund=document.getElementById("Provident_fund").value;//Provident_fund@12%*
  //   //var esi=document.getElementById("esi_amounttt").value;//ESI@ 0.75% *
  //   var esi;

  //   var esi=parseInt(total_payable_amt*0.75/100);//applying formula here for ESI@ 0.75%.
  //   console.log(esi);
  // }
</script>
<script>
  function salary_in_words()
  {
    
  }
</script>