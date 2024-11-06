<?php
require_once 'controller/DBController.php';
class loginModel
{
    public $db;

    public function CheckUserLogin()
    {
        $query="SELECT * FROM `user` WHERE username='{username}' AND password='{password}'";
        $stmt=$this->db->prepare($query)->execute();
        return $stmt;
    }
}
?>