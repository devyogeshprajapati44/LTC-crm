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
        <!-- <div class="col-lg-12">
          <div class="row">
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
            </div> -->
            <!-- Sales Card -->


            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Active <span>| Employees</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Active Employees</h6>
                      <span class="text-success small pt-1 fw-bold">Active Employees</span> <span class="text-muted small pt-2 ps-1">(<?php echo $active_emp_count["Active_employee"];?>)</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!--End Revenue Card-->

            <!-- Customers Card -->
            <div class="col-xxl-6 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">De-Active <span>| Employees</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>De-Active Employees</h6>
                      <span class="text-danger small pt-1 fw-bold">De-Active Employees</span> <span class="text-muted small pt-2 ps-1"><?php echo $deactive_emp_count["DEACTIVE_EMPLOYEE"];?></span>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

        <!--Chart---->
        <br/>
        <h6 style="color:#012970;font-size:15px;"><u><b>Employee Attendance Chart:-</b></u></h6>
        <br/> 
        <div class="card">
        <div class="card-body">
        <div class="row">
        <div class="col-6">
         
        <label class="col-sm-2 col-form-label">Month</label>
            <select class="form-select" id="selectMonth" name="month">
            <option value="NA">--SELECT MONTH--</option>
                      <?php for ($i = 1; $i <= 12; $i++) 
                      { $month = date('F', mktime(0, 0, 0, $i, 1, 2011)); ?>
                        <option value="<?php echo $i; ?>"><?php echo $month; ?></option>
                      <?php } ?>
            </select>
        </div>
        <div class="col-6">
        <label class="col-sm-2 col-form-label">Year</label>
            <select class="form-select" id="selectYear" name="year">
                      <option value="NA">--SELECT YEAR--</option>
                      <?php for($n=2023;$n<=2050;$n++) { ?>
                                      <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                      <?php } ?>
            </select>
                  
        </div>
        </div>
        </div>
        <!---Chart--->
       </div>
       <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Employee Attendance Chart:-</h5>

              <!-- Bar Chart -->
              <!-- <canvas id="myChart"></canvas> -->
              <div style="overflow-x: scroll;">
              <canvas id="barChart" style="max-height: 400px;"></canvas>
                      </div>
              <!-- End Bar CHart -->
<!---->
<script type="text/Javascript">
var myChart;
// Event listener for change in month and year
document.getElementById('selectMonth').addEventListener('change', fetchData);
document.getElementById('selectYear').addEventListener('change', fetchData);

 function fetchData() 
 { 
    var selectedMonth = document.getElementById('selectMonth').value;
    var selectedYear  = document.getElementById('selectYear').value;
    console.log(selectedMonth +' AND ' + selectedYear);
// Make an AJAX request to fetch data
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              //console.log(xhr.responseText);
                 //console.log(xhr.responseText);
                 var data = JSON.parse(xhr.responseText);
                 console.log(data);
                 if (Array.isArray(data)) {
                 var labels = data.map(entry => entry.emp_name);
                 var values = data.map(entry => entry.user_id);
                 //console.log(values);
                 if(!myChart)
                 {
                  var ctx = document.getElementById('barChart');
                  myChart =new Chart(ctx, {
                    type: 'bar',
                    data: {
                      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                      datasets: [{
                        label: labels,
                        //data: [65, 59, 80, 81, 56, 55, 40],
                        data: [values],
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                }
              else
              {
                 myChart.data.labels = labels;
                 myChart.data.datasets[0].data = values;
                 myChart.update();
              }
            }
                 else 
                 {
                console.log('Received data is not in the expected format.');
                }
             } else {
                 console.log('AJAX request failed.');
            }
        }
     };

     xhr.open('GET', 'Pages/attendance_chart_data.php?month=' + selectedMonth + '&year=' + selectedYear, true);
     xhr.send();
 }

// Initial data fetch on page load
//fetchData();
</script>
<!---->
            </div>
          </div>
        </div>
        </div><br/><br/><br/><br/>



    </section>
  </main>
  
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <!-- ======= End Footer ======= -->