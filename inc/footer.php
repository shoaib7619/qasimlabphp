        <!-- footer content -->
        <footer>
		  <div class="pull-left">
		 QASIM CLINICAL LAB - Powered by <a href="#">Heaptech</a>
		  </div>
          <div class="pull-right">
		  <?php
		  date_default_timezone_set("Asia/Karachi");
		   $logindate = $_SESSION['logintime'];
		   $dteStart = new DateTime($logindate);
		   $dteEnd   = new DateTime(); 
		   $dteDiff  = $dteEnd->diff($dteStart); 
		   $finaldate = "";
		   if($dteDiff->h > 0 ){
			  $finaldate = $dteDiff->h . " h : " .$dteDiff->i." mins ago ";
		   }
		   else{
			   $finaldate = $dteDiff->i." mins ago";
		   }
		
			 echo "Login - " . $finaldate;
		  
		  ?>
          
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?=$baseurl?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=$baseurl?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    
   
   
    <!-- bootstrap-daterangepicker -->
    <script src="<?=$baseurl?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?=$baseurl?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=$baseurl?>/build/js/custom.min.js"></script>
	<script src="<?=$baseurl?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=$baseurl?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=$baseurl?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=$baseurl?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?=$baseurl?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?=$baseurl?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=$baseurl?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=$baseurl?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?=$baseurl?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?=$baseurl?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=$baseurl?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?=$baseurl?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
	<script src="<?=$baseurl?>/vendors/script.js"></script>
    <script src="<?=$baseurl?>/build/js/jquery.validate.js"></script>
	<script src="<?=$baseurl?>/inc/js/alertify.min.js"></script>
    <script type="text/javascript">
   

$(document).ready(function() {
  $(".loader").hide();
})
        $(document).ready(function() {
        $('.right_col').css('min-height',$(window).height());});
    </script>
  </body>
</html>
