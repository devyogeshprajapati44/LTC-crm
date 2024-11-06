<aside id="sidebar" class="sidebar">
<form>
    <input type="hidden" name="pfc_role" id="pfc_role" value="<?php echo $_SESSION['PFC_EmpRole'];?>">
</form>

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link" href="PFC.php?PageName=dashboard">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <span class="empdetal1">
  <li class="nav-item" class="sysconfig">
    <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
      <i class="bi bi-tools"></i><span>System Configuration</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav1" class="nav-content collapse" data-bs-parent="#sidebar-nav1">
      <li>
        <a href="PFC.php?PageName=view_role_management_system_details">
          <i class="bi bi-circle"></i><span>Roles Managements</span>
        </a>
      </li>

      <li>
      <a href="PFC.php?PageName=view_department_details">
          <i class="bi bi-circle"></i><span>Department Management</span>
        </a>
      </li>  

     
      <li>
      <a href="PFC.php?PageName=view_designation_details">
          <i class="bi bi-circle"></i><span>Designation Management</span>
        </a>
      </li>  

    </ul>
  </li>
</span>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Employee Details</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="PFC.php?PageName=employee_details" class="empdetal1">
          <i class="bi bi-circle"></i><span>Add Employee Details</span>
        </a>

        <a href="PFC.php?PageName=view_employee_details" class="empdetal2">
          <i class="bi bi-circle"></i><span>View Employee Details</span>
        </a>

        <a href="PFC.php?PageName=salary_master_data" class="empdetal1">
          <i class="bi bi-circle"></i><span>Salary Master Data</span>
        </a>
        
        <a href="PFC.php?PageName=master_view_salary" class="empdetal1">
          <i class="bi bi-circle"></i><span>View Salary Master Data</span>
        </a>

        <a href="PFC.php?PageName=add_salary_slip" class="empdetal2">
          <i class="bi bi-circle"></i><span>Salary Slip</span>
        </a>

        <a href="PFC.php?PageName=send_sms" class="empdetal2">
          <i class="bi bi-circle"></i><span>Send SMS</span>
        </a>

        <!-- <a href="PFC.php?PageName=change_password">
          <i class="bi bi-circle"></i><span>change_password</span>
        </a> -->

      </li>
    </ul>
  </li>

<span class="empdetal1">
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
      <i class="bi bi-people"></i><span>Attendance Management</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav2" class="nav-content collapse" data-bs-parent="#sidebar-nav2">
      <li>
        <a href="PFC.php?PageName=attence_emp" class="empdetal1">
          <i class="bi bi-circle"></i><span>Attendance Report</span>
        </a>

        <a href="PFC.php?PageName=attendance_upload" class="empdetal1">
          <i class="bi bi-circle"></i><span>Upload Attendance</span>
        </a>

      </li>
    </ul>
  </li>
  </span>

  <span class="empdetal1">
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav6" data-bs-toggle="collapse" href="#">
      <i class="bi bi-projector"></i><span>Project Management</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav6" class="nav-content collapse" data-bs-parent="#sidebar-nav2">
      <li>
        <a href="PFC.php?PageName=project_management" class="empdetal1">
          <i class="bi bi-circle"></i><span>Project Management</span>
        </a>
      </li>
      <li>
        <a href="PFC.php?PageName=project_assigment" class="empdetal1">
          <i class="bi bi-circle"></i><span>Project Assigment</span>
        </a>
      </li>

      <!-- <li>
        <a href="PFC.php?PageName=project_assigment" class="empdetal1">
          <i class="bi bi-circle"></i><span>Project Assignment</span>
        </a>
      </li> -->
    </span>
    </ul>
  </li>

  <span class="empdetal1">
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav3" data-bs-toggle="collapse" href="#">
      <i class="bi bi-globe"></i><span>Earthing</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav3" class="nav-content collapse" data-bs-parent="#sidebar-nav2">
      <li>
        <a href="PFC.php?PageName=earthing_gp" class="empdetal1">
          <i class="bi bi-circle"></i><span>Earthing-GP</span>
        </a>
      </li>
      <li>
        <a href="PFC.php?PageName=view_earthing_gp" class="empdetal1">
          <i class="bi bi-circle"></i><span>View-Earthing-GP</span>
        </a>
      </li>
    </span>
    </ul>
  </li>

  <span class="empdetal1">
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav32" data-bs-toggle="collapse" href="#">
      <i class="bi bi-globe"></i><span>Ticketing System</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav32" class="nav-content collapse" data-bs-parent="#sidebar-nav2">
      <li>
        <a href="PFC.php?PageName=create_ticket" class="empdetal1">
          <i class="bi bi-circle"></i><span>Create Ticket</span>
        </a>
      </li>
      <li>
        <a href="PFC.php?PageName=view_ticket_list" class="empdetal1">
          <i class="bi bi-circle"></i><span>Ticket List</span>
        </a>
      </li>
    </span>
    </ul>
  </li>
</ul>
</aside>