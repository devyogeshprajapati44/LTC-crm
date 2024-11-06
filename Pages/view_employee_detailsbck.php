<?php
//error_reporting(0);
include 'connection.php';
?>
<style>
.pagination {
margin: 0;
}

.pagination li:hover{
cursor: pointer;
}

.header_wrap {
padding:30px 0;
}
.num_rows {
width: 20%;
float:left;
}
.tb_search{
width: 20%;
float:right;
}
.pagination-container {
width: 70%;
float:left;
}

.rows_count {
width: 20%;
float:right;
text-align:right;
color: #999;
}
</style>
<main id="main" class="main">
    <div class="pagetitle">
      <h1><u>View Employee Details:-</u></h1>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card"><br>
            <div class="card-body">
            <nav class="navbar navbar-light bg-light">
                  <a class="btn btn-warning text-black" href="PFC.php" style="margin:7px;font-size:large;height:37px;padding:6px;width:100px;" role="button">Back</a>&nbsp;&nbsp;
                    <form method="POST">
                         <input type="text" name="searchvalue" style="margin:13px;height:41px;padding:-3px;width:287px;" placeholder="Search by name" title="Type in a name">&nbsp;&nbsp;
                         <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                         </form>
                           <a class="btn btn-warning text-black" href="PFC.php?PageName=project_add_assignatment" style="margin:11px;font-size:large;height:46px;padding:11px;width:210px;" class="btn btn-success">+ Project Assignment</a>
                     </div>
                     <div class="container">
                         <div class="header_wrap">
                           <div class="num_rows">
                             <div class="form-group"> 
                              <select class="form-control" name="state" id="maxRows">
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="70">70</option>
                                <option value="100">100</option>
                                <option value="5000">Show ALL Rows</option>
                               </select>
                              </div>
                              </div>
                          </div> 
              <h5 class="card-title"><u>View Employee Details:-</u></h5>
                <table id="table-id" class="hover table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">EmpName</th>
                    <th scope="col">Employee Father's name</th>
                    <th scope="col">Date Of Joining</th>
                    <th scope="col">Department</th>
                    <th scope="col">Status</th>
                    <th scope="col"><span class="actives">Action</span></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                
                   
                    $sql="SELECT `us`.`Id`,`us`.`emp_name`,`us`.`father_name`,`us`.`joining_date`,`us`.`emp_status`,`us`.`CreatedBy`, `design`.`Designation`, `depart`.`department`,CASE
                    WHEN us.emp_status='1' THEN 'ACTIVE'
                    WHEN us.emp_status='2' THEN 'DE-ACTIVE'
                    
                  END as emp_status FROM `employee` `us` LEFT JOIN `designation` `design` ON `us`.`desig_id`= `design`.`desig_id` LEFT JOIN `department` `depart` ON `us`.`dept_id` = `depart`.`dept_id`  where `us`.`emp_status`='1' and `us`.`emp_status`!='' AND `us`.`role_id`='".$_SESSION['PFC_EmpRole']."' AND `us`.`Id`='".$_SESSION['PFC_UID']."'  order by `us`.`Id` desc";
                   
                    if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5))
                  
                    {
                      $sql="SELECT `us`.`Id`,`us`.`emp_name`,`us`.`father_name`,`us`.`joining_date`,`us`.`emp_status`,`us`.`CreatedBy`, `design`.`Designation`, `depart`.`department`,CASE
                      WHEN us.emp_status='1' THEN 'ACTIVE'
                      WHEN us.emp_status='2' THEN 'DE-ACTIVE'
                    END as emp_status FROM `employee` `us` LEFT JOIN `designation` `design` ON `us`.`desig_id`= `design`.`desig_id` LEFT JOIN `department` `depart` ON `us`.`dept_id` = `depart`.`dept_id`  where `us`.`emp_status`='1' and `us`.`emp_status`!=''  order by `us`.`Id` desc 
                    ";
                    }
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                     
                        while($row = $result->fetch_assoc()) 
                      {
                ?>
                        <tr>
                             
                            <td><?php echo $row["Id"];?></td>
                            <td><?php echo $row["emp_name"];?></td>
                            <td><?php echo $row["father_name"];?></td>
                            <td><?php echo $row["joining_date"];?></td>
                            <td><?php echo $row["department"]; ?></td>
                            <td><?php echo $row["emp_status"];?></td>
                        <td>
                      <form method="POST">
                        <button id="singlebutton"     name="empView" value="<?php echo $row["Id"]; ?>" class="btn btn-info">View</button>
                        <?php if(($_SESSION['PFC_EmpRole']==1) || ($_SESSION['PFC_EmpRole']==5)) {?>
                        <button id="singlebuttonedit" name="empEdit" value="<?php echo $row["Id"]; ?>" class="btn btn-success">Edit</button>
                        <button id="singlebuttondel"  name="empDel"  value="<?php echo $row["Id"]; ?>" class="btn btn-danger">Delete</button>
                        <?php } else {?>
                        <!-- <button id="singlebuttonedit1" name="empEdit1" value="<?php //echo $row["Id"]; ?>" class="btn btn-success"></button>
                        <button id="singlebuttondel1"  name="empDel1"  value="<?php //echo $row["Id"]; ?>" class="btn btn-danger"></button> -->
                        <?php } ?>
                        <input type="hidden" name="pfc_role" id="pfc_role" value="<?php echo $_SESSION['PFC_EmpRole'];?>">
                        <input type="hidden" name="pfc_id" id="pfc_id" value="<?php echo $_SESSION['PFC_UID'];?>">
                        </form>
                      </td>
                    </tr>               
                      <?php
                      }
                    }
                    ?>
                    
                </tbody>
              </table>
             <?php
              function search_data($id,$conn)
              {
                if(isset($_POST['submitsearch']))
                {
                  $filtervalue=strtoupper($_REQUEST['searchvalue']);
                  $sqldata = "SELECT * FROM employee where Id ='$id' LIKE '%$filtervalue' OR `emp`.`emp_name` LIKE '$filtervalue%' OR `emp`.`emp_name` LIKE '%$filtervalue%'";
                }
                $resul = mysqli_query($conn,$sqldata);
                $rawdata = mysqli_fetch_assoc($resul);
                $PojectName=$rawdata['emp_name'];
                return $PojectName;
              }
             ?>
            </div>
          </div>

        </div>
      </div>


