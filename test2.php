<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Panel Test Page</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <h2>Pagination for Table</h2>
  <!-- <input type="text" id="searchInput" placeholder="Search..."> -->
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
  <table class="table table-bordered" id="dataTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>emp_name</th>
        <th>emp_status</th>
        <th>phone</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $conn = new mysqli('localhost:8080', 'root', '', 'adminpanel');
        $sql="select * from `employee`";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        $numberPages=5;
        $totalPages=ceil($num/$numberPages);
          //echo $totalPages;
        for($btn=1;$btn<=$totalPages;$btn++)
        {
          //echo '<ul class="pagination"><li class="page-item"><a class="page-link" href="test2.php?page='.$btn.'">'.$btn.'</a></li></ul>';
          echo '<button class="btn btn-primary mx-1 mb-3"><a class="page-link" id="pagelinks" href="test2.php?page='.$btn.'">'.$btn.'</button>';
        } 
        if(isset($_GET['page']))
        {
          $page=$_GET['page'];
          //echo $page;
        }
        else
        {
          $page=1;
        }

        $startingLimit=($page-1) * $numberPages;
        $sql="select * from `employee` limit ".$startingLimit.','.$numberPages;
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result))
            {?>
      <tr>
        <td><?php echo $row["Id"]; ?></td>
        <td><?php echo $row["emp_name"]; ?></td>
        <td><?php echo $row["emp_status"]; ?></td>
        <td><?php echo $row["phone"]; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
    <script>
function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");
  for (var i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
    </script>
</html>