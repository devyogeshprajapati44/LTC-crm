<?php
error_reporting(0);
include 'connection.php';
//include '../Script/CommonFunctions.php';
$EmpID=$_REQUEST["EmpID"];

$fetch = mysqli_query($conn, "SELECT `us`.*, `design`.`Designation`, `depart`.`department`,`co`.`country_id`,`co`.`country_name`,`st`.`state_id`,`st`.`country_id`,`st`.`state_name`,`ct`.`city_id`,`ct`.`state_id`,`ct`.`city_name` FROM `employee` `us` LEFT JOIN `designation` `design` ON `us`.`desig_id`= `design`.`desig_id` LEFT JOIN `department` `depart` ON `us`.`dept_id` = `depart`.`dept_id` LEFT JOIN `countries` `co` ON `us`.`country_id`=`co`.`country_id` LEFT JOIN `states` `st` ON `us`.`state_id`=`st`.`state_id` LEFT JOIN `cities` `ct` ON `us`.`city_id`=`ct`.`city_id` where `us`.`Id`='$EmpID'");
$row   = mysqli_fetch_array($fetch);

//update code start here.
if(isset($_POST['savestatus']))
{

$emp_status=strtoupper($_POST["status"]);

$update_status="UPDATE `employee` SET `emp_status`='$emp_status' WHERE `Id`='$EmpID'";
//die;
$run = mysqli_query($conn, $update_status);
header("location:PFC.php?PageName=EmpDel&Mgs=1&EmpID=$EmpID");
}
//update code end here.
?>
<?php
    include('view/layout/header.php');
    include('view/layout/sidebar.php');
?>
<main id="main" class="main">
  <?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Status Has Change Successfully.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
}
?>
<main id="main" class="main">
<div class="pagetitle">
<h1>Employee Status</h1>
<form action="#" method="GET">
            <a class="btn btn-info text-black" href="PFC.php?PageName=view_employee_details" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;float:right;" role="button">Back</a>
        </form>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><u>Employee Status:-</u></h5>
          <!-- General Form Elements -->
          <form method="POST">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Status :</label>
              <div class="col-sm-4">
              <?php if(($_REQUEST['EmpID']!='')){?>
                        <select name="status" class="status  form-control" id="status">
                                <option selected>--SELECT STATUS--</option>
                                <option value="<?php if($row['emp_status']=="2"){ echo $row['emp_status']; } else {echo "2"; }?>"selected><?php if($row['emp_status']=="2"){ echo $row['emp_status']="DEACTIVE"; } else {echo "DEACTIVE"; }?></option>
                                <option value="<?php if($row['emp_status']=="1"){ echo $row['emp_status']; } else {echo "1"; }?>"selected><?php if($row['emp_status']=="1"){ echo $row['emp_status']="ACTIVE"; } else {echo "ACTIVE"; }?></option>
                        </select>
                        <?php } ?>
              </div>
            </div>
</div>
<!--userlogin div-->                

              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-10">  
                  <input type="submit" name="savestatus" id="savestatus" value="Save Status" class="btn btn-primary">
              </div>
            </div>

          </form><!-- End General Form Elements -->

        </div>
      </div>

    </div>

    <div class="col-lg-6">
    </div>
  </div>
</section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<?php
include('view/layout/footer.php');
?>

