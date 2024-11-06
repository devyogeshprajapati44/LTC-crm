<?php
error_reporting(E_ALL & ~E_NOTICE);

include 'connection.php';

//excel file upload
if (isset($_POST['submit'])) 
{ 
    $fileName=$_FILES["upload_file"]["name"];
    $fileTmpName=$_FILES["upload_file"]["tmp_name"];
    $fileExtension=pathinfo($fileName,PATHINFO_EXTENSION);

    $allowedType=array('csv');
    if(!in_array($fileExtension,$allowedType))
    {?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Error !</span>File Type Not Allowed.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <?php
    } 
    
    else
    {
      $handle=fopen($fileTmpName,'r'); //read mode 'r'
      fgetcsv($handle);
      while(($myData = fgetcsv($handle,100,',')) !== FALSE)
      {
            $userid=$myData[0];
            $checkintime=$myData[1];
            $checkindate=$myData[2];
            $checkouttime=$myData[3];
          for($i=1;$i<=30;$i++)
          {
            $d=$i+3;
            $Date=$i."/04"."/2023";
            $Status=$myData[$d];
            echo $userid."---" . $Date."----".$Status;
            echo "<br/>";
          }
            
          //die();
            //echo $userid ; 
            

            //echo $query="INSERT INTO `employee_attendence`( `user_id`, `check_in_time`, `check_in_date`, `check_out_time`, `check_out_date`, `Total_hours`, `upload_type`) 
            //VALUES ('".$userid."','".$checkintime."','".$checkindate."','".$checkouttime."','".$checkoutdate."','".$totalhours."','".$upload_type."')";
            // die();
            // $fileres = mysqli_query($conn, $query);
            // header("location:PFC.php?PageName=attendance_upload&Mgs=2");
      }
     
      // print_r($myData);
      die();
    }

}
//excel file upload

  if(isset($_POST["manualsubmit"]))
  {
      $user_id=CF($_POST["empname"],$conn);
      $signindate=CF($_POST["signindate"],$conn);
      $signintime=CF($_POST["signintime"],$conn);
      $signoutdate=CF($_POST["signoutdate"],$conn);
      $signouttime=CF($_POST["signouttime"],$conn);
      $upload_types='MANUAL';

    //attendance time calculation.
     $t1 = strtotime($_POST["signintime"]);
     $t2 = strtotime($_POST["signouttime"]);
     $hours = ($t2 - $t1)/3600;  

     $tootltime=floor($hours) . ':' . ( ($hours-floor($hours)) * 60 );
    //attendance time calculation.

$qry_Adv = "INSERT INTO `employee_attendence`(`user_id`, `check_in_time`, `check_in_date`, `check_out_time`, `check_out_date`,`Total_hours`,`upload_type`) VALUES
    ('".$user_id."','".$signintime."','".$signindate."','".$signouttime."','".$signoutdate."','".$tootltime."','".$upload_types."')";
//die;
    $run_Sub = mysqli_query($conn, $qry_Adv);
    header("location:PFC.php?PageName=attendance_upload&Mgs=1");
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
<?php
if(isset($_REQUEST["Mgs"])){
    $Mgs=$_REQUEST["Mgs"];
    if($Mgs==2){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="bi bi-check"></i> Success !</span>File Upload.</strong>
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
           <div class="pagetitle">
            <!-- <h1><u>Upload Attendance:-</u></h1> -->
           </div>
                <?php //echo $message; ?>
          </div> 
      <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card-header"> 
                <div>
                <form method="POST">
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0"><u>Upload Type:-</u></legend>
                      <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Manual">
                                  <label class="form-check-label" for="gridRadios1"> Upload Manual </label>
                             </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="File">
                                    <label class="form-check-label" for="gridRadios2">
                                      Upload File
                                    </label>
                            </div>
                          
                        </div>
                            </fieldset>
</form>
                </div>
                <div class="card-body" id="uploadfile" style="display:none;">
                 <h5 class="card-title"><u>Upload File:-</u></h5>
                  <form method="POST" enctype="multipart/form-data">    
                    <input type="hidden" name="savedby"  id="savedby"  value="<?php echo $_SESSION['PFC_EmpID'];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3">
                     
                      <div class="row">
                        <div class="col-6">
                          <label for="emp_name" class="form-label">Upload Attendance</label>
                          <input type="file"    class="form-control" name="upload_file" id="upload_file" required>
                        </div>

                        <div class="col-6" style="margin-left:1233px;margin-top:-114px;">
                          <label for="emp_name" class="form-label"><b>Upload Format:-</b></label>
                          <a href="uploadFormat/employee_attendence.csv" class="btn btn-primary" download>Download Here</a>
                        </div>
                      </div> 
                          <br>
                         <!--<div class="modal-footer">-->
                          <div class="row mb-3">
                          <div class="col-sm-3">
                         
                          </div>
                          </div>
                          <input type="submit" name="submit"  id="excelFile" class="btn btn-primary add_empolyee" value="Upload Attendance"> 
                         </div>

                         <div>
                    <!-- <form>
                      <input type="text" name="xyz"/>
                    </form> -->
                    <div>
                        </form>
                       <!-- </div> -->
                      </div>
                     </div>
                    </div>
                  </div>
                </div>
          
                <!--Upload Manual--->
                <div class="card-body" id="uploadfilemanual" style="display:none;">
                 <h5 class="card-title"><u>Upload Manual:-</u></h5>
                  <form method="POST">    
                    <input type="hidden" name="savedby"  id="savedby"  value="<?php echo $_SESSION['PFC_EmpID'];?>"/>
                    <div class="modal-body">
                     <div class="form-group">
                      <div class="col ms-1 me-2 mt-3">
                      <div class="row">
                        <div class="col-12">
                          <label for="emp_name" class="form-label">Employee Name:-</label>
                          <select  class="fstdropdown-select" name="empname" id="empname">
                            <option value="NA">--SELECT EMPLOYEE--</option>
                            <?php
                            $sql="select * from employee where emp_status='1'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) 
                            {
                              while($row = $result->fetch_assoc()) 
                                {
                                ?>
                              <option value="<?php echo $row['Id'];?>"><?php echo $row['emp_name'];?></option>
                                  <?php 
                                }
                            }
                                 ?>
                          </select>
                        </div>
                      </div> 
                          <br>
        
                          <div class="row mb-3">
                          <div class="col-6">
                          <label  class="form-label">Sign-In Date:-</label>
                          <input type="date" name="signindate" class="form-control" id="signindate">
                        </div>

                        <div class="col-6">
                          <label for="emp_name" class="form-label">Sign-In Time:-</label>
                          <input type="time" name="signintime" class="form-control" id="signintime">
                        </div>
                        <br/><br/>
                          </div>
                          <div class="row mb-3">
                          <div class="col-6">
                          <label  class="form-label">Sign-Out Date:-</label>
                          <input type="date" name="signoutdate" class="form-control" id="signoutdate">
                        </div>

                        <div class="col-6">
                          <label for="emp_name" class="form-label">Sign-Out Time:-</label>
                          <input type="time" name="signouttime" class="form-control" id="signouttime">
                        </div>
                          </div>
                          <input type="submit" name="manualsubmit"  id="manualsubmit" class="btn btn-primary manualsubmit" value="Submit"> 
                         </div>
                        </form>
                      
                      </div>
                     </div>
                    </div>
                  </div>
                </div>
              
                <!--Upload Manual--->
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
$(document).ready(function()
{
//alert("HEllo world");
$("#uploadfile").hide();
$("#uploadfilemanual").hide();
// var flag=1;
// var flaging=2;
$("#uploadfile").css("display","none"); 
$("#uploadfilemanual").css("display","none"); 

$("#gridRadios1").click(function()
{
    //yes
    if($("#gridRadios1").val()=="Manual")
    {
        //$(".userlogin").show();
        //alert($("#gridRadios1").val());
        $("#uploadfile").hide();
        $("#uploadfilemanual").show();
        $("#uploadfilemanual").css("display","none"); 
        //alert("Hello world yes");
    } 
});

$("#gridRadios2").click(function()
{
    //no
   if($("#gridRadios2").val()=="File")
    {
        
       // alert("Hello world no");
        $("#uploadfile").show();
        $("#uploadfilemanual").hide();
        $("#uploadfilemanual").css("display","none"); 
    }
    
});

$("#gridRadios1").click(function()
{
    //yes
    if($("#gridRadios1:checked").val()=="Manual")
    {
        //$(".userlogin").show();
        $("#uploadfile").hide();
        $("#uploadfile").css("display","none");  
        $("#uploadfilemanual").show();
        //alert("Hello world yes");
    } 
});
});
</script>
  <!-- ======= End Footer ======= -->
