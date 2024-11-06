<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
   var emprole=$("#pfc_role").val();
   if(emprole==2)
   {
        $(".empdetal1").hide();
        $(".empdetal2").show();
        $(".sysconfig").hide();
        $(".attendance1").hide();
        $("#editbutton").hide();
        $("#delbutton").hide();
   }

   if(emprole==1)
   {
        $(".empdetal1").show();
        $(".empdetal2").show();
        $(".sysconfig").show();
        $(".attendance1").show();
        $("#editbutton").show();
        $("#delbutton").show();
   }

   if(emprole==3)
   {
        $(".empdetal1").hide();
        $(".empdetal2").show();
        $(".sysconfig").hide();
        $(".attendance1").hide();
   }

  
   });
</script>
</head>
<body>

<form>
    <input type="hidden" name="pfc_role" id="pfc_role" value="<?php echo $_SESSION['PFC_EmpRole'];?>">
</form>

</body>
</html>