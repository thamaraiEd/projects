 
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12"> 
		<div class="x_panel tile">
			<table id="assementTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
				<thead style="background-color: #1abb9c; color: #fff;">
					<tr class="table-info">
						<th>S.No.</th>
						<th>Date</th>
						<th>Start Time</th>
						<th>End Time</th> 
						<th>Shot Name</th> 
						<th>No. of Character</th> 
						<th>Assigned Frames</th>
						<th>Assigned Duration</th>
						<th>Heedio/Slapstick</th>
						<th>Action Type</th>
						<th>Char 1</th>
						<th>Char 2</th> 
						<th>Char 3</th> 
						<th>Char 4</th> 
						<th>Char 5</th> 
						<th>Library Available</th> 
						<th>Auto Complexity</th> 
						<th>Manual Complexity</th> 
						<th>Expected Productivity</th> 
						<th>Completed Frames</th> 
						<th>Approved Frames</th> 
						<th>Deficit</th> 
						<th>Work Hour</th> 
						<th>Remark</th> 
						<th>MK Comments</th> 
					</tr> 
					 
				</thead> 
				<tbody>
					<?php  //echo '<pre>'; print_r($user_skillreport);exit;
					  for ($x = 0; $x <= 10; $x++) { ?>
						<tr>
							<td><?php echo $x; ?></td>  
							<td>04-May</td> 
							<td>9:00:00 AM</td>
							<td>12:00:00 PM</td>
							<td>KandT_EP18_SQ04_SH068</td>  
							<td>2</td> 
							<td>75</td> 
							<td>3</td> 
							<td>Heedio</td> 
							<td>Walk</td>  
							<td>zibu</td>   
							<td>koka</td>  
							<td>Kapi</td> 
							<td>tura</td> 
							<td>bansa</td> 
							<td>No</td> 
							<td>Simple</td> 
							<td>Simple</td> 
							<td>7</td> 
							<td>75</td> 
							<td>22</td> 
							<td>0</td> 
							<td>3:00</td> 
							<td>episode 14 corrections</td> 
							<td>ok</td> 
						</tr>
					<?php   } ?> 
				</tbody>
            </table>
		</div>
	</div>
</div>	
 	
 
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>  
<script> 
$(document).ready(function(){
 $('#assementTable').DataTable( {
	// fixedHeader: false,
	"lengthMenu": [[10,  -1], [10,  "All"]],
	"scrollY":true,
	//"scrollX":true,
	dom: 'Blfrtip' 
	/* initComplete: function () {
			 
				this.api().columns().every( function () {

					var column = this; //console.log(column);  
					//$('#example tfoot th').not(":eq(2),:eq(3),:eq(4)") 
					//$('#assementTable tfoot th').not(":eq(3),:eq(4)")
					var some = column.index();
                if (column.index() == 0) return;
                if ( (column.index() == 5) || (column.index() == 6) || (column.index() == 7)|| (column.index() == 8)|| (column.index() == 9)|| (column.index() == 10)|| (column.index() == 11)) return;   
				 
					var select = $('<select><option value="">Show All</option></select>')
						.appendTo( $('.assementTable thead tr:eq(1) th:eq('+column.index()+')') )
						.on('click',function(){
							 
							return false;
							
						})
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
	 
							column
								 
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );
	 
					column.data().unique().sort().each( function ( d, j ) {
						 if (d !== "") {
						select.append( '<option value="'+d+'">'+d+' </option>' )
						 }
					} );
				}); 
			} */
})
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
</style>
 