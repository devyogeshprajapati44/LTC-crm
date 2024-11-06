<?php
error_reporting(0);
require_once 'connection.php';
include("Pages/pagi_script.php");
?>

<main id="main" class="main">
<!-- Start dashboard inner -->
<div class="midde_cont">
  <div class="container-fluid">
    <!-- row -->
<div class="row column1">
  <div class="col-md-12">
        <div class="container py-5">
            <div class="card mt-3">
                <div class="card-header">
                <nav class="navbar navbar-light bg-light">
                    <form method="POST">
                         <input type="text" name="searchvalue" style="margin:13px;height:41px;padding:-3px;width:287px;" placeholder="Search by name" title="Type in a name">&nbsp;&nbsp;
                         <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                         <h2 style="color:#012970;margin-left: 592px;margin-top: -51px;"><b>VIEW EARTHING-GP</b></h2>
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-left: 1097px;margin-top: -62px;"><a href="PFC.php?PageName=earthing_gp"><span style="color:white;">+ Add Earthing-GP Details<span></a></button>
                         </form>
                       </nav>
                </div>
         <!--table start-->
         <!--table start-->
         <div class="card-body">
            <table  class="hover table table-striped" style="width:100%">
            <thead class="thead-pink" >
              <tr>
                 <th><b>S.No.</b></th>
                 <th><b>Earthing_GP_Code_ID</b></th>
                 <th><b>Name</b></th> 
                 <th><b>Date_Of_Completion</b></th> 
                 <th><b>Concern_Person_Mobile_No</b></th> 
                 <th><b>Site_In_Charge_Name</b></th> 
                 <th><b>Report Status</b></th> 
                 <!-- <th><b>Action</b></th> -->
               </tr>
                </thead>
                <tbody>
                <?php
                 //$sql = "SELECT * FROM `earthing_gp`";
                 $sql = "SELECT `gpcode`.`Id`,`gpcode`.`unique_code`,`egp`.* FROM `earthing_gp_codes` `gpcode` LEFT JOIN `earthing_gp` `egp` ON `gpcode`.`Id`=`egp`.`earthing_gp_code_id` LIMIT $offset, $no_of_records_per_page";

                 if(isset($_POST['submitsearch']))
                 {
                 $filtervalue=strtoupper($_REQUEST['searchvalue']);
                 $sql = "SELECT `gpcode`.`Id`,`gpcode`.`unique_code`,`egp`.* FROM `earthing_gp_codes` `gpcode` LEFT JOIN `earthing_gp` `egp` ON `gpcode`.`Id`=`egp`.`earthing_gp_code_id` WHERE `gpcode`.`unique_code` LIKE '%$filtervalue' OR `gpcode`.`unique_code` LIKE '$filtervalue%' OR `gpcode`.`unique_code` LIKE '%$filtervalue%' OR `name` LIKE '%$filtervalue' OR `name` LIKE '$filtervalue%' OR `name` LIKE '%$filtervalue%' LIMIT $offset, $no_of_records_per_page";
                 }
                 $result = $conn->query($sql);
                 if ($result->num_rows > 0) 
                 {
                  $cnt=0;
                 while($row = $result->fetch_assoc()) 
                   {
                     ?>
                     <tr>
                     <td><?php echo ++$cnt;?></td>
                       <td><?php echo $row["unique_code"];?></td>
                       <td><?php echo $row['name'];?></td>
                       <td><?php echo $row['date_of_completion'];?></td>
                       <td><?php echo $row['concern_person_mobile_no'];?></td>
                       <td><?php echo $row['site_in_charge_name'];?></td>
                       <td><?php echo $row['report_status'];?></td>
                       <!-- <td>
                        <button  value="<?php //echo $row["Id"]; ?>" data-bs-toggle='modal' class='btn btn-primary editbtn' onclick="getdata1(this.value)">Edit</button></td> -->
                     </tr>
                   <?php  
                   }
                 }
                 ?> 

                 </tbody>
            </table>
            <?php
             $sql1 = "SELECT * from `earthing_gp_codes`";
             echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
            ?>
          
           </div>
      <!-- Modal add -->
<!-- <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <Form  action="#"  method="POST" >
     <div class="modal-header">
              <legend class="card-title"  id="myModalLabel"><u>Add Project:-</u></legend>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body">
                <div class="form-group">
                  <div class="row g-3">
                   <div class="col-6">
                    <label class="col-sm-3 col-form-label">Project Name<span style="color: red">*</span></label>
                      <input type="text" class="project_name form-control" name="project_name"  required>
                    </div>
                   <div class="col-6">
                     <label for="start_date" class="col-sm-2 col-form-label">Start Date<span style="color: red">*</span></label>
                     <input type="date" class="start_date form-control" name="start_date" required>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                 <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                 <input type="submit" id="submit"  name="submit" class="btn btn-primary add_desig" value="Submit">
          </div>
       </form>
    </div>
</div>
</div> -->
  <!-- Modal add -->


  

  <div class="modal fade text-start" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <Form action="" method="POST"  id="editForm">
          <input type="hidden" id="project_id" name="project_id"/>
            <div class="modal-header">						
               <h5 class="card-title" id="exampleModalLabel"><u>Edit Project Details:-</u></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
           			
                   <div class="form-group">   
                   <div class="row g-3">  
                   <div class="col-6">
                      <label class="col-sm-3 col-form-label">Project Name<span style="color: red">*</span></label>
                      <input type="text" class="project_name form-control" name="project_name_edit" id="project_name_edit" required>
                      </div><br>
                      <div class="col-6">
                      <label for="start_date" class="col-sm-2 col-form-label">Start Date<span style="color: red">*</span></label>
                      <input type="date" class="start_date form-control" name="start_date_project"  id="start_date_project" required>
                      </div>
                    </div><br>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" id="submit"  name="Editsubmit" class="btn btn-primary add_edit" value="Update">
                  </div>
                </form>
            </div>
        </div>
    </div>

</main><!-- End #main -->

  <!-- ======= End Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<script type="text/javascript">  
function getdata(){
    $(document).ready(function(){
     $(document).on('click', '.editbtn', function(){
       var id = $(this).val();
      $('#exampleModal').modal('show');
              $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
            return $(this).text();
            }).get();

            console.log(data);

            $('#project_id').val(data[0]);
            $('#project_name_edit').val(data[1]);
            $('#start_date_project').val(data[2]);
            });
        });     
}        
</script>


