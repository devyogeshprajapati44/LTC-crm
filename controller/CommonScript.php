<?php
include 'config/connection.php';
 
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
  
function getDesignation($id)  
  {   
                //   $query  = "SELECT `Designation` FROM `user` where `Id`='".$id."'";  
                //   $result = $conn->query($query); 
                //   if ($result->num_rows > 0) 
                //  {
                //     while($row = $result->fetch_assoc()) 
                //    {
                //      return $row["Designation"];
                //    }
                //  } 
                $myresult = 'This is getDesignation function.';
                return $myresult;
  }

  function getFatherName($id)
  {
      $Qry="Select `father_name` from `user` where `Id` = '$id'";
      $result = $conn->query($Qry); 
         if ($result->num_rows > 0) 
        {
          while($row = $result->fetch_assoc()) 
          {
            return $row["father_name"];
          }
        } 
        return $row["father_name"];
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