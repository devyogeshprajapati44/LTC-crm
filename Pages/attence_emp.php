<?php
//error_reporting(0);
include 'connection.php';
include("Pages/pagi_script.php");
?>
  <main id="main" class="main">
         <!-- Start dashboard inner -->
<div class="midde_cont">
  <div class="container-fluid">
  <div class="row column1">
  <div class="col-md-12">
        <div class="container py-5">
            <div class="card mt-3">
                <div class="card-header">

                <nav class="navbar navbar-light bg-light">
                   <form method="POST">
                   <input type="text" name="searchvalue" style="margin:13px;height:41px;padding:-3px;width:205px;margin-top:2px;" placeholder="Search by Employee Name Or Date">
                         <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submitsearch" style="height:41px;padding:6px;width:100px;" value="Search">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-left:716px;margin-top:-85px;">+ Select Attendence Report</button>
                      <a href="Pages/exportCSV.php"><button type="submit" name="exportCSV" id="exportCSV" class="btn btn-success" style="margin-left:628px;margin-top: -121px">Export File</button></a>
                      <h2 style="color:#012970;margin-left:352px;margin-top: -83px;"><b>ATTENDANCE REPORT</b></h2>
                    </form>
              </nav><br><br><br>
                
                </div>
         <!--table start-->
         <div class="card-body">
            <table class="table" style="width:100%">
            <thead class="thead-pink">
              <tr>
                 <th><b>S.No.</b></th>
                 <th><b>Emp Name</b></th> 
                 <th><b>Month</b></th> 
                 <th><b>Year</b></th> 
                 <!-- <th><b>Status</b></th> -->
                 <th><b>P</b></th>
                 <th><b>WO</b></th>
                 <th><b>CO</b></th>
                 <th><b>H</b></th>
                 <th><b>GH</b></th>
                 <th><b>HD</b></th>
                 <th><b>L</b></th>
                 <!-- <th><b>CreatedOn</b></th> -->
                 <th><b>Action</b></th>
               </tr>
                </thead>
               <tbody>
               <?php
                  if(isset($_POST['getreport']))
                  {
                    $emp_id_id=$_POST['emp_id'];
                    $month=$_POST['month'];
                    $year=$_POST['Year'];
                    $date_from=$_POST['date_from'];
                    $date_to=$_POST['date_to'];
                    
                    // Use strtotime to convert the date to a Unix timestamp
                    $timestamp = strtotime($date_from);
                    
                    // Format the date as 'Y-n-d' (year-month-day)
                    $formattedDateFrom = date('Y-n-d', $timestamp);

                  // Use strtotime to convert the date to a Unix timestamp
                  $timestamp_to = strtotime($date_to);

                  // Format the date as 'Y-n-d' (year-month-day)
                  $formattedDate_TO = date('Y-n-d', $timestamp_to);
                  $formatted_date = date('Y-n-j', $timestamp_to);

                    if(($_POST['date_from']!='') && ($_POST['date_to']!=''))
                    {
                      //$sql="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` where `ea`.`user_id`='$emp_id_id' and `ea`.`check_in_date` BETWEEN '$date_to' AND '$date_from'";
                      $sql="SELECT
                      e.emp_name,
                      a.`user_id`,
                      MONTHNAME(a.check_in_date) AS `attendance_month`,
                      YEAR(a.check_in_date) AS 'attendance_year',
                      COUNT(CASE WHEN a.status = 'P' THEN 1 END) AS P,
                      COUNT(CASE WHEN a.status = 'W' THEN 1 END) AS WO,
                      COUNT(CASE WHEN a.status = 'L' THEN 1 END) AS L,
                      COUNT(CASE WHEN a.status = 'CO' THEN 1 END) AS CO,
                      COUNT(CASE WHEN a.status = 'H' THEN 1 END) AS H,
                      COUNT(CASE WHEN a.status = 'GH' THEN 1 END) AS GH,
                      COUNT(CASE WHEN a.status = 'HD' THEN 1 END) AS HD
                  FROM (
                      SELECT
                          `user_id`,
                          `status`,
                          check_in_date
                      FROM `employee_attendence`
                      WHERE `user_id` = '$emp_id_id' AND check_in_date BETWEEN '$formattedDate_TO' AND '$formattedDateFrom'
                  ) AS a
                  RIGHT JOIN employee AS e
                  ON a.`user_id` = e.`Id`
                  WHERE e.Id != 1
                      LIMIT $offset, $no_of_records_per_page";
                    }
                    else
                    {
                      //$sql="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` where `ea`.`user_id`='$emp_id_id' and month(`ea`.`CreatedOn`)='$month' and year(`ea`.`CreatedOn`)='$year'";
                     $sql="SELECT
                     e.emp_name,
                     a.`user_id`,
                     COUNT(CASE WHEN MONTH(a.check_in_date) = '$month' AND a.status = 'P' THEN 1 END) AS P,
                     COUNT(CASE WHEN MONTH(a.check_in_date) = '$month' AND a.status = 'W' THEN 1 END) AS WO,
                     COUNT(CASE WHEN MONTH(a.check_in_date) = '$month' AND a.status = 'L' THEN 1 END) AS L,
                     COUNT(CASE WHEN MONTH(a.check_in_date) = '$month' AND a.status = 'CO' THEN 1 END) AS CO,
                     COUNT(CASE WHEN MONTH(a.check_in_date) = '$month' AND a.status = 'H' THEN 1 END) AS H,
                     COUNT(CASE WHEN MONTH(a.check_in_date) = '$month' AND a.status = 'GH' THEN 1 END) AS GH,
                     COUNT(CASE WHEN MONTH(a.check_in_date) = '$month' AND a.status = 'HD' THEN 1 END) AS HD
                 FROM (
                     SELECT
                         `user_id`,
                         `status`,
                         check_in_date
                     FROM `employee_attendence`
                     WHERE `user_id` = '$emp_id_id'
                         AND MONTH(check_in_date) = '$month'
                         AND YEAR(check_in_date) = '$year'
                 ) AS a
                 RIGHT JOIN employee AS e
                 ON a.`user_id` = e.`Id`
                 WHERE e.Id != 1
                      LIMIT $offset, $no_of_records_per_page";
                    }
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) 
                    {
                        $sno=1;
                        while($row = $result->fetch_assoc()) 
                      {?>
                        <tr>
                        <th scope='row'><?php echo ++$cnt;?></th>
                        <td><?php echo $row["emp_name"];?></td>
                        <td><?php echo $row["attendance_month"];?></td>
                        <td><?php echo $row["attendance_year"];?></td>
                        <td><?php echo $row['P'];?></td>
                        <td><?php echo $row['WO'];?></td>
                        <td><?php echo $row['CO'];?></td>
                        <td><?php echo $row['H'];?></td>
                        <td><?php echo $row['GH'];?></td>
                        <td><?php echo $row['HD'];?></td>
                        <td><?php echo $row['L'];?> </td>
                        <td>
                        <form method="POST">
                        <button id='singlebuttonViewAttendacneDetails' name='ViewAttendacneDetails' value="<?php echo $row['user_id'];?>" class="btn btn-success">View Attendance Details</button>
                        <input type="hidden" name="" id="" value="<?php echo $row['user_id'];?>">
                        </form>
                        </td>
                        </tr>
                     <?php }
                    }
                  }
                  else
                  {
                    $sql="SELECT
                    e.emp_name,
                    MONTHNAME(a.check_in_date) AS attendance_month,
                    YEAR(a.check_in_date) AS attendance_year,
                    a.CreatedOn,
                    MAX(CASE WHEN a.status = 'P' THEN a.count END) AS P,
                    MAX(CASE WHEN a.status = 'W' THEN a.count END) AS WO,
                    MAX(CASE WHEN a.status = 'CO' THEN a.count END) AS CO,
                    MAX(CASE WHEN a.status = 'H' THEN a.count END) AS H,
                    MAX(CASE WHEN a.status = 'GH' THEN a.count END) AS GH,
                    MAX(CASE WHEN a.status = 'HD' THEN a.count END) AS HD,
                    MAX(CASE WHEN a.status = 'L' THEN a.count END) AS L
                FROM (
                    SELECT
                        `user_id`,
                        `status`,
                        COUNT(*) AS count,
                        check_in_date,
                        CreatedOn
                    FROM `employee_attendence`
                    GROUP BY `user_id`, `status`
                ) AS a
                RIGHT JOIN employee AS e
                ON a.`user_id` = e.`Id` 
                WHERE e.Id != 1
                GROUP BY e.emp_name
                ORDER BY e.emp_name LIMIT $offset, $no_of_records_per_page";

                    if(isset($_POST['submitsearch']))
                    {
                      $filtervalue=strtoupper($_REQUEST['searchvalue']);
                      //$sql="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` WHERE `us`.`emp_name` LIKE '%$filtervalue' OR `us`.`emp_name` LIKE '$filtervalue%' OR `us`.`emp_name` LIKE '%$filtervalue%' OR `ea`.`check_in_date` LIKE '$filtervalue%' OR `ea`.`check_in_date` LIKE '%$filtervalue' OR `ea`.`check_in_date` LIKE '%$filtervalue%' LIMIT $offset, $no_of_records_per_page";
                      $sql="SELECT
                      e.emp_name,
                      MONTHNAME(a.check_in_date) AS attendance_month,
                      YEAR(a.check_in_date) AS attendance_year,
                      a.CreatedOn,
                      MAX(CASE WHEN a.status = 'P' THEN a.count END) AS P,
                      MAX(CASE WHEN a.status = 'W' THEN a.count END) AS WO,
                      MAX(CASE WHEN a.status = 'CO' THEN a.count END) AS CO,
                      MAX(CASE WHEN a.status = 'H' THEN a.count END) AS H,
                      MAX(CASE WHEN a.status = 'GH' THEN a.count END) AS GH,
                      MAX(CASE WHEN a.status = 'HD' THEN a.count END) AS HD,
                      MAX(CASE WHEN a.status = 'L' THEN a.count END) AS L
                  FROM (
                      SELECT
                          `user_id`,
                          `status`,
                          COUNT(*) AS count,
                          check_in_date,
                          CreatedOn
                      FROM `employee_attendence`
                      GROUP BY `user_id`, status
                  ) AS a
                  RIGHT JOIN employee AS e
                  ON a.`user_id` = e.`Id` 
                  WHERE e.Id != 1 AND emp_name LIKE '%$filtervalue' OR emp_name LIKE '$filtervalue%' OR emp_name LIKE '%$filtervalue%'
                  GROUP BY e.emp_name
                  ORDER BY e.emp_name LIMIT $offset, $no_of_records_per_page";
                    }
                    if($filtervalue=='')
                    {
                      $sql="SELECT
                      e.emp_name,
                      MONTHNAME(a.check_in_date) AS attendance_month,
                      YEAR(a.check_in_date) AS attendance_year,
                      a.CreatedOn,
                      a.`user_id`,
                      MAX(CASE WHEN a.status = 'P' THEN a.count END) AS P,
                      MAX(CASE WHEN a.status = 'W' THEN a.count END) AS WO,
                      MAX(CASE WHEN a.status = 'CO' THEN a.count END) AS CO,
                      MAX(CASE WHEN a.status = 'H' THEN a.count END) AS H,
                      MAX(CASE WHEN a.status = 'GH' THEN a.count END) AS GH,
                      MAX(CASE WHEN a.status = 'HD' THEN a.count END) AS HD,
                      MAX(CASE WHEN a.status = 'L' THEN a.count END) AS L
                  FROM (
                      SELECT
                          `user_id`,
                          `status`,
                          COUNT(*) AS count,
                          check_in_date,
                          CreatedOn
                      FROM `employee_attendence`
                      GROUP BY `user_id`, status
                  ) AS a
                      RIGHT JOIN employee AS e
                      ON a.`user_id` = e.`Id` 
                      WHERE e.Id != 1 
                      GROUP BY e.emp_name
                      ORDER BY e.emp_name LIMIT $offset, $no_of_records_per_page";
                    }
                    //$sql="SELECT `ea`.*,`us`.`emp_name` FROM `employee_attendence` `ea` left join `employee` `us` ON `ea`.`user_id`=`us`.`Id` LIMIT $offset, $no_of_records_per_page";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) 
                    {
                      $cnt=0;
                        while($row = $result->fetch_assoc()) 
                      {
                        $user_id=$row["Id"];
                        ?>
                        <tr>
                        <th scope='row'><?php echo ++$cnt; ?></th>
                        <td><?php echo $row["emp_name"]; ?></td>
                        <td><?php echo $row["attendance_month"]; ?></td>
                        <td><?php echo $row["attendance_year"]; ?></td>
                        <td><?php echo $row['P']; ?></td>
                        <td><?php echo $row['WO']; ?></td>
                        <td> <?php echo $row['CO']; ?></td>
                        <td> <?php echo $row['H']; ?></td>
                        <td> <?php echo $row['GH']; ?></td>
                        <td> <?php echo $row['HD']; ?></td>
                        <td> <?php echo $row['L']; ?></td>
                        <td>
                        <form method="POST">
                        <button id="singlebuttonViewAttendacneDetails" name="ViewAttendacneDetails" value="<?php echo $row["user_id"]; ?>" class="btn btn-success">View Attendance Details</button>
                        <input type="hidden" name="" id="" value="<?php echo $row["user_id"]; ?>">
                        </form>
                        </td>
                        </tr>
                     <?php }
                    }
                  }   
               ?>
              </tbody>
             </table>
             <?php

                if(isset($_POST["ViewAttendacneDetails"]))
                {
                  $id=$_REQUEST["ViewAttendacneDetails"]; 
                  $EID=EDV($id,1); 
                  header("location:PFC.php?PageName=View_attendance&EmpID=".$EID);
                }

                $sql1="SELECT * from `employee_attendence`";
                echo htmlContent($conn,$sql1,$no_of_records_per_page,$offset,$pageno);
            ?>
            </div>


  <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <Form  action="#"  method="POST" >
        <div class="modal-header">
              <legend class="card-title"  id="myModalLabel"><u>Attendence Report:-</u></legend>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col ms-1 me-2 mt-3">
                      <div class="row">
                        <div class="col-4">
                             <label for="text" class="form-label">EMPLOYEE-NAME:</label>
                              <select name="emp_id" class="fstdropdown-select" id="emp_id">
                                  <option value="NA">SELECT EMPLOYEE NAME</option>
                                  <?php  
                                        $sql="SELECT `Id`,`emp_code`,`emp_name` FROM `employee` ORDER BY `Id` DESC";
                                        $result = mysqli_query($conn, $sql);
                                        while( $row = mysqli_fetch_array($result))
                                        {
                                    ?>
                                  <option value="<?php echo $row["Id"];?>"><?php echo $row["emp_name"];?></option>
                                  <?php } ?>
                              </select>
                             </div>
                             <div class="col-4">
                              <label for="text" class="form-label">Month:</label>
                                 <select name="month" class="month  form-control select_type" id="month">
                                    <option value="NA">SELECT MONTHS</option>
                                    <?php for ($i = 1; $i <= 12; $i++) { $month = date('F', mktime(0, 0, 0, $i, 1, 2011)); ?>
                                          <option value="<?php echo $i; ?>"><?php echo $month; ?></option>
                                    <?php } ?>
                               </select>
                               </div>
                              <div class="col-4">
                              <label for="text" class="form-label">Year:</label>
                                <select name="Year" class="Year form-control select_type" id="Year">
                                  <option value="NA">SELECT YEARS</option>
                                  <?php for($n=2022;$n<=2050;$n++) { ?>
                                      <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                                  <?php } ?>
                              </select>
                              </div>
                            </div><br/>
                            <div class="row">
                            <div class="col-6">
                               <label for="text" class="form-label">Date To:</label>
                              <input type="date" name="date_to" class="form-control" id="date_to" format="Y-m-d">
                             </div>
                             <div class="col-6">
                              <label for="text" class="form-label">Date From:</label>
                              <input type="date" name="date_from" class="form-control" id="date_from" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                            </div>
                         </div>
                      </div>
                    </div>
                   <div class="modal-footer">
                  <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
                  <input type="submit" id="submit"  name="getreport" class="btn btn-primary add_role" value="Submit">
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
</main>
  <!-- ======= Footer ======= -->
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

