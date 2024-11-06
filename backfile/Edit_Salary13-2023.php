<?php
//error_reporting(0);

include 'connection.php';

$EmpID=$_REQUEST["EmpID"];
// ECHO "SELECT `us`.`Id`, `us`.`emp_name`,`us`.`desig_id`,`us`.`father_name`, `us`.`emp_id`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`Designation`,`addsal`.`Idd`,`addsal`.`dept_id`,`addsal`.`project_name`,`addsal`.`location`,
// `addsal`.`account_number`,`addsal`.`bank_name`, `addsal`.`branch_name`, `addsal`.`ifsc_code`, `addsal`.`basic`, `addsal`.`hra_no`, `addsal`.`cca`, `addsal`.`Provident_fund@ 12%`, `addsal`.`advance`, `esi@ 0.75%`, `addsal`.`special_all(SPL)`, `addsal`.`monthly_bonus`, `addsal`.`other_all`, `addsal`.`Professional_tax`, `addsal`.`lwa_amount`, `addsal`.`lop_amounts`, `addsal`.`total_earninig`, `addsal`.`total_deductions`, `addsal`.`salary_in_words`, `addsal`.`net_payble`, `addsal`.`Provident_funds@ 13%`, `addsal`.`working_day`, `addsal`.`esi_@ 3.25%`, `addsal`.`total_days`, `addsal`.`accident_insurance`, `addsal`.`leave_token`, `addsal`.`loss_of_pay`, `addsal`.`total_contribution`, `addsal`.`ctc_wages`, `addsal`.`month`, `year`, `addsal`.`amount`, `addsal`.`gross_salary`, `addsal`.`total_payble`, `addsal`.`date_of_salary_transfer`, `addsal`.`salary_release_mode` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id`  where `us`.`Id`='$EmpID'";
// die;