<?php
    if(isset($_POST["empView"]))
    {
      $id=$_REQUEST["empView"];  
      header("location:PFC.php?PageName=EmpView&EmpID=".$id);
    }

    if(isset($_POST["empEdit"]))
    {
      $id=$_REQUEST["empEdit"];  
      header("location:PFC.php?PageName=EmpUpdate&EmpID=".$id);
    }

    if(isset($_POST["empDel"]))
    {
      $id=$_REQUEST["empDel"];  
      header("location:PFC.php?PageName=EmpDel&EmpID=".$id);
    }
?>

<!--view modal-->
<?php
include("Pages/view_model.php");
?>  
 <!--view modal-->
 <!--Delete modal-->
    </section>

  </main>
  <?php require_once 'script.php';?>
  <script src="assets/js/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
 
  $(document).ready(function()
{
  $("#gridRadios1").click(function()
  {
    //alert($("#gridRadios1").val());
if($("#gridRadios1").val()=='Yes')
{
  $(".userlogin").show();
}
if($("#gridRadios1").val()=='No')
{
  $(".userlogin").hide();
  $("#username1").val('');
  $("#password").val('');
}
  });

  $("#gridRadios2").click(function()
  {
    //alert($("#gridRadios2").val());
if($("#gridRadios2").val()=='No')
{
  $(".userlogin").hide();
  $("#username1").val('');
  $("#password").val('');
}
  });
  
});
  </script>

<script>  

$(document).ready(function(){

  $(document).on('click', '.editbtn', function()
  {
  var id = $(this).val();
  $('#EditModal').modal('show');    
  $tr = $(this).closest('tr');

var data = $tr.children("td").map(function () 
{
return $(this).text();
}).get();

    //console.log(data);
    $('#dept_id').val(data[0]);
    $('#name1').val(data[1]);
    $('#father_name1').val(data[2]);
    $('#joining_date1').val(data[3]);
    $('#status1').val(data[4]);

      });
    });    

</script>
<script type="text/javascript">  

$(document).ready(function(){

  $(document).on('click', '.viewbtn', function()
  {
  var id = $(this).val();
  var viewdata = $("#empView").val();
  //alert(viewdata);
    $('#viewModal').modal('show');    
    $tr = $(this).closest('tr');

var data = $tr.children("td").map(function () {
return $(this).text();
}).get();
//console.log(data);
      });
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

                $('#delete_id').val(data[0]);
                $('#editstatus').val(data[21]);
              });
        });
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/Javascript">
$(document).ready(function(){
    $('#country').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'view/employee/ajaxData.php',
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
                url:'view/employee/ajaxData.php',
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
<script type="text/javascript">
// $(document).ready(function()
// {
// var emp_role=$("#pfc_role").val();
// console.log(emp_role);
// if(emp_role==2)
//    {
//         $("#singlebuttonedit").hide();
//         $("#singlebuttondel").hide();
//    }

// if(emp_role==1 || emp_role==5)
//    {
//         $("#singlebuttonedit").show();
//         $("#singlebuttondel").show();   
//    }
// if(emp_role==3 || emp_role==4)
//    {
//         $("#singlebuttonedit").show();
//         $("#singlebuttondel").hide();
//    }

// });
</script>

  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <!-- ======= End Footer ======= -->
