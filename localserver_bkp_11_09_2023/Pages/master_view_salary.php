<?php
//error_reporting(0);
//session_start();


include 'connection.php';
include("Pages/pagi_script.php");
// echo $query = "SELECT `msd`.*,`msd`.`Id` as `salary_id` FROM master_salary_data `msd` LIMIT $offset, $no_of_records_per_page";     
// $rs_result = mysqli_query ($conn, $query);
    
?>


<main id="main" class="main">

<!-- Start dashboard inner -->
<div class="midde_cont">
  <div class="container-fluid">
    <div class="row column_title">
     <div class="col-md-12">
        <div class="card_title">
        <h2><u>Master Salary:</u></h2>
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
                              <!-- onkeyup="myFunction()" -->
                                <a class="btn btn-warning text-black" href="PFC.php?PageName=master_view_salary" style="margin:-25;font-size:large;height:39px;padding:6px;width:100px;" role="button">Back</a>&nbsp;&nbsp;
                                    <input type="text" name="searchvalue" id="searchvalue"  style="margin:-25;height:39px;padding:6px;width:300px;"  placeholder="Search Here....">&nbsp;&nbsp;
                                    <!-- <button class="btn btn-outline-success my-2 my-sm-0" style="margin:-25;height:39px;padding:6px;width:100px;" type="submit"  name="fiter_btn">Search</button> -->
                                    <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="margin:-25;height:41px;padding:6px;width:100px;" value="Search">
                                </form>
                              
                          </div>  
                        <!--table start-->
                        <div class="card-body">
                            <table id="myTabless1" class="hover table table-striped" style="width:100%">
                            <thead class="thead-pink" >
                              <tr>
                                <th>S.No</th>
                                <th hidden>ID</th>
                                <th>Employee Name</th>
                                <th>Date</th>   
                                <th style="text-align: center;"><b> Action</b></th>
                              </tr>
                                </thead>
                                <tbody>
                                <?php
                                
                                  //$sql = "SELECT * FROM `master_salary_data` LIMIT $start_from, $per_page_record";
                                  //$sql = "SELECT * FROM `employee` LIMIT $offset, $no_of_records_per_page";
                                  $sql = "SELECT * FROM `employee` where `Id`!='1' LIMIT $offset, $no_of_records_per_page";

                                  if(isset($_POST['submitsearch']))
                                  {
                                    $filtervalue=strtoupper($_REQUEST['searchvalue']);
                                    //$sql = "SELECT * FROM `employee` where `emp_name` LIKE '%$filtervalue' OR `emp_name` LIKE '$filtervalue%' OR `emp_name` LIKE '%$filtervalue%' LIMIT $offset, $no_of_records_per_page";
                                    $sql = "SELECT * FROM `employee` where `emp_name` LIKE '%$filtervalue' OR `emp_name` LIKE '$filtervalue%' OR `emp_name` LIKE '%$filtervalue%' AND where `Id`!='1' LIMIT $offset, $no_of_records_per_page";
                                  }
                                  
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) 
                                  {
                                    $cnt=0;
                                      while($row = $result->fetch_assoc()) 
                                    {?>
                                    <tr>
                                    <td><?php echo ++$cnt;?></td>
                                      <td hidden><?php echo $row["Id"];?></td>
                                      <td><?php echo $row["emp_name"];?></td>
                                      <td><?php echo $row["createdon"];?></td>
                                      <td>
                                        <form method="POST" action='#'>
                                         <button id="singlebuttonedit" name="empView" value="<?php echo $row["Id"]; ?>" class="btn btn-danger" >View</button>
                                          <button id="singlebuttonedit" name="empEdit" value="<?php echo $row["Id"]; ?>" class="btn btn-success" >Edit</button>
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
                          if(isset($_POST["empEdit"]))
                          {
                          $Id=$_REQUEST["empEdit"]; 
                          $EID=EDV($Id,1); 
                          header("location:PFC.php?PageName=master_edit_salary&EmpID=".$EID);
                          }
                          if(isset($_POST["empView"]))
                          {
                          $Id=$_REQUEST["empView"];  
                          $EID=EDV($Id,1);
                          header("location:PFC.php?PageName=master_show_data&EmpID=".$EID);
                          }

                          $sql1 = "SELECT * from `employee`";
                          echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
                      ?>
                  
                          </div>
                        <!--table End-->

            
</main><!-- End #main -->

  <!-- ======= End Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<script type="text/Javascript">
        //function EmpUpdate(id) {
            //window.open('PFC?PageName=employee_details&EmpID='+id,'_blank');
          //  window.open('PFC.php?PageName=Edit_Salary&EmpID='+id,);
      //  }

        
    function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTabless");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    }
</script>