$fetch   = mysqli_query($conn, "SELECT `us`.`Id`, `us`.`emp_name`,`us`.`desig_id`,`us`.`father_name`, `us`.`emp_code`,`us`.`permanent_address`, `us`.`joining_date`,`us`.`account_number`, `us`.`bank_name`, `us`.`branch_name`, `us`.`ifsc_code`,`us`.`project_name`, `us`.`aadhar_no`, `us`.`pan_no`, `us`.`uan_no`, `us`.`esi_no`, `us`.`pf_no`,`desig`.`Designation`,`addsal`.`Idd`,`addsal`.`dept_id`,`addsal`.`project_name`,`addsal`.`location`,
`addsal`.`account_number`,`addsal`.`bank_name`, `addsal`.`branch_name`, `addsal`.`ifsc_code`, `addsal`.`basic`, `addsal`.`hra_no`, `addsal`.`cca`, `addsal`.`Provident_fund@ 12%`, `addsal`.`advance`, `esi@ 0.75%`, `addsal`.`special_all(SPL)`, `addsal`.`monthly_bonus`, `addsal`.`other_all`, `addsal`.`Professional_tax`, `addsal`.`lwa_amount`, `addsal`.`lop_amounts`, `addsal`.`gross_earning`, `addsal`.`total_deductions`, `addsal`.`salary_in_words`, `addsal`.`net_payble`, `addsal`.`Provident_funds@ 13%`, `addsal`.`working_day`, `addsal`.`esi_@ 3.25%`, `addsal`.`total_days`, `addsal`.`accident_insurance`, `addsal`.`loss_of_pay`, `addsal`.`total_contribution`, `addsal`.`ctc_wages`, `addsal`.`month`, `year`, `addsal`.`amount`, `addsal`.`gross_salary`, `addsal`.`total_payble`, `addsal`.`date_of_salary_transfer`, `addsal`.`salary_release_mode` FROM `employee` `us` LEFT JOIN `designation` `desig` ON `us`.`desig_id`=`desig`.`desig_id` LEFT JOIN `add_salary_slip` `addsal` ON `us`.`Id`=`addsal`.`user_id`  where `us`.`Id`='$EmpID'");
$rowdata = mysqli_fetch_array($fetch);

//update code start here.
if(isset($_POST['update_salary']))
{
    $emp_name=CF($_POST["name"],$conn);
    $emp_id=CF($_POST["empid"],$conn);
    $desig_id=CF($_POST["desigantion_desigid"],$conn);
    $project_name=CF($_POST["project_name"],$conn);
    $adhar_no=CF($_POST["adhar_no"],$conn);
    $pan_no=CF($_POST["pan_no"],$conn);
    $uan_no=CF($_POST["uan_no"],$conn);
    $Esi_no=CF($_POST["Esi_no"],$conn);
    $pf_no=CF($_POST["pf_no"],$conn);
    $joining_date=CF($_POST["joining_date"],$conn);
    $father_name=CF($_POST["father_name"],$conn);
    $Location=CF($_POST["region"],$conn);
    $account_number=CF($_POST["account_number"],$conn);
    $bank_name=CF($_POST["bank_name"],$conn);
    $branch_name=CF($_POST["branch_name"],$conn);
    $ifsc_code=CF($_POST["ifsc_code"],$conn);

    $basic=CF($_POST["basic"],$conn);
    $hra_no=CF($_POST["hra_no"],$conn);
    $cca=CF($_POST["cca"],$conn);
    $Provident_funt=CF($_POST["Provident_fund"],$conn);
    $advance=CF($_POST["advance"],$conn);
    $esi_amount=CF($_POST["esi_amount"],$conn);
    $special_all=CF($_POST["special_all"],$conn);
    $monthly_bonus=CF($_POST["monthly_bonus"],$conn);
    $other_all=CF($_POST["other_all"],$conn);
    $Professional_tax=CF($_POST["Professional_tax"],$conn);
    $lwa_amount=CF($_POST["lwa_amount"],$conn);
    $lop_amounts=CF($_POST["lop_amounts"],$conn);
    $total_earninig=CF($_POST["total_earninig"],$conn);
    $total_deductions=CF($_POST["total_deductions"],$conn);
    $salary_in_words=CF($_POST["salary_in_words"],$conn);
    $net_payble=CF($_POST["net_payble"],$conn);

    $Provident_funds=CF($_POST["Provident_funds"],$conn);
    $working_day=CF($_POST["working_day"],$conn);
    $esi_amounts=CF($_POST["esi_amounts"],$conn);
    $total_days=CF($_POST["total_days"],$conn);
    $accident_insurance=CF($_POST["accident_insurance"],$conn);
    $leave_token=CF($_POST["leave_token"],$conn);
    $loss_of_pay=CF($_POST["loss_of_pay"],$conn);
    $total_contribution=CF($_POST["total_contribution"],$conn);
    $ctc_wages=CF($_POST["ctc_wages"],$conn);
    $month=date("m");
    $year=date("Y");
    $amount=CF($_POST["amount"],$conn);
    $gross_salary=CF($_POST["gross_salary"],$conn);
    $total_payble=CF($_POST["total_payble"],$conn);
    $dateofsalarytrans=CF($_POST["dateofsalarytrans"],$conn);
    $salary_mode=CF($_POST["salary_mode"],$conn);
    $sal_id=$_POST["sal_id"];

    echo $update="UPDATE `employee` SET `emp_name`='$emp_name',`desig_id`='$desig_id',
    `father_name`='$father_name',
    `current_address`='$Location',
    `permanent_address`='$Location',
    `joining_date`='$joining_date',
    `account_number`='$account_number',
    `bank_name`='$bank_name',
    `branch_name`='$branch_name',
    `ifsc_code`='$ifsc_code',
    `project_name`='$project_name',
    `aadhar_no`='$adhar_no',
    `pan_no`='$pan_no',
    `uan_no`='$uan_no',
    `esi_no`='$Esi_no',
    `pf_no`='$pf_no' 
     WHERE `Id`='$EmpID'";
    $run = mysqli_query($conn, $update);

   echo  $update_salary="UPDATE `add_salary_slip` SET 
    `user_id`='$EmpID',
    `desig_id`='$desig_id',
    `project_name`='$project_name',
    `location`='$Location',
    `account_number`='$account_number',`bank_name`='$bank_name',`branch_name`='$branch_name',`ifsc_code`='$ifsc_code',`basic`='$basic',`hra_no`='$hra_no',`cca`='$cca',`Provident_fund@ 12%`='$Provident_funt',`advance`='$advance',`esi@ 0.75%`='$esi_amount',`special_all(SPL)`='$special_all',`monthly_bonus`='$monthly_bonus',`other_all`='$other_all',`Professional_tax`='$Professional_tax',`lwa_amount`='$lwa_amount',`lop_amounts`='$lop_amounts',`total_earninig`='$total_earninig',`total_deductions`='$total_deductions',`salary_in_words`='$salary_in_words',`net_payble`='$net_payble',`Provident_funds@ 13%`='$Provident_funds',`working_day`='$working_day',`esi_@ 3.25%`='$esi_amounts',`total_days`='$total_days',`accident_insurance`='$accident_insurance',`leave_token`='$leave_token',`loss_of_pay`='$loss_of_pay',`total_contribution`='$total_contribution',`ctc_wages`='$ctc_wages',`amount`='$amount',`gross_salary`='$gross_salary',`total_payble`='$total_payble',`date_of_salary_transfer`='$dateofsalarytrans',`salary_release_mode`='$salary_mode',`UpdatedOn`=now() WHERE `Idd`='$sal_id'";
    die;
    $run_salary = mysqli_query($conn, $update_salary);

//salary details.
header("location:PFC.php?PageName=Edit_Salary&Mgs=1&EmpID=$EmpID");
}
//update code end here.

?>

<main id="main" class="main">
  <?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Employee Updated Successfully.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
}
?>
<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
         <form action="#" method="GET">
            <a class="btn btn-info text-black" href="PFC.php?PageName=add_salary_slip" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;float:right;" role="button">Back</a>
        </form>
           <div class="pagetitle">
            <h1><u>Update Salary:-</u></h1>
           </div>
          </div> 
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
                <div class="card-body">
                 <h5 class="card-title"><u>Update Salary:-</u></h5>
                 <form method="POST"  id="editForm">
                    <input type="hidden" id="empid"  name="empid"   value="<?php echo $rowdata["emp_id"]; ?>"/>
                    <input type="hidden" id="sal_id" name="sal_id"  value="<?php echo $rowdata["Idd"]; ?>"/>
            <div class="modal-header">						
               <!-- <h5 class="card-title"><u>Update Salary:-</u></h5> -->
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                          <div class="form-group">
                                 <div class="row">
                                    <div class="col-4">
                                        <label for="emp_id" class="form-label">Select Employee * </label>
                                          <select name="name" class="name   form-control"  id="name">
                                            <option value="NA">--SELECT--</option>
                                            <?php
                                                    $sql="SELECT * FROM `employee` ORDER BY `Id` DESC";
                                                    $result = mysqli_query($conn, $sql);
                                                    while( $rowDes = mysqli_fetch_array($result))
                                                 { ?>

                                                <option value="<?php echo $rowDes["emp_name"];?>" <?php if($rowDes["Id"]==$rowdata["Id"]){ echo 'selected'; }?>><?php echo $rowDes["emp_name"];?></option>
                                            <?php }  ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="emp_id" class="form-label"> Designation </label>
                                          <input type="text" name="desigantion" class="desigantion   form-control"  id="desigantion1" value="<?php echo $rowdata["Designation"]; ?>" readonly>
                                          <input type="hidden" name="desigantion_desigid" class="desigantion   form-control"  id="desigantion12" value="<?php echo $rowdata["desig_id"];?>">
                                    </div>
                                
                                    <div class="col-4">
                                        <label for="project_name" class="form-label">Project Name <span style="color: red">*</span></label>
                                        <input type="text" class="project_name form-control" name="project_name"  value="<?php  echo $rowdata["project_name"]; ?>" readonly>
                                    </div>
                                </div>
                                <br>
                                  <div class="row">
                                      <div class="col-4">
                                          <label for="adhar_no" class="form-label">Aadhar No<span style="color: red">*</span></label>
                                          <input type="text" class="adhar_no form-control" name="adhar_no"   placeholder="Enter Aadhar No"  value="<?php  echo $rowdata["aadhar_no"]; ?>" readonly>
                                      </div>
                                      <div class="col-4">
                                          <label for="text" class="form-label">PAN No <span style="color: red">*</span></label>
                                          <input type="text"  class="pan_no form-control"  placeholder="Enter PAN No "  maxlength="10" name="pan_no" value="<?php  echo $rowdata["pan_no"]; ?>" readonly>
                                      </div>
                                      <div class="col-4">
                                          <label for="uan_no" class="form-label">UAN No <span style="color: red">*</span></label>
                                          <input type="text"  class="uan_no form-control"   placeholder="Enter UAN No " name="uan_no" value="<?php  echo $rowdata["uan_no"]; ?>" readonly>
                                      </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="Esi_no" class="form-label">ESI No <span style="color: red">*</span></label>
                                            <input type="text" class="Esi_no form-control" name="Esi_no" maxlength="10" placeholder="Enter ESI No" value="<?php  echo $rowdata["esi_no"]; ?>" readonly>
                                        </div>
                                        <div class="col-4">
                                            <label for="pf_no" class="form-label">PF No <span style="color: red">*</span></label>
                                            <input type="text"  class="pf_no form-control"  placeholder="Enter PF No"  name="pf_no" value="<?php  echo $rowdata["pf_no"]; ?>" readonly>
                                        </div>
                                        <div class="col-4">
                                        <label for="text" class="form-label">Date Of Joining <span style="color: red">*</span></label>
                                        <input type="date" class="joining_date form-control" name="joining_date" value="<?php  echo $rowdata["joining_date"]; ?>" readonly>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-4">
                                          <label for="text" class="form-label">Father Name <span style="color: red">*</span></label>
                                          <input type="text" name="father_name" class="father_name   form-control"  id="father_name" value="<?php  echo $rowdata["father_name"]; ?>" readonly>
                                      </div>
                                      <div class="col-4">
                                          <label for="text" class="form-label">Location <span style="color: red">*</span></label>
                                          <input type="text" name="region" class="region   form-control"  id="region1" value="<?php  echo $rowdata["permanent_address"]; ?>" readonly>
                                      </div>
                                      <div class=" col-4">
                                        <label for="text" class="form-label">Account Number <span style="color: red">*</span></label>
                                        <input type="text" name="account_number" class="account_number   form-control"  id="account_number" value="<?php  echo $rowdata["account_number"]; ?>" readonly>
                                    </div>
                                  </div>
                                <br>
                                  <div class="row">
                                      <div class="col-4">
                                        <label for="text" class="form-label">Bank Name <span style="color: red">*</span></label>
                                        <input type="text" name="bank_name" class="bank_name   form-control"  id="bank_name" value="<?php  echo $rowdata["bank_name"]; ?>" readonly>
                                      </div>
                                      <div class=" col-4">
                                        <label for="text" class="form-label">Branch Name <span style="color: red">*</span></label>
                                        <input type="text" name="branch_name" class="branch_name   form-control"  id="branch_name" value="<?php  echo $rowdata["branch_name"]; ?>" readonly>
                                      </div>
                                      <div class=" col-4">
                                        <label for="text" class="form-label">IFSC Code <span style="color: red">*</span></label>
                                        <input type="text" name="ifsc_code" class="ifsc_code   form-control"  id="ifsc_code" value="<?php  echo $rowdata["ifsc_code"]; ?>" readonly>
                                      </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-4">
                                      <label for="text" class="form-label">Month <span style="color: red">*</span></label>
                                        <select class="month form-control" name="month" id="month">
                                        <option value="NA">--SELECT MONTH--</option>
                                        <?php
                                      for ($i = 1; $i <= 12; $i++)
                                      {
                                          $month = date('F', mktime(0, 0, 0, $i, 1, 2011));
                                          ?>
                                          <option value="<?php echo $i;?>" <?php if($i==$rowdata["month"]){ echo 'selected'; }?>><?php echo $month;?></option>
                                          <?php
                                      }
                                      ?>
                                      </select>
                                      </div>
                                      <div class=" col-4">
                                      <label for="text" class="form-label">Year <span style="color: red">*</span></label>
                                        <select class="year form-control" name="year" id="year">
                                        <option value="NA">--SELECT YEAR--</option>
                                        <?php
                                            for($n=2022;$n<=2050;$n++)
                                            {
                                        ?>
                                      <option value="<?php echo $n;?>" <?php if($n==$rowdata["year"]){ echo 'selected'; }?>><?php echo $n;?></option>
                                      <?php
                                            }
                                      ?>
                                      </select>
                                      </div>
                                      </div>
                                <br><br><br>   
                                             
          <!--Bank Details Start-->
                              <fieldset class="scheduler-border">
                                  <legend class="scheduler-border mt-2">EARNINGS & DEDUCTIONS</legend>
                                  <div class="row">
                                      <div class="col mt-3">
                                          <div class="row">
                                              <div class="col-4">
                                                  <label for="text" class="form-label">BASIC<span style="color: red">*</span></label>
                                                  <input type="text" class="basic form-control" name="basic" id="basiss" placeholder="Enter basic" value="<?php  echo $rowdata["basic"]; ?>"  onblur="addsalary()">
                                              </div>
                                              <div class="col-4">
                                                  <label for="text" class="form-label">HRA <span style="color: red">*</span></label>
                                                  <input type="text" class="hra_no form-control" name="hra_no" id="hra_no" value="<?php  echo $rowdata["hra_no"]; ?>">
                                              </div>
                                              <div class="col-4">
                                                <label for="text" class="form-label">CCA <span style="color: red">*</span></label>
                                                <input type="text" class="cca form-control" name="cca" id="cca" value="<?php  echo $rowdata["cca"]; ?>">
                                            </div>
                                          </div><br>
          
                                          <div class="row">
                                              <div class="col-4">
                                                  <label for="text" class="form-label">Provident_fund@ 12%<span style="color: red">*</span></label>
                                                  <input type="text" class="Provident_fund form-control" name="Provident_fund" id="Provident_fund" value="<?php  echo $rowdata["Provident_fund@ 12%"]; ?>">
                                              </div>
          
                                              <div class="col-4">
                                                  <label for="text" class="form-label">Advance <span style="color: red">*</span></label>
                                                  <input type="text" class="advance form-control" name="advance" id="advance" value="<?php  echo $rowdata["advance"]; ?>">
                                              </div>
          
                                              <div class="col-4">
                                                  <label for="text" class="form-label">ESI@ 0.75% <span style="color: red">*</span></label>
                                                  <input type="text" class="esi_amount form-control" name="esi_amount" id="esi_amount" value="<?php  echo $rowdata["esi@ 0.75%"]; ?>" >
                                              </div>    
                                          </div><br>
                                          <div class="row">
                                            <div class="col-4">
                                                <label for="text" class="form-label">Special Allowance<span style="color: red">*</span></label>
                                                <input type="text" class="special_all form-control" name="special_all"  id="special_all" value="<?php  echo $rowdata["special_all(SPL)"]; ?>" >
                                            </div>
                                            <div class="col-4">
                                                <label for="text" class="form-label">Monthly Bonus <span style="color: red">*</span></label>
                                                <input type="text" class="monthly_bonus form-control" name="monthly_bonus" id="monthly_bonus" value="<?php  echo $rowdata["monthly_bonus"]; ?>">
                                            </div>
                                            <div class="col-4">
                                                <label for="text" class="form-label">Other Allowance <span style="color: red">*</span></label>
                                                <input type="text" class="other_all form-control" name="other_all" id="other_all" value="<?php  echo $rowdata["other_all"]; ?>" >
                                            </div>
                                          </div><br>
          
                                          <div class="row">
                                              <div class="col-4">
                                                  <label for="text" class="form-label">Professional Tax<span style="color: red">*</span></label>
                                                  <input type="text" class="Professional_tax form-control" name="Professional_tax" id="Professional_tax" value="<?php  echo $rowdata["Professional_tax"]; ?>">
                                              </div>
          
                                              <div class="col-4">
                                                  <label for="text" class="form-label">LWF <span style="color: red">*</span></label>
                                                  <input type="text" class="lwa_amount form-control" name="lwa_amount" id="lwa_amount" value="<?php  echo $rowdata["lwa_amount"]; ?>">
                                              </div>
          
                                              <div class="col-4">
                                                  <label for="text" class="form-label">LOP <span style="color: red">*</span></label>
                                                  <input type="text" class="lop_amounts form-control" name="lop_amounts" id="lop_amounts" value="<?php  echo $rowdata["lop_amounts"]; ?>" >
                                              </div>
                                          </div><br>
                                          <div class="row">
                                            <div class="col-3">
                                                <label for="text" class="form-label">TOTAL EARNINGS<span style="color: red">*</span></label>
                                                <input type="text" class="total_earninig form-control" name="total_earninig" id="total_earninig" value="<?php  echo $rowdata["total_earninig"]; ?>">
                                            </div>
        
                                            <div class="col-3">
                                                <label for="text" class="form-label">TOTAL DEDUCATIONS <span style="color: red">*</span></label>
                                                <input type="text" class="total_deductions form-control" name="total_deductions" id="total_deductions" value="<?php  echo $rowdata["total_deductions"]; ?>">
                                            </div>
        
                                            <div class="col-3">
                                                <label for="text" class="form-label">Salary in words<span style="color: red">*</span></label>
                                                <input type="text" class="salary_in_words form-control" name="salary_in_words" id="salary_in_words" value="<?php  echo $rowdata["salary_in_words"]; ?>">
                                            </div>
                                            <div class="col-3">
                                                <label for="text" class="form-label">NET PAYABLE <span style="color: red">*</span></label>
                                                <input type="text" class="net_payble form-control" name="net_payble" id="net_payble" value="<?php  echo $rowdata["net_payble"]; ?>" >
                                            </div>
                                        </div>
                                      </div>
                                  </div>
                              </fieldset>
                              <br><br><br>  
                              <fieldset class="scheduler-border">
                                <legend class="scheduler-border mt-2">EMPLOYER'S CONTRIBUTION & LEAVE DETAILS</legend>
                                <div class="row">
                                    <div class="col mt-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="text" class="form-label">Provident Fund@ 13%<span style="color: red">*</span></label>
                                                <input type="text" class="Provident_funds form-control" name="Provident_funds" value="<?php  echo $rowdata["Provident_funds@ 13%"]; ?>">
                                            </div>
                                            <div class="col-6">
                                              <label for="text" class="form-label">Working Days <span style="color: red">*</span></label>
                                              <input type="text" class="working_day form-control" name="working_day" value="<?php  echo $rowdata["working_day"]; ?>">
                                          </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="text" class="form-label">ESI_@ 3.25% <span style="color: red">*</span></label>
                                                <input type="text" class="esi_amounts form-control" name="esi_amounts" value="<?php  echo $rowdata["esi_@ 3.25%"]; ?>" >
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Days Payable <span style="color: red">*</span></label>
                                                <input type="text" class="total_days form-control" name="total_days" value="<?php  echo $rowdata["total_days"]; ?>" >
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="text" class="form-label">Accident Insurance<span style="color: red">*</span></label>
                                                <input type="text" class="accident_insurance form-control" name="accident_insurance" value="<?php  echo $rowdata["accident_insurance"]; ?>">
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="form-label">Leave Token <span style="color: red">*</span></label>
                                                <input type="text" class="leave_token form-control" name="leave_token" value="<?php  echo $rowdata["leave_token"]; ?>" >
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="text" class="form-label">Loss of Pay <span style="color: red">*</span></label>
                                                <input type="text" class="loss_of_pay form-control" name="loss_of_pay" value="<?php  echo $rowdata["loss_of_pay"]; ?>" >
                                            </div>
                                            <div class="col-4">
                                                <label for="text" class="form-label">TOTAL CONTRIBUTION <span style="color: red">*</span></label>
                                                <input type="text" class="total_contribution form-control" name="total_contribution" value="<?php  echo $rowdata["total_contribution"]; ?>">
                                            </div>
                                            <div class="col-4">
                                                <label for="text" class="form-label">MONTHLY CTC <span style="color: red">*</span></label>
                                                <input type="text" class="ctc_wages form-control" name="ctc_wages" value="<?php  echo $rowdata["ctc_wages"]; ?>" >
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="text" class="form-label">Amount <span style="color: red">*</span></label>
                                                <input type="text" class="amount form-control" name="amount" value="<?php echo $rowdata["amount"];?>">
                                            </div>
                                            <div class="col-4">
                                                <label for="text" class="form-label">Gross_Salary <span style="color: red">*</span></label>
                                                <input type="text" class="gross_salary form-control" name="gross_salary" value="<?php echo $rowdata["gross_salary"];?>">
                                            </div>
                                            <div class="col-4">
                                                <label for="text" class="form-label">Total_Payble <span style="color: red">*</span></label>
                                                <input type="text" class="total_payble form-control" name="total_payble" value="<?php echo $rowdata["total_payble"];?>">
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="text" class="form-label">Date Of Salary Transfer<span style="color: red">*</span></label>
                                                <input type="date" class="dateofsalarytrans form-control" name="dateofsalarytrans" id="dateofsalarytrans" value="<?php echo $rowdata["date_of_salary_transfer"];?>">
                                            </div>
                                           
                                            <div class="col-4">
                                                <label for="text" class="form-label">Salary Release Mode <span style="color: red">*</span></label>
                                                <select class="salary_mode form-control" name="salary_mode" id="salary_mode">
                                                 <option value="NA">--SELECT SALARY RELEASE MODE--</option>
                                                 <?php 
                                                 $sql_sal_mode="SELECT `Id`,`Salary_mode` FROM `salary_release_mode`";
                                                 $result = mysqli_query($conn, $sql_sal_mode);
                                                 while( $rowsalary = mysqli_fetch_array($result))
                                                 {
                                                 ?>
                                                 <option value="<?php echo $rowsalary["Id"];?>" <?php if($rowsalary["Id"]==$rowdata["salary_release_mode"]) {echo 'selected';}?>><?php echo $rowsalary["Salary_mode"]; ?></option>     
                                            <?php } ?>
                                                 </select>
                                            </div>
                                        </div><br><br>
                                    </div>
                                </div>
                            </fieldset>
                          </div><br>
                       <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                      <input type="submit" id="update_salary" name="update_salary" class="btn btn-primary add_empolyee" value="Update">
                  </div>
              </form>
                       </div>
                      </div>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <script type="text/Javascript">
