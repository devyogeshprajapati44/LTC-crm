<?php
error_reporting(0);

require_once 'connection.php';
include("Pages/pagi_script.php");
if(isset($_POST["submit"]))
{
  $department_name=CF($_POST["desig_name"],$conn);
  $sql_insert="INSERT INTO `designation`(`Designation`) VALUES ('$department_name')";
  $run_Sub = mysqli_query($conn, $sql_insert);
  header("location:PFC.php?PageName=view_designation_details");
}

//Edit Designation_start
if(isset($_POST["Editsubmit"]))
{
  $department_names=CF($_POST["desig_name_edit"],$conn);
  $desig_Id=CF($_POST["desig_id"],$conn);
  $sql_update="UPDATE `designation` SET `Designation`='$department_names' WHERE `desig_id`='$desig_Id'";
  $run_Subb = mysqli_query($conn, $sql_update);
  header("location:PFC.php?PageName=view_designation_details");
}
//Edit Designation_end.
?>

<main id="main" class="main">
         <!-- Start dashboard inner -->
<div class="midde_cont">
  <div class="container-fluid">
    <div class="row column_title">
     <div class="col-md-12">
        <div class="card_title">
            <h2><u>Add Designation:-</u></h2>
        </div>
     </div>
    </div>
    <!-- row -->
<div class="row column1">
  <div class="col-md-12">
        <div class="container py-5">
            <div class="card mt-3">
                <div class="card-header">
                    <nav class="navbar navbar-light bg-light">
                    <form method="POST">
                          <a class="btn btn-warning text-black" href="" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;" role="button">Back</a>&nbsp;&nbsp;
                            <input type="text" name="searchvalue" style="margin:-25;height:39px;padding:6px;width:300px;"  placeholder="Enter Designation" value="">&nbsp;&nbsp;
                            <input type="submit" class="btn btn-outline-success my-2 my-sm-0" style="margin:-25;height:39px;padding:6px;width:100px;" type="submit" name="submitsearch" value="Search">
                        </form>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        + Add Designation
                    </button>
                </div>
         <div class="card-body">
            <table  class="hover table table-striped" style="width:100%">
            <thead class="thead-pink" >
              <tr>
                 <th><b>S.No.</b></th>
                 <th hidden><b>ID</b></th>
                 <th><b>Designation</b></th> 
                 <th><b> Action</b></th>
               </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT * FROM `designation` order by `desig_id` LIMIT $offset, $no_of_records_per_page";
                  if(isset($_POST['submitsearch']))
                  {
                    $filtervalue=strtoupper($_REQUEST['searchvalue']);
                    $sql = "SELECT * FROM `designation` WHERE `Designation` LIKE '%$filtervalue' OR `Designation` LIKE '$filtervalue%' OR `Designation` LIKE '%$filtervalue%'  ORDER BY `desig_id` LIMIT $offset, $no_of_records_per_page";
                  }

                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) 
                  {
                    $cnt=0;
                   while($row = $result->fetch_assoc()) 
                    {?>  
                    <tr>
                      <td><?php echo ++$cnt;?></td>
                      <td hidden><?php echo $row["desig_id"];?></td>
                      <td><?php echo $row['Designation'];?></td>
                      <td><button  data-bs-toggle='modal' class='btn btn-primary editbtn'>Edit</button></td>
                    </tr>
                      <?php
                    }
                  }
                  ?>
                 </tbody>
            </table>
            <?php
                 $sql1 = "SELECT * from designation";
                 echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
             ?>
           </div>
                
      <!-- Modal -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <Form  action="#"  method="POST" >
        <div class="modal-header">
              <legend class="card-title"  id="myModalLabel"><u>Add Designation:-</u></legend>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="mb-3 row">
                      <label for="desig_name" class="col-sm-2 col-form-label">Designation Name<span style="color: red">*</span></label>
                      <div class="col-4">
                      <input type="text" class="desig_name form-control" name="desig_name" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                 <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
                 <input type="submit" id="submit"  name="submit" class="btn btn-primary add_desig" value="Designation">
          </div>
       </form>
    </div>
</div>
</div>
           <!-- Edit Modal HTML -->     
<div id="EditModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
     <div class="modal-content">
     <Form action="" method="POST"  id="editForm">
          <input type="hidden" id="desig_id" name="desig_id"/>
        <div class="modal-header">
              <legend class="card-title"  id="myModalLabel"><u>Edit Designation:-</u></legend>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="mb-3 row">
                      <label for="desig_name" class="col-sm-2 col-form-label">Designation Name<span style="color: red">*</span></label>
                      <div class="col-4">
                      <input type="text" class="desig_name form-control" name="desig_name_edit" id="desig_name_edit">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                 <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
                 <input type="submit" id="submit"  name="Editsubmit" class="btn btn-primary add_desig" value="Submit">
          </div>
       </form>
        <!-- <Form action="" method="POST"  id="editForm">
          <input type="hidden" id="desig_id" name="desig_id"/>
            <div class="modal-header">						
               <h5 class="card-title"><u>Edit Designation Details:-</u></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
               <div class="modal-body">			
                   <div class="form-group">     
                     <div class="col ms-1 me-2 mt-3">              
                       <div class="row g-3">
                       <div class="col-ms-10">
                           <label for="" class="form-label">Designation Name <span style="color: red">*</span></label>
                          <input type="text" class="desig_name form-control" name="desig_name_edit" id="desig_name_edit">
                      </div>
                   </div><br>
               </div>    
           </div>    
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
           <input type="submit" id="submit"  name="Editsubmit" class="btn btn-primary add_degisnation" value="Submit">
      </div>
    </form> -->
  </div>
</div>
</div>
<div id="deleteModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
          <form  action="index.php?function=EmployeeDetails&action=viewdesig"  method="POST">
             <div class="modal-header">                        
                <h4 class="modal-title"  id="deleteModalLabel">Delete Department</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                         <div class="modal-body">
                         <div class="form-group">                    
                           <p>Are you sure you want to delete these Records?</p>
                           <input type="hidden" name="delete_id" id="delete_id">
                            <input type="hidden" name="department" id="department">
                            <p class="text-warning"><small>.</small></p>
                         </div>
                         </div>
                         <div class="modal-footer">
                           <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
                           <input type="submit" class="btn btn-danger" name="delete" id="delete" value="Delete">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
          
          

<!-- Delete Modal End -->
</main><!-- End #main -->
  <!-- ======= End Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    //return confirm('Are you sure?');
}
</script>
 <script>  
$(document).ready(function(){


  

    $(document).on('click', '.editbtn', function(){
    var id = $(this).val();
      $('#EditModal').modal('show');
        //         $.ajax({
        //         type: "GET",
        //         data:id,
        //         url: 'employee/view_designation_details.php',
        //             success: function (data){
        //               alert(data);   
        //     }
        // });
              $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
            return $(this).text();
            }).get();

            console.log(data);

            
            $('#desig_name_edit').val(data[2]);
            $('#desig_id').val(data[0]);
       
            });
    //$('#myTabless').DataTable();

});          
</script>

<script>
        $(document).ready(function () {

          $('.deletedepartmentBtn').click(function (e) {
                e.preventDefault();
               var department = $(this).val();
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[1]);
              });
            //$('.deletedepartmentBtn').on('click', function () {

              //  $('#deletemodal').modal('show');

              //   $tr = $(this).closest('tr');

              //   var data = $tr.children("td").map(function () {
              //       return $(this).text();
              //   }).get();

              //   console.log(data);

              //   $('#delete_id').val(data[1]);

            //});
        });
    </script>

