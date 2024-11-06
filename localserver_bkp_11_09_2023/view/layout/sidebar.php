<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link" href="PFC.php?PageName=dashboard">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
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

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Employee Details</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="PFC.php?PageName=employee_details">
          <i class="bi bi-circle"></i><span>Add Employee Details</span>
        </a>

        <a href="PFC.php?PageName=view_employee_details">
          <i class="bi bi-circle"></i><span>View Employee Details</span>
        </a>

        <a href="PFC.php?PageName=add_salary_slip">
          <i class="bi bi-circle"></i><span>Add Salary</span>
        </a>

        <!-- <a href="PFC.php?PageName=print_payslip">
          <i class="bi bi-circle"></i><span>Download Pay_Slip</span>
        </a> -->

      </li>
    </ul>
  </li>
</ul>
<ul class="sidebar-nav" id="sidebar-nav1">


  <li class="nav-item">
    <a class="nav-link" href="PFC.php?PageName=attence_emp">
      <i class="bi bi-people"></i>
      <span>Attendence Management</span>
    </a>
  </li>

</ul>

</aside>