$(document).ready(function(){
    $('#country').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'./Pages/ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change', function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'./Pages/ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
<script type="text/Javascript">
   function addsalary()
   {
     var basic,hra_no,cca,Provident_funt,advance, esi_amount,special_all,monthly_bonus,other_all,Professional_tax,lwa_amount,lop_amounts,total_earninig
        ,total_deductions,net_payble;
        basic=document.getElementById("basiss").value;
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
        total_earninig=basic*40/100;
        total_deductions=basic*3/100;
        net_payble=basic*50/100;
         net=parseInt(basic)+parseInt(hra_no)-parseInt(Provident_funt)+parseInt(cca)+parseInt(advance)+parseInt(esi_amount)+parseInt(special_all)+parseInt(monthly_bonus)
         +parseInt(other_all)+parseInt(Professional_tax)+parseInt(lwa_amount)+parseInt(lop_amounts)+parseInt(total_earninig)+parseInt(total_deductions)+parseInt(net_payble)
        document.getElementById('hra_no').value=hra_no;
        document.getElementById('cca').value=cca; 
        document.getElementById('Provident_funt').value=Provident_funt;
        document.getElementById('advance').value=advance;
        document.getElementById('esi_amount').value=esi_amount;
        document.getElementById('special_all').value=special_all;
        document.getElementById('monthly_bonus').value=monthly_bonus;
        document.getElementById('other_all').value=other_all;
        document.getElementById('Professional_tax').value=Professional_tax;
        document.getElementById('lwa_amount').value=lwa_amount;
        document.getElementById('lop_amounts').value=lop_amounts;
        document.getElementById('total_earninig').value=total_earninig;
        document.getElementById('total_deductions').value=total_deductions;
        document.getElementById('net_payble').value=net_payble;
   }
</script>


