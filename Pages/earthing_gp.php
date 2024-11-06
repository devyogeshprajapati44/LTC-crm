<?php
  error_reporting(0);
  include 'connection.php';

if (isset($_POST['save'])) 
{
  $unique_code=CF($_POST["unique_code"],$conn);
  $dateofcompletion=CF($_POST["date_of_completion"],$conn);
  $name=CF($_POST["personname"],$conn);
  //$doneby=CF($_POST["doneby"],$conn);
  $report_status=CF($_POST["report_status"],$conn);
  $concernperson_mobiles=CF($_POST["concernperson_mobile"],$conn);
  $site_incharge_name=CF($_POST["site_incharge_name"],$conn);
  
  // $qry_Adv = "INSERT INTO `earthing_gp`(`earthing_gp_code_id`, `name`, `date`, `concern_person_mobile_no`, `site_in_charge`, `report_status`, `done_by`) 
  // VALUES ('".$unique_code."','".$name."','".$date."','".$concernperson_mobiles."','".$site_incharge."','".$report_status."','".$doneby."')";
  $qry_Adv = "INSERT INTO `earthing_gp`(`earthing_gp_code_id`, `name`, `date_of_completion`, `concern_person_mobile_no`, `site_in_charge_name`, `report_status`) 
  VALUES ('".$unique_code."','".$name."','".$dateofcompletion."','".$concernperson_mobiles."','".$site_incharge_name."','".$report_status."')";
  //echo $qry_Adv;
  //die;
//die;
    $run_Sub = mysqli_query($conn, $qry_Adv);
    if($run_Sub > '0')
    {
      $message="Record Save successfully";
      header("location:PFC.php?PageName=earthing_gp&Mgs=1");
    }

    else
    {
      $message="Record Not Save.";
    }
}
?>
<main id="main" class="main">
<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==1){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>Data Saved.</strong>
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
            <?php echo $message; ?>
          </div> 
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header">
              <nav class="navbar navbar-light bg-light">
                 <h1 style="color:#012970;margin-left:240px; margin-top:7px;">ADD EARTHING DETAILS</h1>
                </nav><br><br> 
                <div class="card-body">
                 <!-- <h5 class="card-title"><u>Add Earthing Details:-</u></h5> -->
                  <Form method="POST">    
                      <input type="hidden" name="roleid"   id="roleid"   value="<?php echo $_SESSION["role_Id"];?>"/>
                      <input type="hidden" name="savedby"  id="savedby"  value="<?php echo $_SESSION['PFC_EmpID'];?>"/>
                      <input type="hidden" name="desigid"  id="desigid"  value="<?php echo $_SESSION["desig_id"];?>"/>
                      <input type="hidden" name="departid" id="departid" value="<?php echo $_SESSION["dept_id"];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3">
                     
                      <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">Unique Code:</label>
                          <span class="error">* <?php echo $nameErr;?></span>
                          <select class="fstdropdown-select form-control unique_code" name="unique_code" id="unique_code" data-live-search="true"  data-size="8" tabindex="null" onchange="GetDetail(this.value)">
                            <option value="NA">--SELECT UNIQUE CODE--</option>
                            <?php 
                                    $sql="SELECT `Id`,`unique_code` FROM `earthing_gp_codes` ORDER BY `Id` DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while( $row = mysqli_fetch_array($result))
                                    {
                                  ?>
                                  <option value="<?php echo $row["Id"];?>"><?php echo $row["unique_code"];?></option>
                               <?php } ?>
                            
                         </select>
                        </div>

                        <div class="col-6">
                          <label for="emp_name" class="form-label">GP Code</label>
                          <span class="error">* <?php echo $nameErr;?></span>
                          <input type="text" class="gpcode form-control" name="gpcode" id="gpcode" readonly>
                        </div>

                      </div> 
                          <br>
                         
                       <div class="row g-3">
                            <div class="col-4">
                                <label for="email" class="form-label">GP_GD Code</label>
                                <span  class="error">* <?php echo $emailErr;?></span>
                                <input type="text" class="gpgdcode form-control" name="gpgdcode" id="gpgdcode" readonly>
                            </div>
                            <div class="col-4">
                                <label for="text" class="form-label">GP ID</span></label>
                                <span class="error">* <?php echo $phoneErr;?></span>
                                <input type="text" class="gpid form-control" name="gpid" id="gpid" readonly>
                            </div>
                            <div class="col-4">
                                <label for="text" class="form-label">Type of Site</label>
                                <span class="error">*<?php echo $alternateErr;?></span>
                                <input type="text"  class="typeofsite form-control"  name="typeofsite" id="typeofsite" readonly>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="deptid" id="deptid" value="<?php echo $_SESSION["dept_id"];?>">
                        <input type="hidden" name="desigid" id="desigid" value="<?php echo $_SESSION["desig_id"];?>">
                        <div class="row g-3">
                          <div class="col-4">
                            <label for="desigantion" class="form-label">Zone</span> </label>
                            <span class="error">* <?php echo $desigantionErr;?></span>
                            <input type="text"  class="zone form-control"  name="zone" id="zone" readonly>
                        </div>
                        <div class="col-4">
                            <label for="department" class="form-label">District</span> </label>
                            <span class="error">* <?php echo $departmentErr;?></span>
                              <input type="text" class="district form-control" name="district" id="district" readonly>
                           </div>
                           <div class="col-4">
                            <label for="text" class="form-label">PS</label>
                            <span class="error">* <?php echo $fatherErr;?></span>
                            <input type="text" class="ps form-control" name="ps" id="ps" readonly>
                        </div>

                        </div><br>
                        <div class="row g-3">
                        <div class="col-6">
                          <label for="text" class="form-label">New PS</label>
                          <span class="error">* <?php echo $fatherphoneErr;?></span>
                          <input type="text" class="new_ps form-control" name="new_ps" id="new_ps" readonly>
                            </div>

                    <div class="col-6">
                         <label for="text" class="form-label">GP Name</label>
                          <span class="error">* <?php echo $genderErr;?></span>
                          <input type="text" class="gp_name form-control" name="gp_name" id="gp_name" readonly>
                        </div>
                        </div>
                      <br>
                        <div class="row">
                         <div class="col">
                            <div class="col">
                                <label for="text" class="form-label">Name</label>
                                <span class="error">* <?php echo $permanentErr;?></span>
                                <input type="text" class="personname form-control"  name="personname" id="personname">
                            </div>
                        </div> 
                        <br>
                        <div class="row g-3">
                        <div class="col-6">
                            <label for="text" class="form-label">Date Of Completion</label>
                            <span class="error">* <?php echo $currentErr;?></span>
                            <input type="date" class="date form-control" name="date_of_completion" id="date_of_completion">
                            </div>
 
                            <div class="col-6">
                             <label for="concernperson_mobile" class="form-label">Concern_Person Mobile No.</label>
                             <span class="error">*<?php echo $cityErr;?></span>
                             <input type="text"   maxlength="10" class="concernperson_mobile form-control" name="concernperson_mobile">
                            </div>

                        </div>
                        <br>
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="site_incharge" class="form-label">Site In-Charge</label>
                                <span class="error">* <?php echo $pincodeErr;?></span>
                                <input type="text"  class="site_incharge form-control" name="site_incharge_name" id="site_incharge_name">
                            </div>
                            <div class="col-6">
                              <label for="inputState" class="form-label">Report Status</label>
                              <span class="error">* <?php echo $stateErr;?></span>
                                <select  name="report_status" id="report_status" class="report_status form-control">
                                <option value="NA">--SELECT REPORT STATUS--</option>
                                <option  value="RECEIVED">RECEIVED</option>
                                <option  value="NOT RECEIVED">NOT RECEIVED</option>
                               </select>
                             </div>
                        </div>
                        <br><br>                                               
                        <!-- <div class="row">
                            <div class="col"> 
                            <br><br> 
                          <label for="doneby" class="form-label">Done by<span class="error">* <?php echo $countryErr;?></span></label><br>
                            <select id="doneby" name="doneby"  id="doneby" class="doneby form-control" > 
                            <option value="NA">--SELECT--</option>
                            <option value="doneby">Done By</option>
                            </select>
                            </div>
                        </div>  -->
                    <br>   
                  <br>                                
<br/>
<br/>
                         <div class="modal-footer">
                          <div class="row mb-3">
                          <div class="col-sm-3">
                         
                          </div>
                          </div>
                          <br><br> 
                          <br><br> 
                          <input type="submit" name="save" id="save" class="btn btn-primary earthing_gp" value="Submit"> 
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
  
  // onkeyup event will occur when the user 
  // release the key and calls the function
  // assigned to this event
  function GetDetail(str) {
    console.log(str.length);
      if (str.length == 0) 
      {
            document.getElementById("gpcode").value = '';
            document.getElementById("gpgdcode").value = '';
            document.getElementById("gpid").value = '';
            document.getElementById("typeofsite").value = '';
            document.getElementById("zone").value = '';
            document.getElementById("district").value = '';
            document.getElementById("ps").value = '';
            document.getElementById("new_ps").value = '';
            document.getElementById("gp_name").value = '';
          return;
      }
      if ( document.getElementById("unique_code").value == 'NA') 
      {
            document.getElementById("gpcode").value = '';
            document.getElementById("gpgdcode").value = '';
            document.getElementById("gpid").value = '';
            document.getElementById("typeofsite").value = '';
            document.getElementById("zone").value = '';
            document.getElementById("district").value = '';
            document.getElementById("ps").value = '';
            document.getElementById("new_ps").value = '';
            document.getElementById("gp_name").value = '';
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
                  //console.log(myObj);       

                 // document.getElementById("project_name").value = myObj[0];
                  document.getElementById("gpcode").value = myObj[1];
                  document.getElementById("gpgdcode").value = myObj[2];
                  document.getElementById("gpid").value = myObj[3];
                  document.getElementById("typeofsite").value = myObj[4];
                  document.getElementById("zone").value = myObj[5];
                  document.getElementById("district").value = myObj[6];
                  document.getElementById("ps").value = myObj[7];
                  document.getElementById("new_ps").value = myObj[8];
                  document.getElementById("gp_name").value = myObj[9];
                 
              }
          };

          // xhttp.open("GET", "filename", true);
          xmlhttp.open("GET", "Pages/bind_code.php?user_id=" + str, true);
            
          // Sends the request to the server
          xmlhttp.send();
      }
  }
</script>

  <!-- ======= End Footer ======= -->
