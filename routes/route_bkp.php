<?php
include 'connection.php';
include 'controller/loginController.php';
include 'controller/AttendenceController.php';
include 'controller/EmployeeDetailsController.php';
include 'controller/RoleController.php';
include 'controller/departmentController.php';
include 'controller/designationController.php';

class routeController
{
    function __construct()
    {
        //include('model/homeModel.php');
        //$this->obj=new homeModel();
    }
    
    function EmployeeDetails()
    {

       if($_REQUEST['action']=='dashb')
       {
    
            $var_obj=new loginController();
            $var_obj->indexAction();
            if(!$var_obj->indexAction())
            {
                include('view/employee/dashboard.php');
            }
       }
        elseif($_REQUEST['action']=='empdet')
       {
        $var_obj2=new EmployeeDetailsController();
        $var_obj2->add_details();
        if(!$var_obj2->add_details())
        {
            include('view/employee/employee_details.php');
        }
       }
       elseif($_REQUEST['action']=='viewdet')
       {
        //  $var_obj6=new EmployeeDetailsController();
        //  $var_obj6->add_details();
        //  if(!$var_obj6->add_details())
        //  {
            include('view/employee/view_employee_details.php');
            //include('view/employee/emp_listing.php');
        // }
       }
        elseif($_REQUEST['action']=='logout')
        {
            include('controller/logout.php');
        }
        elseif($_REQUEST['action']=='attendence')
        {
                
                $var_obj1=new AttendenceController();
                $var_obj1->attendence();

            if(!$var_obj1->attendence())
            {
                include('view/employee/dashboard.php'); 
            }
        }

        // elseif($_REQUEST['action']=='dashbb')
        // {
        //     include('view/employee/dashboard.php');
        // }
        elseif($_REQUEST['action']=='viewrole')
        {
            //include('view/employee/view_role.php');
            include('view/employee/view_role_management_system_details.php');
        }
        elseif($_REQUEST['action']=='rolem')
        {
            $var_obj1=new RoleController();
            $var_obj1->role_management();
            if(!$var_obj1->role_management())
            {
              include('view/employee/role_management.php');
            }
        }
        elseif($_REQUEST['action']=='depart')
        {
            $var_obj1=new departmentController();
            $var_obj1->add_department();
            if(!$var_obj1->add_department())
            {
              include('view/employee/department.php');
            }
        }
        elseif($_REQUEST['action']=='desig')
        {
            $var_obj1=new designationController();
            $var_obj1->add_designation();
            if(!$var_obj1->add_designation())
            {
              include('view/employee/designation.php');
            }
        }
        elseif($_REQUEST['action']=='viewdesig')
        {
            //include('view/employee/view_designation_details.php');
            $var_objj=new designationController();
            $var_objj->add_designation();
            if(!$var_objj->add_designation())
            {
                include('view/employee/view_designation_details.php');
            }
        }
        elseif($_REQUEST['action']=='viewdepart')
        {
           //echo"Hello Department";die;
           //include('view/employee/view_department_details.php');
           $var_obj4=new departmentController();
           $var_obj4->add_department();
           if(!$var_obj4->add_department())
           {
            include('view/employee/view_department_details.php');
           }

        }
        elseif($_REQUEST['action']=='attend')
        {
            //include('view/employee/attence_emp.php');
            $var_objat=new AttendenceController();
            $var_objat->attendence();
            if(!$var_objat->attendence())
            {
                include('view/employee/attence_emp.php');
            }
        }

        elseif($_REQUEST['action']=='viewmodel')
        {
            include('view/employee/view_model.php'); 
        }
        
            include('view/layout/header.php');
            include('view/layout/sidebar.php');
            include('view/layout/footer.php');
    }

}
?>