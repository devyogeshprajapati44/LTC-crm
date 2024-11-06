<?php
date_default_timezone_set("Asia/Calcutta");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Admin_Panel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/fstdropdown.css" rel="stylesheet">
  <link href="assets/css/fstdropdown.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
  
    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin_Panel</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <!-- <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form> -->
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
   
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

<!-- End Notification Nav -->
<!-- End Messages Nav -->
<li>
  <div id=EmpSigninStatus>
</div>
<?php
$Status= checkentry($PFC_UID,$conn);
if($Status==1)
{
  ?>
  <input type="hidden" name="PFC_UID" value="<?php echo $PFC_UID;?>">
  <button class="btn btn-info" type="submit" name="checkinn1589" data-dismiss="modal" disabled>Sign-In Time - <?php echo TimeDiff($PFC_UID,$conn); ?></button>
  <form method="POST">
  <button class="btn btn-info" type="submit" name="checkoutt5698" data-dismiss="modal" >Sign-Out</button>
</form>
  
  <?php
}elseif($Status==2){
  ?>
<form method="POST">
  <button class="btn btn-info" type="submit" name="checkinn56" data-dismiss="modal">Sign-In</button>
</form>
  <?php
  }else{

  }
  ?>

</li>
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Dashboard</span>
          </a><!-- End Profile Iamge Icon -->
          
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['PFC_EmpName'];?></h6>
              <span><?php echo '('.$_SESSION['PFC_EmpID'].')';?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="Logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
 <?php
// //check-in and checkout time.
// if(isset($_POST['checkinn25'])) 
// {
//     $checkinTime=date('h:i a');
//     $checkinDate=date('d-m-y');
//     $userID=$_SESSION['PFC_UID'];
//     $sql_insert="INSERT INTO `employee_attendence`(`user_id`, `check_in_time`,`check_in_date`) VALUES ('".$userID."','".$checkinTime."','".$checkinDate."')";
//     //$result=mysqli_query($conn, $sql_insert);
//     if(mysqli_query($conn, $sql_insert))
//  {
//   // header("location:PFC.php?PageName=header&Mgs=1&EmpID=$EmpID");
//   header('Location: '.$_SERVER['PHP_SELF']);
//   exit;
//  }
//  else
//  {
//      echo "Error: " . $sql_update . "<br>" . $conn->error;
//  }
// }  

// if(isset($_POST['checkoutt']))
// {

//                 $user_id=$_SESSION['PFC_UID'];
//                 $sql_id ="SELECT * FROM `employee_attendence` WHERE `user_id`='".$user_id."' and  Date(`CreatedOn`)=Date(now()) order by Id desc";      
//                 $result = mysqli_query($conn, $sql_id);  
//                 $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);  
//                 $count  = mysqli_num_rows($result); 
//                 $id     = $row["Id"];

//                 $checkintime=$row["check_in_time"];
//                 $_SESSION["ID"]=$id;
//                 $idd=$_SESSION["ID"];
//                 $_SESSION["checkin"]=$checkintime;

//                 $checkout=date('h:i a');
//                 $current_date_checkout=date('d-m-y');
//                 $checkin=$_SESSION["checkin"];
//                 //$checkout=$ctt;
//                 $t1 = strtotime($_SESSION["checkin"]);
//                 $t2 = strtotime($checkout);
//                 $hours = ($t2 - $t1)/3600;  

//                 $tootltime=floor($hours) . ':' . ( ($hours-floor($hours)) * 60 );
        

//     $sql_update="UPDATE `employee_attendence` SET `check_out_time`='".$checkout."',`check_out_date`='".$current_date_checkout."',`Total_hours`='".$tootltime."' WHERE `user_id`='".$user_id."' AND Id='".$idd."'";

//                 $resultt=mysqli_query($conn,$sql_update);
//                 if($resultt === TRUE)
//                 {

//                 }
//                 else
//                 {
//                     echo "Error: " . $sql_update . "<br>" . $conn->error;
//                 }
//             }
//check-in and checkout time.
  ?>