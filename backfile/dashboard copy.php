<!-- End Sidebar-->
<?php
error_reporting(0);
session_start();
//Total Employee
$total_emp="SELECT count(*) as `Total_employee` FROM `employee`";
$result_emp=mysqli_query($conn,$total_emp);
$total_count=mysqli_fetch_array($result_emp);
//Total Employee
//Active Employee
$active_emp="SELECT count(*) as `Active_employee` FROM `employee` where `emp_status`='1'";
$result_active=mysqli_query($conn,$active_emp);
$active_emp_count=mysqli_fetch_array($result_active);
//Active Employee

//InActive Employee
$deactive_emp="SELECT count(*) as `DEACTIVE_EMPLOYEE` FROM `employee` where `emp_status`='2'";
$result_deactive=mysqli_query($conn,$deactive_emp);
$deactive_emp_count=mysqli_fetch_array($result_deactive);
//Active Employee
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Total <span>| Users</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Dashboard</h6>
                      <span class="text-success small pt-1 fw-bold">Total Users</span> <span class="text-muted small pt-2 ps-1"><?php echo $total_count["Total_employee"];?> (Active and Inactive)</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Active <span>| Users</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Active users</h6>
                      <span class="text-success small pt-1 fw-bold">Active users</span> <span class="text-muted small pt-2 ps-1">(<?php echo $active_emp_count["Active_employee"];?>)</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!--End Revenue Card-->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">De-Active <span>| Users</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>De-Active users</h6>
                      <span class="text-danger small pt-1 fw-bold">De-Active users</span> <span class="text-muted small pt-2 ps-1"><?php echo $deactive_emp_count["DEACTIVE_EMPLOYEE"];?></span>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </main>
  
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <!-- ======= End Footer ======= -->