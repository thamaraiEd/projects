 <div class="daily_puzzles">  
<div class="row">	 
	<div class="clsicon col-md-12 col-sm-12 col-xs-12 " style="text-align: center;font-size: 24px;font-weight: bold;"><i class="fa fa-university"></i> Class List</div>	    
</div> 

<div id="mainContDisp" class="container playGames homePlayGames " style="margin-top:20px;margin-bottom:70px;">
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12"> 
		<div class="x_panel tile">
			<table id="assementTable" class="assementTable table table-striped table-bordered table-hover table-condensed display no wrap">
				<thead style="background-color: #1abb9c; color: #fff;">
					<tr class="table-info">
						<th><center>S.No.</center></th> 
						<th><center>Grade</center></th>  
						<th><center>Section</center></th>  
					</tr>  
				</thead> 
				<tfoot>
					<tr>
						<th></th> 
						<th></th> 
						<th> </th> 
					</tr> 
				</tfoot>
				<tbody>
					<?php   
					$i=1; foreach($getaddedgradesection as $row) { ?>
						<tr>
							<td> <?php echo $i; ?> </td>  
							<td> <?php echo $row['gradename']; ?> </td>  
							<td> <?php echo $row['section']; ?> </td>  
						</tr>
					<?php $i++; } ?> 
				</tbody>
            </table>
		</div>
	</div>
</div>	
</div>	
   
	<div class="row">
		<div class="col-lg-12">
			<div class="MyGamesPager pageHomePagerHide Dashboardhide myreporthide myprofilehide" >
				 <div class="contentbox" id="dashboard_ajax"> 
				</div>
			</div> 
		</div> 
		</div>   
		</div>   
 
<link href="<?php echo base_url(); ?>assetsnew/css/stylenew.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assetsnew/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assetsnew/css/dataTables.tableTools.css" rel="stylesheet" type="text/css"> 
<script src="<?php echo base_url(); ?>assetsnew/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assetsnew/js/dataTables.tableTools.js" type="text/javascript"></script> 
<script> 
$(document).ready(function() {
  $('#assementTable').DataTable( {
	"lengthMenu": [[10,  -1], [10,  "All"]],  
	
	initComplete: function () {
    this.api().columns([1,2,3,4,6,7]).every( function () {
     var column = this; //console.log(column);
     var select = $('<select><option value="">Show All</option></select>')
      .appendTo( $(column.footer()).empty() )
      .on( 'change', function () {
       var val = $.fn.dataTable.util.escapeRegex(
        $(this).val()
       );
  
       column
        .search( val ? '^'+val+'$' : '', true, false )
        .draw();
      } );
  
     column.data().unique().sort().each( function ( d, j ) {
      select.append( '<option value="'+d+'">'+d+'</option>' )
     } );
    });
   } 
   
  });
 });
</script>
<style>
#assementTable_wrapper #assementTable_wrapper #assementTable_length{display:none;}
#assementTable_wrapper #assementTable_wrapper #assementTable_filter{display:none;}
#assementTable_wrapper #assementTable_wrapper #assementTable_info{display:none;}
#assementTable_wrapper #assementTable_wrapper #assementTable_paginate{display:none;} 
 
.totreg{
	font-size:18px;
	color:#000;
}
button, select{
	color:#000;
}
th { font-size: 15px; }
td { font-size: 15px; }
.clssclname {
    font-weight: 700;
    font-size: 20px; 
    margin: 20px;
    margin-left: 347px;
	text-align:center;
}	
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate { 
    font-size: 15px !important;
}
#assementTable tfoot{display: table-header-group;}
</style>
 