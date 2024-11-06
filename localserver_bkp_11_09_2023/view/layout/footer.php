<footer id="footer" class="footer">
<div class="copyright">
  &copy; Copyright <strong><span>Latech_Solutions</span></strong>. All Rights Reserved
</div>
<div class="credits">
  Designed by <a href="#">Latech-Solutions Pvt Ltd</a>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="assets/js/fstdropdown.js"></script>
<script src="assets/js/fstdropdown.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
    $(".userlogin").hide();
$("#gridRadios1").click(function()
{
    //yes
    if($("#gridRadios1").val()=="yes")
    {
        $(".userlogin").show();
        //alert("Hello world yes");
    } 
});

$("#gridRadios2").click(function()
{
    //no
   if($("#gridRadios2").val()=="no")
    {
        
       // alert("Hello world no");
        $("#username").val("");
        $("#password").val("");
        $("#role").val("NA");
        $(".userlogin").hide();
    }
    
});

$("#gridRadios1").click(function()
{
    //yes
    if($("#gridRadios1:checked").val()=="yes")
    {
        $(".userlogin").show();
        //alert("Hello world yes");
    } 
});

});
$('#myTabless').DataTable( {
dom: 'Bfrtip',
buttons: [ 'excel' ]
});
</script>
<!-- Vendor JS Files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/script.js"></script>
</body>

</html>