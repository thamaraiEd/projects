<?php
if($roleid==1)
{ 
?>
<?php $i=1;
/* foreach($listofusers as $users)
{
		
	foreach($alldate as $row)
	{
		$a=$day[$users['user_id']][$row['day']];
		echo "<pre>";print_r($a['approved_productivity']);
	}
	exit;  
} */
?>
	<div class="row"> 
		<div class="col-md-12 col-sm-12 col-xs-12">		<h4 class="reporttitle">Summary Report</h4> 
			<div class="x_panel tile">
				<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
					<thead style="background-color: #1abb9c; color: #fff;">
						<tr class="table-info">
							<th>S.No.</th>
							<th>Date/Name</th>
							<?php
								foreach($alldate as $row)
								{
								?>
									<?php 
									if($type=='AP' || $type=='ALL')
									{
									?>
										<th><?php echo $row['day']." AP"; ?></th>
									<?php
									}
									?>
									<?php 
									if($type=='PP' || $type=='ALL')
									{
									?>
										<th><?php echo $row['day']." %"; ?></th>
									<?php
									}
									?>
								<?php
								}
							?>
							<th>Total Productivity</th>
							<th>Employee's Average</th>
						</tr>
					</thead> 
					<tbody>
						 <?php $i=1;  
						 $totP=0;
						 $totAvg=0;
						 $totRec=0;
						 foreach($listofusers as  $users)
						 {
						 ?>
							<tr>
							 <td><?php echo $i; ?></td>
							 <td><?php echo $users['u_name']; ?></td>
							 <?php
							$noofdayspresent=0;
							$SumofAP=0; 
							foreach($alldate as $row)
							{
								$a=$day[$users['user_id']][$row['day']]; 
								
								if($day[$users['user_id']][$row['day']]['approved_productivity']!='')
								{ 
									$SumofAP=$SumofAP+$day[$users['user_id']][$row['day']]['approved_productivity'];
									$noofdayspresent=$noofdayspresent+1;
								}
							?>	
								<?php 
								if($type=='AP' || $type=='ALL')
								{
								?>
								 <td class="ap">
									 <?php 
										if($day[$users['user_id']][$row['day']]['approved_productivity']!='')
										{
											echo round($day[$users['user_id']][$row['day']]['approved_productivity'],2); 
										}
										else
										{
											echo "";
										} 
									 ?>
								 </td>
								<?php
								}
								?>
								<?php 
								if($type=='PP' || $type=='ALL')
								{
								?>
								  <td class="per">
									 <?php 
										if($day[$users['user_id']][$row['day']]['percentage']!='')
										{
											echo round($day[$users['user_id']][$row['day']]['percentage'],2); 
										}
										else
										{
											echo "";
										} 
									 ?>
								 </td>
								<?php
								}
								?>
								<?php 
								}
								if($noofdayspresent!=0)
								{
									$avg_val=$SumofAP/$noofdayspresent;
									$totRec=$totRec+1;
								}
								else
								{
									$avg_val=0;
								}
								?>
								<td><?php echo ROUND($SumofAP,2); ?></td>
								<td><?php if($noofdayspresent!=0){echo ROUND(($SumofAP/$noofdayspresent),2);}else{echo "-";} ?></td>
							</tr>
						<?php
								$totP=$totP+$SumofAP;
								$totAvg=$totAvg+$avg_val;
								$i++;
						 }
						
						 ?>
					</tbody>
					<tfoot>
						<tr>
							<td></td>
							<td><center>Totals</center></td> 
							<?php 
								foreach($alldate as $val)
								{
								?>
									<?php 
									if($type=='AP' || $type=='ALL')
									{
									?>
										<td class="sum">
											<?php 
											if($monthscore[$val['day']]['sum_approved_productivity'])
											{
												echo ROUND($monthscore[$val['day']]['sum_approved_productivity'],2); 
											}
											else
											{
												echo "-";
											}
											?>
										</td>
									<?php
									}
									?>
									<?php 
									if($type=='PP' || $type=='ALL')
									{
									?>
										<td class="avg">
											<?php 
												if($monthscore[$val['day']]['avg_approved_productivity'])
												{
													echo ROUND($monthscore[$val['day']]['avg_approved_productivity'],2); 
												}
												else
												{
													echo "-";
												}
											?>
										</td>
									<?php
									}
									?>
								<?php
								}
							?>
							<td><?php echo ROUND($totP,2); ?></td> 
							<td><?php echo ROUND(($totAvg/$totRec),2); ?></td> 
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>	
<?php  
}
 ?>
