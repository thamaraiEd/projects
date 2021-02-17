

<?php 
if($Daywisedata[0]['role']==1)
{
	$Sumofdays=0;
foreach ($Daywisedata as $row)
{
	$Sumofdays=$Sumofdays+$row['daypercentage'];
}
?>
	<div class="row"> 
		<div class="col-md-12 col-sm-12 col-xs-12">		<h4 class="reporttitle"> Total Summary</h4>  
			<div class="x_panel tile">
				<table id="summaryTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
					<thead style="background-color: #1abb9c; color: #fff;">
						<tr class="table-info">
							<th>S.No.</th> 
							<th>Approved Productivity</th> 
							<th>Required Average</th>
							<th>Pending</th>
							<th>Days</th>
							<th>%</th>
						</tr>
					</thead> 
					<tbody>
						<?php $i=1;
							foreach ($Monthwisedata as $row)
							{
							?>
								<tr> 
									<td><?php echo $i; ?></td>    
									<td><?php echo ROUND($row['approved_productivity'],2); ?></td>  
									<td><?php echo ROUND($row['avgreqAvg'],2); ?></td>
									<td><?php echo ROUND($row['deficit'],2); ?></td>
									<td><?php echo $Sumofdays; ?></td>
									<td><?php echo ROUND($row['Avg_Productivity'],2); ?></td>
									 
								</tr>
							<?php
							$i++;
							} ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">			<h4 class="reporttitle">Day Wise Summary</h4> 
			<div class="x_panel tile">
				<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
					<thead style="background-color: #1abb9c; color: #fff;">
						<tr class="table-info">
							<th>S.No.</th>
							<th>Date</th>
							<th>Approved Productivity</th>
							<!--<th>Expected Average</th>-->
							<th>Required Average</th>
							<th>Pending</th>
							<th>Days</th>
							<th>%</th> 
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
						</tr>
					</tfoot>
					<tbody>
						<?php $i=1;
							foreach ($Daywisedata as $row)
							{
							?>
								<tr> 
									<td><?php echo $i; ?></td>    
									<td><?php echo $row['day']; ?></td> 
									<td><?php echo ROUND($row['approved_productivity'],2); ?></td>  
									<!--<td><?php echo ROUND($row['expected_productivity'],2); ?></td>  -->
									<td><?php echo ROUND($row['expected_productivity']*$row['daypercentage'],2); ?></td>  
									<td><?php echo ROUND($row['expected_productivity']*$row['daypercentage'],2)-ROUND($row['approved_productivity'],2) ?></td>  
									<td><?php echo $row['daypercentage']; ?></td>  
									<td><?php echo ROUND((($row['approved_productivity']/($row['expected_productivity']*$row['daypercentage']))*100),2); ?></td>  
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
	<?php
if($Daywisedata[0]['role']==2)
{ 
$days_avg=0;$noofrow=0;
foreach ($Daywisedata as $row)
{
	$noofrow=$noofrow+1;
	$days_avg=$days_avg+$row['expected_productivity'];
	
}
$day_avg_val=$days_avg/$noofrow; 
?>
<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">		 <h4 class="reporttitle">Total Summary</h4> 
			<div class="x_panel tile">
				<table id="BG_SummaryTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
					<thead style="background-color: #1abb9c; color: #fff;">
						<tr class="table-info">
							<th>S.No.</th> 
							<th>Approved Productivity</th>
							<th>Day's Average</th>
							<th>%</th> 
						</tr>
					</thead>
					<tbody>
						<?php $i=1;
							foreach ($Monthwisedata as $row)
							{
							?>
								<tr> 
									<td><?php echo $i; ?></td> 
									<td><?php echo ROUND($row['deficit'],2); ?></td>
									<td><?php echo ROUND($day_avg_val,2); ?></td>  
									<td><?php echo ROUND($row['Avg_Productivity'],2); ?></td>  
								</tr>
							<?php
							$i++;
							} ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">		 <h4 class="reporttitle">Day Wise Summary</h4> 
			<div class="x_panel tile">
				<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
					<thead style="background-color: #1abb9c; color: #fff;">
						<tr class="table-info">
							<th>S.No.</th>
							<th>Date</th>
							<th>Approved Productivity</th>
							<th>Day's Average</th>
							<th>%</th> 
						</tr>
					</thead>
					<tfoot>
						<tr>
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
									<td><?php echo $row['day']; ?></td> 
									<td><?php echo ROUND($row['approved_productivity'],2); ?></td>  
									<td><?php echo ROUND($row['expected_productivity'],2); ?></td>  
									<td><?php echo ROUND((($row['approved_productivity']/$row['expected_productivity'])*100),2); ?></td>  
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