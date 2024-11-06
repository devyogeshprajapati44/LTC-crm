<?php
error_reporting(0);
session_start();
include 'connection.php';
//$EmpID=$_REQUEST["EmpID"];

//update code start here.
// if(isset($_POST['changepassword']))
// {
//     $emp_name=CF($_POST["empname"],$conn);
//     $emp_id=CF($_POST["empid"],$conn);

// $update="UPDATE `employee` SET `emp_name`='$emp_name',`emp_id`='$emp_id',`desig_id`='$desig_id',`dept_id`='$dept_id',`attendence_id`='$attendence_id',`emp_type`='$emp_type',`emp_status`='$emp_status',`user_login`='$user_login',`role_id`='$role_id',`email`='$email',`phone`='$phone',`alernate_number`='$alernate_number',`gender`='$gender',`father_name`='$father_name',`father_mobile`='$father_mobile',`current_address`='$current_address',`country_id`='$country',`state_id`='$state',`city_id`='$city',`pin_code`='$pin_code',`permanent_address`='$permanent_address',`joining_date`='$joining_date',`status`='$status',`beneficiary_name`='$beneficiary_name',`account_number`='$account_number',`bank_name`='$bank_name',`branch_name`='$branch_name',`ifsc_code`='$ifsc_code',`forget_password`='$forget_password',`aadhar_no`='$aadhar_no',`pan_no`='$pan_no',`uan_no`='$uan_no',`esi_no`='$esi_no',`pf_no`='$pf_no',`project_name`='$project_name',`UpdatedOn`=now() WHERE `Id`='$EmpID'";
// $run = mysqli_query($conn, $update);
// header("location:PFC.php?PageName=EmpUpdate&Mgs=1&EmpID=$EmpID");
// }
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['changepassword'])) {

    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["newpassword"];
    $userid = $_POST["userid"];
    
    $fetch = mysqli_query($conn, "SELECT `password` FROM employee WHERE Id = '$userid'");
    $row= mysqli_fetch_array($fetch);
    $storedPassword=$row["password"];
    // Verify if the current password matches the stored password
    //if (password_verify($currentPassword, $storedPassword)) {
        if ($currentPassword==$storedPassword) 
        {
      // Hash and update the new password in the database
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        //$update_pwd="UPDATE `employee` SET `password`='$newPassword' WHERE `Id`='$userid'";
        $update_pwd="UPDATE `employee` SET `password`='$hashedPassword',`original_password`='$newPassword' WHERE `Id`='$userid'";
        $run = mysqli_query($conn, $update_pwd);
        header("location:PFC.php?PageName=change_password&Mgs=1&EmpID=$userid");
      
  }
  }
//update code end here.
?>

<main id="main" class="main">
  <?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Password change Successfully.</strong>
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
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
              <nav class="navbar navbar-light bg-light">
              <form action="#" method="GET">
               <a class="btn btn-warning text-dark"  href="PFC.php?PageName=dashboard" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;float:left;margin-left:22px;" role="button">Back</a>
              </form>
                 <h1 style="color:#012970;margin-right:538px;margin-top:-1px;">CHANGE PASSWORD</h1>
                </nav><br><br>
                <div class="card-body">
                 <!-- <h5 class="card-title"><u>Change Password:-</u></h5> -->
                  <form method="POST">    
                  <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['PFC_UID'];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3"> 
                      <div class="row">
                      <div class="col-6">
                          <label for="emp_name" class="form-label">Current Password</label>
                          <input type="text" class="current_password form-control" name="current_password" id="current_password" required>
                        </div>
                        </div>
                      <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">New Password</label>
                          <input type="text" class="newpassword form-control" name="newpassword" id="newpassword">
                        </div>
                      </div> 
                      <!-- <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">Confirm Password</label>
                          <input type="text" class="confirmpassword form-control" name="confirmpassword" id="confirmpassword">
                        </div>
                      </div> -->
<br/>
                         <!-- <div class="modal-footer"> -->
                          <div class="row mb-3">
                          <div class="col-sm-3">
                          <input type="submit" name="changepassword" class="btn btn-primary changepassword" value="submit">
                          </div>
                          </div>
                        <!-- <button type="submit" id="submit" class="btn btn-primary add_empolyee">Submit</button> -->
                        <!-- <input type="submit" name="changepassword" class="btn btn-primary add_empolyee" value="Change Password">   -->
                         <!-- </div> -->
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



