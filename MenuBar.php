<?php
// if($PFC_EmpRole==1){
//     include 'AdminRole.php';
// }elseif($PFC_EmpRole==2){
//     include 'CeoRole.php';
// }

// elseif($PFC_EmpRole==3){
//     include 'SalesRole.php';
// }elseif($PFC_EmpRole==4){
//     include 'AccountsRole.php';
// }elseif($PFC_EmpRole==5){
//     include 'BackendRole.php';
// }elseif($PFC_EmpRole==6){
//     include 'PurchaseRole.php';
// }

// if($PFC_EmpRole==2)
// {
//     include 'dashboard.php';
// }
if($PFC_EmpStatus=='1')
{
    include './Pages/dashboard.php';
}