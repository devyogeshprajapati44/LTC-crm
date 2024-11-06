<?php
error_reporting(0);
//error_reporting(E_ALL);
//session_start();
include 'config/connection.php';
class EmployeeDetailsController
{
    public $model;
    
    public function add_details()
 { 
    if(isset($_POST['saveempdetails']))
            {
                if(isset($_REQUEST['action']))
                {

                        $str=$_POST["empname"];
                      //$str.=$_POST["empid"];
                      //$str.=$_POST["designation"];
                      //$str.=$_POST["department"];
                      //$str.=$_POST["role"];
                      //$str.=$_POST["status"];
                      //$str.=$_POST["gridRadios"];
                      //$str.=$_POST["username"];
                      //$str.=$_POST["password"];
                      //$str.=$_POST["roleid"];
                      //$str.=$_POST["savedby"];
                      //$str.=$_POST["email"];
                      //$str.=$_POST["phone"];
                      //$str.=$_POST["alernate_number"];
                      //$str.=$_POST["gender"];
                      $fathername=$_POST["father_name"];
                      //$str.=$_POST["father_mobile"];
                      $currentaddress=$_POST["current_address"];
                    // $str.=$_POST["country"];
                    // $str.=$_POST["region"];
                    // $str.=$_POST["city"];
                    // $str.=$_POST["pin_code"];
                     $permanentadd=$_POST["permanent_address"];
                     $beneficiary_name=$_POST["beneficiary_name"];
                    // $str.=$_POST["status"];
                    // $str.=$_POST["beneficiary_name"]
                    // $str.=$_POST["account_number"];
                     $bankname=$_POST["bank_name"];
                     $branchname=$_POST["branch_name"];
                    // $str.=$_POST["ifsc_code"];
                    // $str1 = RemoveSpecialChar($str);
                     
                    //$string=$_POST["department"];
                      $special_var=preg_replace('/[^A-Za-z0-9\-]/', '', $str);
                      $fathername_var=preg_replace('/[^A-Za-z0-9\-]/', '', $fathername);
                      $currentaddress_var=preg_replace('/[^A-Za-z0-9\-]/', '', $currentaddress);
                      $permanentadd_var=preg_replace('/[^A-Za-z0-9\-]/', '', $permanentadd);
                      $beneficiary_name_var=preg_replace('/[^A-Za-z0-9\-]/', '', $beneficiary_name);
                      $branchname_var=preg_replace('/[^A-Za-z0-9\-]/', '', $branchname);
                      $bankname_var=preg_replace('/[^A-Za-z0-9\-]/', '', $bankname);
                    
                       $Sql_insert="INSERT INTO `user`(`emp_name`, `emp_code`, `desig_id`, `dept_id`, `emp_type`, `emp_status`, `user_login`, `username`, `password`, `role_id`, `CreatedBy`,`email`, `phone`, `alernate_number`, `gender`, `father_name`, `father_mobile`, `current_address`, `country`, `state`, `city`, `pin_code`, `permanent_address`, `joining_date`, `status`, `beneficiary_name`, `account_number`, `bank_name`, `branch_name`, `ifsc_code`) 
                       VALUES ('".strtoupper($special_var)."','".strtoupper($_POST["empid"])."','".strtoupper($_POST["designation"])."',
                       '".strtoupper($_POST["department"])."','".strtoupper($_POST["role"])."','".strtoupper($_POST["status"])."',
                       '".strtoupper($_POST["gridRadios"])."','".strtoupper($_POST["username"])."','".strtoupper($_POST["password"])."',
                       '".strtoupper($_POST["roleid"])."','".strtoupper($_POST["savedby"])."',
                       '".strtoupper($_POST["email"])."','".strtoupper($_POST["phone"])."','".strtoupper($_POST["alernate_number"])."',
                       '".strtoupper($_POST["gender"])."','".strtoupper($fathername_var)."','".strtoupper($_POST["father_mobile"])."',
                       '".strtoupper($currentaddress_var)."','".strtoupper($_POST["country"])."','".strtoupper($_POST["region"])."',
                       '".strtoupper($_POST["city"])."','".strtoupper($_POST["pin_code"])."','".strtoupper($permanentadd_var)."','".strtoupper($_POST["joining_date"])."','".strtoupper($_POST["status"])."','".strtoupper($beneficiary_name_var)."','".strtoupper($_POST["account_number"])."','".strtoupper($bankname_var)."','".strtoupper($branchname_var)."','".strtoupper($_POST["ifsc_code"])."')";

                       if ($conn->query($Sql_insert) === TRUE) 
                       {
                         //echo '<script>alert("New Employee Added successfully.")</script>';
                         $newmessage='<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>New Employee Added successfully.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                         include('view/employee/employee_details.php');
                         exit;
                       } 
                       else 
                       {
                         echo "Error: " . $Sql_insert . "<br>" . $conn->error;
                       }
                    
                 //return $result;
                }
}

//Edit Employee Details.
if(isset($_POST['update']))
{
  // echo"Hello world";
  // die;  
  if(isset($_REQUEST['action']))
    {
      $emp_name=$_POST["name"];
      $emp_father_name=$_POST["father_name"];
      $doj=$_POST["joining_date"];
      $status=$_POST["status"];    
      //$emp_id=$_POST["dept_id"];  

      $phone=$_POST["phone"];
      $alt_phone=$_POST["alernate_number"];
      $father_mobile=$_POST["father_mobile"];
      $current_address=$_POST["current_address"];
      $country=$_POST["country1"];
      $region=$_POST["region1"];
      $city=$_POST["city1"];
      $pincode=$_POST["editPincode"];
      $perm_add=$_POST["permanent_address"];
      $desigantion=$_POST["desigid"];
      $department=$_POST["departid"];
      $gender=$_POST["gender"];
      $beneficiary_name=$_POST["beneficiary_name"];
      $account_number=$_POST["account_number"];
      $bank_name=$_POST["bank_name"];
      $branch_name=$_POST["branch_name"];
      $ifsc_code=$_POST["ifsc_code"];
      $forget_pass=$_POST["gridRadios11"];
      $username=$_POST["username1"];
      $password=$_POST["password1"];
      //forget password.
      // if($_POST["gridRadios11"]=="Yes")
      // {
        //$sql_update="UPDATE `user` SET `emp_name`='".strtoupper($_POST["name"])."',`father_name`='".strtoupper($_POST["father_name"])."',`joining_date`='".strtoupper($_POST["joining_date"])."',`emp_status`='".strtoupper($_POST["status"])."',`Updatedon`='now()' WHERE `Id`='".$_POST["dept_id"]."'";  
        echo $sql_update="UPDATE `user` 
        SET 
        `emp_name`='".strtoupper($_POST["name"])."',
        `desig_id`='".strtoupper($desigantion)."',
        `dept_id`='".strtoupper($department)."',
        `father_name`='".strtoupper($_POST["father_name"])."',
        `joining_date`='".$_POST["joining_date"]."',
        `emp_status`='".strtoupper($_POST["status"])."',
        `phone`='".$phone."',
        `alernate_number`='".$alt_phone."',
        `gender`='".strtoupper($gender)."',
        `father_mobile`='".$father_mobile."',
        `current_address`='".strtoupper($current_address)."',
        `country`='".strtoupper($country)."',
        `state`='".strtoupper($region)."',
        `city`='".strtoupper($city)."',
        `pin_code`='".$pincode."',
        `permanent_address`='".strtoupper($perm_add)."',
        `beneficiary_name`='".strtoupper($beneficiary_name)."',
        `account_number`='".strtoupper($account_number)."',
        `bank_name`='".strtoupper($bank_name)."',
        `branch_name`='".strtoupper($branch_name)."',
        `ifsc_code`='".strtoupper($ifsc_code)."',
        `pin_code`='".$pincode."',
        `forget_password`='".strtoupper($forget_pass)."',
        `username`='".$username."',
        `password`='".$password."',
        `Updatedon`='now()' 
        WHERE `Id`='".$_POST["dept_id"]."'";  
      //}
      // else
      // {
        //$sql_update="UPDATE `user` SET `emp_name`='".strtoupper($_POST["name"])."',`father_name`='".strtoupper($_POST["father_name"])."',`joining_date`='".strtoupper($_POST["joining_date"])."',`emp_status`='".strtoupper($_POST["status"])."',`Updatedon`='now()' WHERE `Id`='".$_POST["dept_id"]."'";
        // $sql_update="UPDATE `user` 
        // SET 
        // `emp_name`='".strtoupper($_POST["name"])."',
        // `father_name`='".strtoupper($_POST["father_name"])."',
        // `joining_date`='".$_POST["joining_date"]."',
        // `emp_status`='".strtoupper($_POST["status"])."',
        // `phone`='".$phone."',
        // `alernate_number`='".$alt_phone."',
        // `gender`='".strtoupper($gender)."',
        // `father_mobile`='".$father_mobile."',
        // `current_address`='".strtoupper($current_address)."',
        // `country`='".strtoupper($country)."',
        // `state`='".strtoupper($region)."',
        // `city`='".strtoupper($city)."',
        // `pin_code`='".$pincode."',
        // `permanent_address`='".strtoupper($perm_add)."',
        // `beneficiary_name`='".strtoupper($beneficiary_name)."',
        // `account_number`='".strtoupper($account_number)."',
        // `bank_name`='".strtoupper($bank_name)."',
        // `branch_name`='".strtoupper($branch_name)."',
        // `ifsc_code`='".strtoupper($ifsc_code)."',
        // `pin_code`='".$pincode."',
        // `forget_password`='".strtoupper($forget_pass)."',
        // `username`='".$username."',
        // `password`='".$password."',
        // `Updatedon`='now()' 
        // WHERE `Id`='".$_POST["dept_id"]."'";
      //}
      //$sql_update="UPDATE `user` SET `emp_name`='".strtoupper($_POST["name"])."',`father_name`='".strtoupper($_POST["father_name"])."',`joining_date`='".strtoupper($_POST["joining_date"])."',`emp_status`='".strtoupper($_POST["status"])."',`Updatedon`='now()' WHERE `Id`='".$_POST["dept_id"]."'";
    
          if ($conn->query($sql_update)===TRUE) 
          {
            //echo '<script>alert("Record Update successfully.")</script>';
            $message='<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Record Update successfully.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            include('view/employee/view_employee_details.php');
            //exit;
          } 
          else 
          {
            echo "Error: " . $sql_update . "<br>" . $conn->error;
          }
    }
}
//Edit Employee Details.

//Delete Employee Details.
if(isset($_POST['delete']))
{
    if(isset($_REQUEST['action']))
    {
      $status=$_POST["status"];    
      $emp_id=$_POST["delete_id"];  
      $sql_update_status="UPDATE `user` SET `emp_status`='".strtoupper($status)."',`status_updated_on`='now()' WHERE `Id`='".$emp_id."'";
      $resultt=$conn->query($sql_update_status);
      if ($resultt > '0') 
          {
            //echo '<script>alert("Status Update successfully.")</script>';
            $messagee='<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Status Update successfully.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            include('view/employee/view_employee_details.php');
            //exit;
          } 
          else 
          {
            echo "Error: " . $sql_update_status . "<br>" . $conn->error;
          }
    }
}
//Delete Employee Details.

//return $result; 
}
}
?>