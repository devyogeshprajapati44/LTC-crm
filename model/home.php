<?php
class homeModel
{

function __construct()
{
    try
    {
      $this->con=new PDO("mysql:host='localhost';dbname='adminpanel';username='root',password='',charset=utf8");
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
    
}

function page($id)
{
    // $sql="SELECT `title`,`data` FROM `page` WHERE `Id`='$id'";
    // $stmt=$this->con->prepare($sql);
    // $stmt->execute();
    // $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
    // $arr=$data['0'];
    // return $arr;
}

// function dashboard()
// {
//     $sql="SELECT `title`,`data` FROM `page` WHERE `Id`='1'";
//     $stmt=$this->con->prepare($sql);
//     $stmt->execute();
//     $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
//     $arr=$data['0'];
//     return $arr;
// }

// function employeedetails()
// {
//     $sql="SELECT `title`,`data` FROM `page` WHERE `Id`='2'";
//     $stmt=$this->con->prepare($sql);
//     $stmt->execute();
//     $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
//     $arr=$data['0'];
//     return $arr;
// }

// function viewemployeedetails()
// {
//     $sql="SELECT `title`,`data` FROM `page` WHERE `Id`='3'";
//     $stmt=$this->con->prepare($sql);
//     $stmt->execute();
//     $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
//     $arr=$data['0'];
//     return $arr;
// }

}
?>