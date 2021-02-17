
	<h4 class="reporttitle">Day Wise Summary</h4>
	
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">		 
			<div class="x_panel tile">
				<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
					<thead style="background-color: #1abb9c; color: #fff;">
						<tr class="table-info">
							<th>S.No.</th>
							<th>Date</th>
							<th>Approved Productivity (sec)</th>
							<!--<th>Expected Average</th>-->
							<th>Required Average</th>
							<th>Pending (sec)</th>
							<th>Days</th>
							<th>%</th> 
						</tr>
					</thead>
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


<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>
 
<script>
$('#dataTable').DataTable({
	"lengthMenu": [[10,  -1], [10,  "All"]]
})
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
</style>