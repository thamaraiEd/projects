	<h4 class="reporttitle">Overall Summary - Animators </h4>
	<?php if($Daywisedata[0]['role']==1){ ?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">		 
			<div class="x_panel tile">
				<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
					<thead style="background-color: #1abb9c; color: #fff;">
						<tr class="table-info">
							<th>S.No.</th>
							<th>Name</th>
							<th>Date Range</th>
							<th>Pending seconds</th>
							<th>Required Average</th>
							<th>Required Productivity (sec)</th>
							<th>Productivity Average</th>
							<th>Approved Productivity</th>
							<th>Avg. Productivity (%)</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						<?php $i=1;
							foreach ($Daywisedata as $row)
							{
							?>
								<tr> 
									<td><?php echo $i; ?></td>    
									<td><?php echo $row['uname']; ?></td> 									
									<td><?php echo $row['DateRange']; ?></td> 
									<td><?php echo ROUND($row['deficit'],2); ?></td>  
									<td><?php echo ROUND($row['avgreqAvg'],2); ?></td>  
									<td><?php echo ROUND($row['reqAvg'],2); ?></td>  
									<td><?php echo ROUND($row['avgapproved_productivity'],2); ?></td>  
									<td><?php echo ROUND($row['approved_productivity'],2); ?></td>  
									<td><?php echo ROUND((($row['Avg_Productivity'])),2); ?></td>  
								</tr>
							<?php
							$i++;
							} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>	
	<?php } ?>
	<?php if($Daywisedata[0]['role']==2){ ?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">		 
			<div class="x_panel tile">
				<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
					<thead style="background-color: #1abb9c; color: #fff;">
						<tr class="table-info">
							<th>S.No.</th>
							<th>Date</th>
							<th>Approved Productivity</th>
							<th>%</th> 
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						<?php $i=1;
							foreach ($Daywisedata as $row)
							{
							?>
								<tr> 
									<td><?php echo $i; ?></td>    
									<td><?php echo $row['Month']; ?></td> 
									<td><?php echo ROUND($row['deficit'],2); ?></td>  
									<td><?php echo ROUND((($row['Avg_Productivity'])),2); ?></td>  
								</tr>
							<?php
							$i++;
							} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>	
<?php } ?>

<?php if($Daywisedata[0]['role']==""){ ?>
<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center">		
		No Records Found.
		</div>
		</div>


<?php } ?>


<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>
 
<script>
/* $('#dataTable').DataTable({
	"lengthMenu": [[10,  -1], [10,  "All"]]
}) */

$(document).ready(function() {
  $('#dataTable').DataTable( {
	"lengthMenu": [[10,  -1], [10,  "All"]],   
    initComplete: function () 
	{
		this.api().columns([1]).every( function () {
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
.datepicker th{background-color:#fff !important;}
#dataTable tfoot{display: table-header-group;}
.Edit_Btn
{
	color: #fff;
    font-weight: bold;
    text-decoration: none;
    background: #000;
    padding: 4px 12px;
    border-radius: 5px;
    font-size: 16px;
}
#dataTable tfoot{display: table-header-group;}
select{color: #000;}
tfoot tr {
    background: #474640;
    color: #fff;
}
</style>