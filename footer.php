<footer>
          <div class="pull-right">
            Copyright © <?php echo date('Y');?> SkillAngels. All rights reserved.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
     

	
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/nprogress.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/gauge.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-progressbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/skycons.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.flot.time.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.flot.resize.js"></script>
	

    <script src="<?php echo base_url(); ?>assets/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.flot.spline.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/curvedLines.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/date.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/jquery.vmap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.vmap.world.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.vmap.sampledata.js"></script>
	
    <script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
		 
	<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>
	<!-- FullCalendar -->
    <link href="<?php echo base_url(); ?>assets/css/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/fullcalendar.print.css" rel="stylesheet" media="print">
	
	
<link href="<?php echo base_url(); ?>assets/css/datatbl/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/datatbl/buttons.dataTables.min.css" rel="stylesheet" type="text/css"> 
<link href="<?php echo base_url(); ?>assets/css/datatbl/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"> 

<script src="<?php echo base_url(); ?>assets/js/datatbl/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/datatbl/dataTables.buttons.min.js" type="text/javascript"></script>
	 <script src="<?php echo base_url(); ?>assets/js/datatbl/buttons.flash.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/datatbl/jszip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/datatbl/pdfmake.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/datatbl/vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/datatbl/buttons.html5.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/datatbl/buttons.print.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/datatbl/pdfmake.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/js/datatbl/dataTables.fixedColumns.min.js" type="text/javascript"></script> 


	<script type="text/javascript">
	

		$( document ).ready(function() {
			$("#calview").click(function() {
				$("#tableview").hide();
				$("#chartview").hide();
				$("#calendarview").show();
				$("#todayfilter").show();
			});
			$("#tblview").click(function() {
				$("#tableview").show();
				$("#chartview").hide();
				$("#calendarview").hide();
				$("#todayfilter").show();
			});
			$("#chview").click(function() {
				$("#tableview").hide();
				$("#chartview").show();
				$("#calendarview").hide();
				$("#todayfilter").show();
			});
		});
	</script>
	 </div>
    </div>
  </body>
</html>

<style>
.dateinfo .count{font-size:20px;color:#337ab7;font-weight: bold;display:block;padding-left:20px;}
.dateinfo .count_top{font-size:15px;font-weight: bold;}
.toppart h4{padding:0px; margin:0 0 0 10px;}
.footerpart .fa-arrow-circle-right{color: #f60;}
.footerpart{background: #f3f1f1;overflow: hidden;}
.tile-stats .icon i{font-size:40px;}
.tile-stats .icon{right: 30px;top: 10px;}

.assementTable_wrapper .assementTable_wrapper .assementTable_length{display:none;}
.assementTable_wrapper .assementTable_wrapper .assementTable_filter{display:none;}
.assementTable_wrapper .assementTable_wrapper .assementTable_info{display:none;}
.assementTable_wrapper .assementTable_wrapper .assementTable_paginate{display:none;}

#assementTable_wrapper #assementTable_wrapper #dataTables_length{display:none;}
#assementTable_wrapper #assementTable_wrapper #dataTabletd_filter{display:none;}
#dataTabletd_wrapper #dataTabletd_wrapper #dataTabletd_info{display:none;}
#dataTabletd_wrapper #dataTabletd_wrapper #dataTabletd_paginate{display:none;}


</style>
	

		