<?php 
if($roleid==2)
{
/* $days_avg=0;$noofrow=0;
foreach ($Daywisedata as $row)
{
	$noofrow=$noofrow+1;
	$days_avg=$days_avg+$row['expected_productivity'];
	
}
$day_avg_val=$days_avg/$noofrow;  */
?>
	<div class="row"> 
		<div class="col-md-12 col-sm-12 col-xs-12">		<h4 class="reporttitle">Summary Report</h4> 
			<div class="x_panel tile">
				<table id="bgdataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
					<thead style="background-color: #1abb9c; color: #fff;">
						<tr class="table-info">
							<th>S.No.</th>
							<th>Date/Name</th>
							<?php
								foreach($alldate as $row)
								{
								?>
									<th><?php echo $row['day']." AP"; ?></th>
									<!--<th><?php echo $row['day']." %"; ?></th>-->
								<?php
								}
							?>
							<th>Total Productivity</th>
							<th>Employee's Average</th>
						</tr>
					</thead> 
					<tbody>
						 <?php $i=1;  
						 $totP=0;
						 $totAvg=0;
						 $totRec=0;
						 foreach($listofusers as  $users)
						 {
						 ?>
							<tr>
							 <td><?php echo $i; ?></td>
							 <td><?php echo $users['u_name']; ?></td>
							 <?php
							$noofdayspresent=0;
							$SumofAP=0; 
							foreach($alldate as $row)
							{
								$a=$day[$users['user_id']][$row['day']]; 
								
								if($day[$users['user_id']][$row['day']]['approved_productivity']!='')
								{ 
									$SumofAP=$SumofAP+$day[$users['user_id']][$row['day']]['approved_productivity'];
									$noofdayspresent=$noofdayspresent+1;
								}
							?>
								 <td class="ap">
									 <?php 
										if($day[$users['user_id']][$row['day']]['approved_productivity']!='')
										{
											echo round($day[$users['user_id']][$row['day']]['approved_productivity'],2); 
										}
										else
										{
											echo "";
										} 
									 ?>
								 </td>
								 <!--<td class="per">
									 <?php 
										if($day[$users['user_id']][$row['day']]['percentage']!='')
										{
											echo round($day[$users['user_id']][$row['day']]['percentage'],2); 
										}
										else
										{
											echo "";
										} 
									 ?>
								 </td>-->
								<?php 
								}
								if($noofdayspresent!=0)
								{
									$avg_val=$SumofAP/$noofdayspresent;
									$totRec=$totRec+1;
								}
								else
								{
									$avg_val=0;
								}
								?>
								<td><?php echo ROUND($SumofAP,2); ?></td>
								<td><?php if($noofdayspresent!=0){echo ROUND(($SumofAP/$noofdayspresent),2);}else{echo "-";} ?></td>
							</tr>
						<?php
								$totP=$totP+$SumofAP;
								$totAvg=$totAvg+$avg_val;
								$i++;
						 }
						
						 ?>
					</tbody>
					<!--<tfoot>
						<tr>
							<td></td>
							<td><center>Totals</center></td> 
							<?php 
								foreach($alldate as $val)
								{
								?>
									<td class="sum">
										<?php 
										if($monthscore[$val['day']]['sum_approved_productivity'])
										{
											echo ROUND($monthscore[$val['day']]['sum_approved_productivity'],2); 
										}
										else
										{
											echo "-";
										}
										?>
									</td>
									<td class="avg">
										<?php 
											if($monthscore[$val['day']]['avg_approved_productivity'])
											{
												echo ROUND($monthscore[$val['day']]['avg_approved_productivity'],2); 
											}
											else
											{
												echo "-";
											}
										?>
									</td>
								<?php
								}
							?>
							<td><?php echo ROUND($totP,2); ?></td> 
							<td><?php echo ROUND(($totAvg/$totRec),2); ?></td> 
						</tr>
					</tfoot>-->
				</table>
			</div>
		</div>
	</div>	
	
	<?php } ?>


<?php if($roleid=="")
{ ?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center">		
			No Records Found.
		</div>
	</div>


<?php
} ?>
 
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>

 
<script>
$('#bgdataTable').DataTable({
	"lengthMenu": [[10,  -1], [10,  "All"]]
})

$(document).ready(function() {
  $('#dataTable').DataTable( {
	"lengthMenu": [[10,  -1], [10,  "All"]],
	/* "footerCallback": function ( row, data, start, end, display )
	 {
		var api = this.api();
		nb_cols = api.columns().nodes().length;//method is used to get the TD/TH nodes for the target column
		var j = 2;alert(nb_cols);
		while(j < nb_cols)
		{
			var pageTotal = api
			.column(j)
			.data()
			.reduce( function (a, b)
			{ 
				// reduce() used to accumulate data from a result set into a single value
				 return Number(a) + Number(b);
				
			}, 0 );
			// Update footer
			
			if(j%2==0)
			{
				$( api.column( j ).footer() ).html(pageTotal);
			}
			else
			{
				$( api.column( j ).footer() ).html(pageTotal/k);
			}
			j++;
		}
	}  */
 /*  initComplete: function () 
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
   }  */
   
  });
 });
</script>
<style> 
.dataTables_wrapper{overflow-y: scroll;}
.datepicker th{background-color:#fff !important;} 
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

select{color: #000;}
tfoot tr {
    background: #474640;
    color: #fff;
}
</style>