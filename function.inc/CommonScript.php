<?php
include 'connection.php';

class CommonScript
{
  
public $model;

function City($id)
  {
      $Qry="Select city_name from cities where city_id = '$id'";
      $result = $conn->query($Qry); 
         if ($result->num_rows > 0) 
        {
          while($row = $result->fetch_assoc()) 
          {
            return $row["city_name"];
          }
        } 
  }
  
  function getDesignation($desg_id)  
  {
        //echo $query  = "SELECT `Designation` FROM `designation` where `desig_id`='".$id."'";  
        echo $query  = "SELECT `des`.`Designation` FROM `user` `us` LEFT JOIN `designation` `des` ON `us`.`desig_id`=`des`.`desig_id` WHERE `us`.`desig_id`='".$desg_id."' ";  
        $result = $conn->query($query); 
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                return $row["Designation"];
            }
        } 
  }

  function getDepartment($id)
  { 
      $Qry="SELECT `us`.`dept_id`,`dept`.`department` FROM `user` `us` LEFT JOIN `department` `dept` ON `us`.`dept_id`=`dept`.`dept_id` WHERE `us`.`dept_id`= '$id'";
      $result = mysqli_query($conn, $Qry);  
      $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count  = mysqli_num_rows($result); 
      $department_id=$row["dept_id"];
      $department_name=$row["department"];

    return  $department_name;
  }

  function getRole($id)
  { 
      $Qry="SELECT `us`.`role_id`,`rol`.`role_name` FROM `user` `us` LEFT JOIN `roles` `rol` ON `us`.`role_id`=`rol`.`role_id` WHERE `us`.`role_id`= '$id'";
      $result = mysqli_query($conn, $Qry);  
      $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count  = mysqli_num_rows($result); 
      $role_id=$row["role_id"];
      $role_name=$row["role_name"];

    return  $role_name;
  }

  function getemployeeData($id,$emp_name,$father_name,$joining_date,$emp_status)
  {  
      echo $Qry="SELECT `us`.`role_id`,`rol`.`role_name` FROM `user` `us` LEFT JOIN `roles` `rol` ON `us`.`role_id`=`rol`.`role_id` WHERE `us`.`role_id`= '$id'";
      $result = mysqli_query($conn, $Qry);  
      $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count  = mysqli_num_rows($result); 
      $role_id=$row["role_id"];
      $role_name=$row["role_name"];

    return  $role_name;
  }
public function update($table, $rows, $where)
{
    if ($this->tableExists($table)) {
        for ($i = 0; $i < count($where); $i++) {
            if ($i % 2 != 0) {
                if (is_string($where[$i])) {
                    if (($i + 1) != null) {
                        $where[$i] = '"' . $where[$i] . '" AND ';
                    } else {
                        $where[$i] = '"' . $where[$i] . '"';
                    }
                }
            }
        }
        $where = implode('=', $where);
        
        $update = 'UPDATE ' . $table . ' SET ';
        $keys = array_keys($rows);
        
        $setValues = [];
        foreach ($keys as $key) {
            $value = $rows[$key];
            $setValues[] = "`$key` = '" . mysqli_real_escape_string($this->con, $value)."'";
        }
        
        $update .= implode(',', $setValues);
        $update .= ' WHERE ' . $where;
        
        $query = $this->con->query($update);
        
        if ($query) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

public function delete($table, $where = null)
{
    if ($this->tableExists($table)) {
        if ($where == null) {
            $delete = 'DELETE '.$table; 
        } else {
            $delete = 'DELETE FROM '.$table.' WHERE '.$where; 
        }
        $del = $this->con->query($delete);
        if ($del) {
            return true; 
        } else {
           return false; 
        }
    } else {
        return false; 
    }
}

public function insert($table, $values, $rows = null)
{
    if ($this->tableExists($table)) {
        $insert = 'INSERT INTO '.$table;
        if ($rows != null) {
            $insert .= ' ('.$rows.')';
        }
        for ($i = 0; $i < count($values); $i++) {
            $values[$i] = mysqli_real_escape_string($this->con, $values[$i]);
            if (is_string($values[$i])) {
                $values[$i] = '"'.$values[$i].'"';
            }
        }
        $values = implode(',', $values);
        $insert .= ' VALUES ('.$values.')';
        $ins = mysqli_query($this->con, $insert);
        if ($ins) {
            return true;
        } else {
            return false;
        }
    }
}

public function select($table, $rows = '*', $where = null, $order = null) 
{
    $q = 'SELECT '.$rows.' FROM '.$table;
    if($where != null)
        $q .= ' WHERE '.$where;
    if($order != null)
        $q .= ' ORDER BY '.$order;
    if($this->tableExists($table)) {
        $result = $this->con->query($q);
        if($result) {
            $arrResult = $result->fetch_all(MYSQLI_ASSOC);
            return $arrResult;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
}
?>